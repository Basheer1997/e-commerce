<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    //
    public function __construct()
    {
         $this->middleware('isAdmin')->except('logout','index','about','profileEdit');
    }
    public function index(){
        return view('products')->with('products',Product::get());
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');

    }
 public function about(){
     return view('about');
 }
 public function profileEdit(){
     return view('profile');
 }
}
