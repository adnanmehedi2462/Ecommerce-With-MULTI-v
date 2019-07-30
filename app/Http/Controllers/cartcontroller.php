<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


use Illuminate\Support\Facades\Redirect;

use Session;
session_start();
class cartcontroller extends Controller
{
public function addto_cart(Request $request){
    $qut=$request->qut;
    $product_id=$request->product_id;
    $info=DB::table('tbl_products')
        ->where('product_id',$product_id)
        ->first();
    
    echo"<pre>";
    print_r($info);
     echo"<pre>";
    
    
}
}
