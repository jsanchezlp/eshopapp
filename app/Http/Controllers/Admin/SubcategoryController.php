<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        $subcategories = Subcategory::with('category.family')
                                    ->orderBy('Subcat_ID', 'DESC')
                                    ->paginate(10);
        
        return view('admin.subcategories.index', compact('subcategories', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        return $request->all();

        $request->validate([
            'Subcat_Name' => 'required',
            'Subcat_CatID' => 'required|exists:categories,Category_ID',
        ]);

        Subcategory::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => 'Subcategoría creada correctamente.',
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {

        return view('admin.subcategories.edit', compact('subcategory'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        if ( $subcategory->products->count() > 0 ) {

            session()->flash('swal', [
                'icon' => 'error',
                'title' => '¡Ups!',
                'text' => 'No se puede eliminar la categoría porque tiene productos asociadas.'
            ]);

            return redirect()->back();
        }

        $subcategory->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => 'Registro eliminado correctamente.'
        ]);

        return redirect()->back();
    }
}
