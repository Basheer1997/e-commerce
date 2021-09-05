<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function checkout(){
        $carts=Auth::user()->products;
        $total=0;
        foreach($carts as $cart){
            $total+= $cart->price * $cart->pivot->count;
        }

        $country_list=DB::table('country_state')->select('id','country')->get();
        return view('checkout')
        ->with('country_list',$country_list)
        ->with('carts',$carts)
        ->with('total',$total);
    }
     public function sendCheckout(Request $request){
         $checkout =new Checkout();
         $checkout->name=$request->name;
         $checkout->email=$request->email;
         $checkout->address=$request->address;
         $checkout->address2=$request->address2;
         $checkout->country=$request->country;



        $checkout->save();
        return redirect()->back();


    }
   /*  public function total(){
       return $products = Auth::user()->products;
    } */
    /*
    public function fetch(Request $request){
         $select= $request->select;
        $value= $request->value;
        $dependent= $request->dependent;
        $data=DB::table('country_list')
        ->where($select,$value)->groupBy($dependent)->get();
        $output='<option value="">Select'.ucfirst($dependent).'</option>';
        foreach($data as $row){
            $output .='<option value="'.$row->dependent.'">'.$row->dependent.'</option>';
        }
    } */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
