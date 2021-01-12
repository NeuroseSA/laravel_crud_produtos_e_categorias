<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use PhpParser\Node\Stmt\TryCatch;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCategories = Category::all();
        return view('categories', compact('listCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newcategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:Categories'
        ], [
            'name.unique' => 'Já existe essa categoria cadastrada',
            'name.required' => 'O nome da Categoria é obrigatório'
            ]);

        try {
            $cat = new Category();
            $cat->name = $request->input('name');
            $cat->save();
            return redirect(route('category'));
        } catch (\Throwable $th) {
            return redirect(route('category'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if (isset($category)) {
            return view('editcategory', compact('category'));
        }
        return redirect(route('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if ($category->name == $request->name) {
            $request->validate([
                'name' => 'required'
            ], [
                'name.unique' => 'Já existe essa categoria cadastrada',
                'name.required' => 'O nome da Categoria é obrigatório'
            ]);
        }else{
            $request->validate([
                'name' => 'required|unique:Categories'
            ], [
                'name.unique' => 'Já existe essa categoria cadastrada',
                'name.required' => 'O nome da Categoria é obrigatório'
            ]);
        }

        
        if (isset($category)) {
            $category->name = $request->input('name');
            $category->save();
        }
        return redirect(route('category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (isset($category)) {
            $category->delete();
        }
        return redirect(route('category'));
    }

    public function indexJson(){
        $listCategories = Category::all();
        return json_encode($listCategories);
    }
}
