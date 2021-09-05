<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function index($id)
    {
        $user = User::find(Auth::user()->id);
        $product = Product::findOrFail($id);

        $products = Auth::user()->products()->where('product_id', $id)->first();

        if (!$products) {
            $cart = new Cart();

            $cart->product_id = $id;
            $cart->User_id = Auth::user()->id;

            $cart->save();
        } else {
            $cart =Cart::find($products->pivot->id);
            ++$cart->count;
            $cart->save();

        }
        return redirect()->back()->with('sucsess','تمت الاضافة بنجاح');
    }
    public function myProducts()
    {
        /* $myProducts= Cart::find('user_id',1)->pluck('product_id'); */
        $products = Cart::where('user_id', Auth::user()->id)->pluck('product_id');

        $myProducts = Product::find($products);


        return view('myProducts')->with('products', $myProducts);
    }
   /*  public function myCart(){
        $carts=Auth::user()->products;
        return view('checkout')->with('carts',$carts);
    } */
}
