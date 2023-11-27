<?php

namespace App\Livewire\Admin\Subcategories;

use App\Models\Category;
use App\Models\Family;
use App\Models\Subcategory;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SubcategoryCreate extends Component
{

    public $families;

    public $subcategory = [
        'Family_ID' => '',
        'Subcat_CatID' => '',
        'Subcat_Name' => '',
    ];

    public function mount(){
        $this->families = Family::all();
    }

    // ciclo de vida del componente
    public function updatedSubcategoryFamilyId(){
        
        $this->subcategory['Subcat_CatID'] = '';

    }

    // Propiedad computada
    #[Computed()]
    public function categories(){

        return Category::where('Cate_Family_ID', $this->subcategory['Family_ID'])->get();

    }

    public function save(){
        
        $this->validate([
            'subcategory.Family_ID' => 'required|exists:families,Family_ID',
            'subcategory.Subcat_CatID' => 'required|exists:categories,Cate_ID',
            'subcategory.Subcat_Name' => 'required',
        ]);


        Subcategory::create($this->subcategory);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => 'Subcategoría creada correctamente.',
        ]);

        return redirect()->route('admin.subcategories.index');

    }

    public function render()
    {

        return view('livewire.admin.subcategories.subcategory-create');
    }

}
