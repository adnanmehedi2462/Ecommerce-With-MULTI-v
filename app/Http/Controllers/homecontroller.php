<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


use Illuminate\Support\Facades\Redirect;

use Session;
session_start();
class homecontroller extends Controller
{
     public function index(){
         
         
         
//         return view('page.home_contante');
         
         
         
             

    
 
    
            $allss=DB::table('tbl_products')
                ->join('category_tbl','tbl_products.category_id','=','category_tbl.category_id')
                ->join('manufactur','tbl_products.manufactur_id','=','manufactur.manufactur_id')
                ->select('tbl_products.*','category_tbl.category_name','manufactur.manufactur_name')
                ->where('tbl_products.status',1)
                ->limit(6)
            ->get();
     
   
     
     
    $manage=view('page.home_contante')
        ->with('adnan',$allss);
        return view('layout')
            ->with('home_contante',$manage);
        
        
    }
    
    
         
         
         
         
     
}
