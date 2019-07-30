<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


use Illuminate\Support\Facades\Redirect;

use Session;
session_start();
class slidercontroller extends Controller
{
public function index(){
     $this->adminauthcheck();
    return view('admin.add_slider');
    
    
}
    
     public function save_slider(Request $request){
            $this->adminauthcheck();
      
           $data['status']=$request->status;
        
           $image=$request->file('slider_image');
        if($image){
           $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $uplode_path='slider/';
            $image_url=$uplode_path.$image_full_name;
            $success=$image->move($uplode_path,$image_full_name);
            if($success){
            $data['slider_image']=$image_url;
            DB::table('slider_tbl')->insert($data);
            session::put('fool','slider  add sucssfully');
            return Redirect::to('/addslider');
            
            }     
        }   
          $data['slider_image']='';
          DB::table('slider_tbl')->insert($data);
          session::put('fool','product add sucssfully without image');
         return Redirect::to('/addslider');
    }
    
    public function allslider(){
             $this->adminauthcheck();
        $slider=DB::table('slider_tbl')
            ->get();
        $manage=view('admin.all_slider')
            ->with('adnan',$slider);
            return view ('admin_layout')
            ->with('all_slider',$manage);
        
        
        
        
    }
   
    
        
    public function unactive_slider($slider_id)
    {
        
               $this->adminauthcheck();
        
DB::table('slider_tbl')
    ->where('slider_id',$slider_id)
    ->update(['status' => 0]);
            session::put('fool','slider unactive successfully!!');
        return Redirect::to('/allslider');
        
        
    }
    
     
    public function active_slider($slider_id)
    {
        
        
DB::table('slider_tbl')
    ->where('slider_id',$slider_id)
    ->update(['status' => 1]);
            session::put('fool','slider active successfully!!');
        return Redirect::to('/allslider');
        
        
    }
    
    
      public function delete_slider($slider_id){
          $this->adminauthcheck();
        DB::table('slider_tbl')
            ->where('slider_id',$slider_id)
            ->delete();
        
        
        return Redirect::to('/allslider');
        
        
    }
    
    
    public function showproduct_by_category ($category_id){
        
             
    
            $alls=DB::table('tbl_products')
                ->join('category_tbl','tbl_products.category_id','=','category_tbl.category_id')
             
                ->select('tbl_products.*','category_tbl.category_name')
                ->where('category_tbl.category_id',$category_id)
                ->where('tbl_products.status',1)
                ->limit(20)
            ->get();
     
   
     
     
    $manage=view('page.category_by_product')
        ->with('adnan',$alls);
        return view('layout')
            ->with('category_by_product',$manage);
        
        
        
    }
       
    public function showproduct_by_manufactur ($manufactur_id){
          
    
            $allt=DB::table('tbl_products')
                ->join('category_tbl','tbl_products.category_id','=','category_tbl.category_id')
                ->join('manufactur','tbl_products.manufactur_id','=','manufactur.manufactur_id')
                ->select('tbl_products.*','category_tbl.category_name','manufactur.manufactur_name')
                     ->where('manufactur.manufactur_id',$manufactur_id)
                ->where('tbl_products.status',1)
                ->limit(36)
            ->get();
     
   
     
     
    $manage=view('page.showproduct_by_manufactur')
        ->with('adnan',$allt);
        return view('layout')
            ->with('showproduct_by_manufactur',$manage);
        
        
        
        
    }
       
    
    
    
    public function view_product($product_id){

 
    
            $al=DB::table('tbl_products')
                ->join('category_tbl','tbl_products.category_id','=','category_tbl.category_id')
                ->join('manufactur','tbl_products.manufactur_id','=','manufactur.manufactur_id')
                ->select('tbl_products.*','category_tbl.category_name','manufactur.manufactur_name')
                ->where('tbl_products.product_id',$product_id)
                ->where('tbl_products.status',1)
              ->first();
 
     
   
     
     
    $lo=view('page.view_product')
        ->with('adnan',$al);
        return view('layout')
            ->with('view_product',$lo);
        
        
        
        
        
    }
        public function view_products($product_id){

 
       
            $al=DB::table('tbl_products')
                ->join('category_tbl','tbl_products.category_id','=','category_tbl.category_id')
                ->join('manufactur','tbl_products.manufactur_id','=','manufactur.manufactur_id')
                ->select('tbl_products.*','category_tbl.category_name','manufactur.manufactur_name')
                ->where('tbl_products.product_id',$product_id)
                ->where('tbl_products.status',1)
              ->first();
 
     
   
     
     
    $lo=view('page.view_product')
        ->with('adnan',$al);
        return view('layout')
            ->with('view_product',$lo);
        
        
        
        
        
    }
     public function view_productss($product_id){

 
    
            $als=DB::table('tbl_products')
                ->join('category_tbl','tbl_products.category_id','=','category_tbl.category_id')
                ->join('manufactur','tbl_products.manufactur_id','=','manufactur.manufactur_id')
                ->select('tbl_products.*','category_tbl.category_name','manufactur.manufactur_name')
                ->where('tbl_products.product_id',$product_id)
                ->where('tbl_products.status',1)
              ->first();
 
     
   
     
     
    $los=view('page.view_product')
        ->with('adnan',$als);
        return view('layout')
            ->with('view_product',$los);
        
        
        
        
        
    }
       
public function adminauthcheck(){
        
        $admin_id=session::get('admin_id');
            if($admin_id){
                
              return;  
                
            }else{
               return Redirect::to('/backend')->send() ;
                
                
                
                
            }
        
        
        
        
        
    }
    
    
    
}
 