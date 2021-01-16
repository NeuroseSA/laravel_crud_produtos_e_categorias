<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAPI()
    {
        //$cat = Category::All();
        $listProducts = Product::All();
        return  $listProducts->toJson();
    }

    public function index()
    {
/*         if (Auth::check() === true) {
            $cat = Category::All();
            $listProducts = Product::All();
            return view('product.products', compact('listProducts', 'cat'));
        }else{
            return redirect()->route('logado.showLogin');  
        } */
        $cat = Category::All();
        $listProducts = Product::All();
        return view('product.products', compact('listProducts', 'cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::All();
        return view('product.newproduct', compact('cat'));
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
            'name' => 'required|unique:Products',
            'stock' => 'required',
            'price' => 'required'
        ],[
            'name.required' => 'Nome do produto é obrigatório',
            'price.required' => 'Preço do produto é obrigatório',
            'stock.required' => 'Estoque do produto é obrigatório',
            'name.unique' => 'Produto ja cadastrado',
        ]);

        try {
            $prod = new Product();
            $prod->name = $request->input('name');
            $prod->stock = $request->input('stock');
            $prod->price = $request->input('price');
            $prod->category_id = $request->input('category_id');
            $prod->save();
            return json_encode($prod);
            //return redirect(route('products'));
        } catch (\Throwable $th) {
            return redirect(route('products'));
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
        $cat = Category::All();
        $prod = Product::find($id);
        if(isset($prod)){
            //return view('product.editproduct', compact('prod', 'cat'));
            return json_encode($prod);
        }
        return redirect(route('products'));

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
        $prod = Product::find($id);

/*         $request->validate([
            'name' => 'required|unique:Products',
            'stock' => 'required',
            'price' => 'required'
        ],[
            'name.required' => 'Nome do produto é obrigatório',
            'price.required' => 'Preço do produto é obrigatório',
            'stock.required' => 'Estoque do produto é obrigatório',
            'name.unique' => 'Produto ja cadastrado',
        ]); */

        if(isset($prod)){
            $prod->name = $request->input('name');
            $prod->stock = $request->input('stock');
            $prod->price = $request->input('price');
            $prod->category_id = $request->input('category_id');
            $prod->save();
            return json_encode($prod);
        }
        //return redirect(route('products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Product::find($id);
        if(isset($prod)){
            $prod->delete();
        }
        //return redirect(route('products'));
    }
}
