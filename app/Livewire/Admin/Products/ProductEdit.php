<?php

namespace App\Livewire\Admin\Products;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Family;
use App\Models\Image;
use App\Models\Subcategory;
use App\Models\Supplier;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductEdit extends Component
{

    // trait para poder subir imagenes con Livewire
    use WithFileUploads;

    public $product;
    public $productEdit;

    public $families;
    public $suppliers;
    public $brands;

    public $family_id = '';
    public $category_id = '';

    public $product_image;

    public function mount( $product ){

        // dd($product->productImages[0]['Img_Path']);

        // foreach ($product->productImages as $images) {
        //     dump($images['Img_Path']);
        // }

        // dd($product->subcategory->category);
        
        $this->productEdit = $product->only(
            'Prod_Sku', 
            'Prod_Name', 
            'Prod_Slug', 
            'Prod_Description', 
            'Prod_Price', 
            'Prod_Stock', 
            'Prod_SuppID', 
            'Prod_BrandID', 
            'Prod_SubcatID', 
            'Prod_Status');

        $this->families = Family::all();
        $this->suppliers = Supplier::all();
        $this->brands = Brand::all();

        // $this->productEdit['Prod_SuppID'] = '';
        // $this->productEdit['Prod_BrandID'] = '';
        // $this->productEdit['Prod_SubcatID'] = '';

        $this->category_id = $product->subcategory->category->Cate_ID;
        $this->family_id = $product->subcategory->category->Cate_Family_ID;
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
        $this->productEdit['Prod_SubcatID'] = '';
    }

    // metodo que se mantiene a la escucha cuando se actualiza la opcion de categoría
    public function updatedCategoryId(){
        $this->productEdit['Prod_SubcatID'] = '';
    }


    #[Computed()]
    public function categories(){
        return Category::where('Cate_Family_ID', $this->family_id)->get();
    }

    #[Computed()]
    public function subcategories(){
        return Subcategory::where('Subcat_CatID', $this->category_id)->get();
    }


    public function update(){
        
        // dd($this->product->Prod_ID);

        $this->validate([
            'product_image' => 'nullable|image|max:1024',
            'productEdit.Prod_Sku' => "required|unique:products,Prod_Sku,{$this->product->Prod_ID},Prod_ID",
            'productEdit.Prod_Name' => 'required|max:150',
            'productEdit.Prod_Slug' => "required|max:200|unique:products,Prod_Slug,{$this->product->Prod_ID},Prod_ID",
            'productEdit.Prod_Description' => 'required',
            'productEdit.Prod_Price' => 'required|numeric|min:0',
            'productEdit.Prod_Stock' => 'required|numeric|min:0',
            'productEdit.Prod_SuppID' => 'required|exists:suppliers,Supp_ID',
            'productEdit.Prod_BrandID' => 'required|exists:brands,Brand_ID',
            'productEdit.Prod_SubcatID' => 'required|exists:subcategories,Subcat_ID',
            'productEdit.Prod_Status' => 'required',
        ]);


        if ($this->product_image) {

            Storage::delete([$this->product->productImages[0]['Img_Path']]);

            $image_path = $this->product_image->store('products');

            Image::create([
                'Img_EntityID' => $this->product->Prod_ID,
                'Img_EntityTypeID' => 1,
                'Img_Path' => $image_path,
            ]);
        }


        $this->product->update($this->productEdit);
        
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => 'Producto creado correctamente.',
        ]);

        return redirect()->route('admin.products.edit', $this->product);

    }


    public function render()
    {
        return view('livewire.admin.products.product-edit');
    }
}
