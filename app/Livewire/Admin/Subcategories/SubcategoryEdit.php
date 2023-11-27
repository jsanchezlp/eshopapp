<?php

namespace App\Livewire\Admin\Subcategories;

use App\Models\Category;
use App\Models\Family;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SubcategoryEdit extends Component
{

    public $subcategory;

    public $families;

    public $subcategoryEdit;


    public function mount($subcategory){

        $this->families = Family::all();

        $this->subcategoryEdit = [
            'Family_ID' => $subcategory->category->Cate_Family_ID,
            'Subcat_CatID' => $subcategory->Subcat_CatID,
            'Subcat_Name' => $subcategory->Subcat_Name,
        ];

    }

    // ciclo de vida del componente
    public function updatedSubcategoryEditFamilyId(){
    
        $this->subcategoryEdit['Subcat_CatID'] = '';

    }

    // Propiedad computada
    #[Computed()]
    public function categories(){

        return Category::where('Cate_Family_ID', $this->subcategoryEdit['Family_ID'])->get();

    }


    public function update(){

        $this->validate([
            'subcategoryEdit.Family_ID' => 'required|exists:families,Family_ID',
            'subcategoryEdit.Subcat_CatID' => 'required|exists:categories,Cate_ID',
            'subcategoryEdit.Subcat_Name' => 'required',
        ]);


        $this->subcategory->update($this->subcategoryEdit);

        // session()->flash('swal', [
        //     'icon' => 'success',
        //     'title' => '¡Hecho!',
        //     'text' => 'Subcategoría actualizada correctamente.',
        // ]);


        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => 'Subcategoría actualizada correctamente.',
        ]);


        // return redirect()->route('admin.subcategories.index');

    }

    public function render()
    {
        return view('livewire.admin.subcategories.subcategory-edit');
    }
}
