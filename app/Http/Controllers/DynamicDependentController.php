<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DynamicDependentController extends Controller
{
    //
    public function index(){
        $country_list=DB::table('country_state')->groupBy('country')->get();
        return view('checkout')->with('country_list',$country_list);
    }
}
