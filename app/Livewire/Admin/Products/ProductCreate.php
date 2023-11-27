<?php

namespace App\Livewire\Admin\Products;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Family;
use App\Models\Image;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Supplier;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductCreate extends Component
{

    // trait para poder subir imagenes con Livewire
    use WithFileUploads;

    public $families;
    public $suppliers;
    public $brands;

    public $family_id = '';
    public $category_id = '';

    public $product_image;

    public $product = [
        'Prod_Sku' => '',
        'Prod_Name' => '',
        'Prod_Slug' => '',
        'Prod_Description' => '',
        'Prod_Price' => '',
        'Prod_Stock' => '',
        'Prod_SuppID' => '',
        'Prod_BrandID' => '',
        'Prod_SubcatID' => '',
        'Prod_Status' => 1,
    ];


    public function mount(){

        $this->families = Family::all();
        $this->suppliers = Supplier::all();
        $this->brands = Brand::all();

        $this->product['Prod_SuppID'] = '';
        $this->product['Prod_BrandID'] = '';
        $this->product['Prod_SubcatID'] = '';
    }

    // function que se ejecuta cuando se renderiza la vista
    public function boot(){

        $this->withValidator( function($validator) {
            
            if ( $validator->fails() ) {

                $this->dispatch('swal', [
                    'icon' => 'error',
                    'title' => 'Error!',
                    'text' => 'El formulario contiene errores.',
                ]);

            }

        });

    }


    // metodo que se mantiene a la escucha cuando se actualiza la opcion de familia
    public function updatedFamilyId(){
        $this->category_id = '';
        $this->product['Prod_SubcatID'] = '';
    }

    // metodo que se mantiene a la escucha cuando se actualiza la opcion de categoría
    public function updatedCategoryId(){
        $this->product['Prod_SubcatID'] = '';
    }

    #[Computed()]
    public function categories(){
        return Category::where('Cate_Family_ID', $this->family_id)->get();
    }

    #[Computed()]
    public function subcategories(){
        return Subcategory::where('Subcat_CatID', $this->category_id)->get();
    }

    public function store(){
        
        $this->validate([
            'product_image' => 'image|max:1024',
            'product.Prod_Sku' => 'required|unique:products,Prod_Sku',
            'product.Prod_Name' => 'required|max:150',
            'product.Prod_Slug' => 'required|max:200|unique:products,Prod_Slug',
            'product.Prod_Description' => 'required',
            'product.Prod_Price' => 'required|numeric|min:0',
            'product.Prod_Stock' => 'required|numeric|min:0',
            'product.Prod_SuppID' => 'required|exists:suppliers,Supp_ID',
            'product.Prod_BrandID' => 'required|exists:brands,Brand_ID',
            'product.Prod_SubcatID' => 'required|exists:subcategories,Subcat_ID',
            'product.Prod_Status' => 'required',
        ]);


        $image_path = $this->product_image->store('products');
        
        $newProduct = Product::create($this->product);
        
        Image::create([
            'Img_EntityID' => $newProduct->Prod_ID,
            'Img_EntityTypeID' => 1,
            'Img_Path' => $image_path,
        ]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => 'Producto creado correctamente.',
        ]);

        return redirect()->route('admin.products.edit', $newProduct);

    }

    public function render()
    {
        return view('livewire.admin.products.product-create');
    }
}
