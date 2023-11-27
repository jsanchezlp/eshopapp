<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Family;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $families = Family::all();

        // DB::enableQueryLog();

        $categories = Category::orderBy('Cate_ID', 'DESC')
                              ->with('family')
                              ->paginate(10);
        
        // dd(DB::getQueryLog());

        return view('admin.categories.index', compact('categories', 'families'));
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
        $request->validate([
            'Cate_Name' => 'required',
            'Cate_Family_ID' => 'required|exists:families,Family_ID',
        ]);

        Category::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => 'Categoría creada correctamente.',
        ]);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $families = Family::all();

        return view('admin.categories.edit', compact('category', 'families'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        
        $request->validate([
            'Cate_Name' => 'required',
            'Cate_Family_ID' => 'required|exists:families,Family_ID',
        ]);

        $category->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => 'Categoría actualizada correctamente.',
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ( $category->subcategories->count() > 0 ) {

            session()->flash('swal', [
                'icon' => 'error',
                'title' => '¡Ups!',
                'text' => 'No se puede eliminar la categoría porque tiene subcategorías asociadas.'
            ]);

            return redirect()->back();
        }

        $category->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => 'Registro eliminado correctamente.'
        ]);

        return redirect()->back();
    }
}
