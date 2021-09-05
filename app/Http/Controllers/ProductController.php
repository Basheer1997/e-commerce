<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
         $this->middleware('isAdmin')->except('show','index');
    }
    public function index()
    {
        //
        return view('adminProducts')->with('products',Product::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('addProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $path=$request->image->store('images');
        $validated = $request->validate([

            'name' => 'required|max:255',
            'title' => 'required|max:255',
            'subTitle' => 'required|max:255',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $products =new Product();

        $products->name=$request->name;
        $products->title=$request->title;
        $products->subTitle=$request->subTitle;
        $products->price=$request->price;
        $products->description=$request->description;
        $products->image=$path;
        $products->save();
        return redirect()->route('product.index')->with('success','تم اضافة المنتج');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('product')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('editProduct')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $path=$request->image->store('images');
        $validated = $request->validate([

            'name' => 'required|max:255',
            'title' => 'required|max:255',
            'subTitle' => 'required|max:255',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);



        $product->name=$request->name;
        $product->title=$request->title;
        $product->subTitle=$request->subTitle;
        $product->price=$request->price;
        $product->description=$request->description;
        $product->image=$path;
        $product->save();
        return redirect()->route('product.index')->with('success','تم تعديل المنتج');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('product.index')->with('success','تم الحذف المنتج');
    }
}
