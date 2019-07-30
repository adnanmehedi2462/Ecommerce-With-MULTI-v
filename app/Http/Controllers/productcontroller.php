<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


use Illuminate\Support\Facades\Redirect;

use Session;
session_start();

class productcontroller extends Controller
{
    
    public function index(){
         $this->adminauthcheck();
        return view('admin.add_product');
        
        
        
       
    } public function save_product(Request $request){
           $data=array();
           $data['product_name']=$request->product_name;
           $data['category_id']=$request->category_id;
           $data['manufactur_id']=$request->manufactur_id;
           $data['product_short_details']=$request->product_short_details;
           $data['product_long_discription']=$request->product_long_discription;
           $data['product_price']=$request->product_price;
     
           $data['product_size']=$request->product_size;
           $data['product_color']=$request->product_color;
           $data['status']=$request->status;
        
           $image=$request->file('product_image');
        if($image){
           $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $uplode_path='image/';
            $image_url=$uplode_path.$image_full_name;
            $success=$image->move($uplode_path,$image_full_name);
            if($success){
            $data['product_image']=$image_url;
            DB::table('tbl_products')->insert($data);
            session::put('fool','products  add sucssfully');
            return Redirect::to('/addproduct');
            
            }     
        }   
          $data['product_image']='';
          DB::table('tbl_products')->insert($data);
          session::put('fool','product add sucssfully without image');
         return Redirect::to('/addproduct');
        
    }
    
 public function allproduct(){
      $this->adminauthcheck();
 
    
            $alls=DB::table('tbl_products')
                ->join('category_tbl','tbl_products.category_id','=','category_tbl.category_id')
                ->join('manufactur','tbl_products.manufactur_id','=','manufactur.manufactur_id')
                ->select('tbl_products.*','category_tbl.category_name','manufactur.manufactur_name')
            ->get();
     
   
     
     
    $manage=view('admin.allproduct')
        ->with('adnan',$alls);
        return view('admin_layout')
            ->with('allproduct',$manage);
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        public function unactive_product($product_id)
    {
        
         $this->adminauthcheck();
        
DB::table('tbl_products')
    ->where('product_id',$product_id)
    ->update(['status' => 0]);
            session::put('fool','product unactive successfully!!');
        return Redirect::to('/allproduct');
        
        
    }
        
    
        public function active_product($product_id)
    {
        
       $this->adminauthcheck();  
        
DB::table('tbl_products')
    ->where('product_id',$product_id)
    ->update(['status' => 1]);
            session::put('fool','product active successfully!!');
        return Redirect::to('/allproduct');
        
        
    }
    
    public function delete_product($product_id){
    $this->adminauthcheck();
        DB::table('tbl_products')
            ->where('product_id',$product_id)
            ->delete();
        session::put('fool','delete sussessfullu');
        return Redirect::to('/allproduct');
        
        
        
        
        
        
    }
    
    
    
    
    
    
    public function edit_product($product_id){
        
    
  $info=DB::table('tbl_products')
      ->where('product_id',$product_id)
      ->first();
         
        $up=view('admin.update_product')
            ->with('adnan',$info);
        
        return view('admin_layout')
            ->with('update_product',$up);
        
        
    }
    
    
    public function update_product(Request $request,$product_id){
        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_size']=$request->product_size;
        $data['product_price']=$request->product_price;
        $data['product_color']=$request->product_color;
       
      
        DB::table('tbl_products')
            ->where('product_id',$product_id)
            ->update($data);
        session::put('fool','product update successfully');
        return Redirect::to('/allproduct');
        
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
//    secure area
    public function adminauthcheck(){
        
        $admin_id=session::get('admin_id');
            if($admin_id){
                
              return;  
                
            }else{
               return Redirect::to('/backend')->send() ;
                
                
                
                
            }
        
        
        
        
        
    }
     
}
 
   