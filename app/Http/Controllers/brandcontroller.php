<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


use Illuminate\Support\Facades\Redirect;

use Session;
session_start();

class brandcontroller extends Controller
{
public function index(){
           $this->adminauthcheck();
    return view('admin.add_brand');
    
    
}
    
    public function savebrand(Request $request){
          $this->adminauthcheck();
      $data=array();
        $data['manufactur_id']=$request->manufactur_id;
        $data['manufactur_name']=$request->manufactur_name;
        $data['manufactur_discription']=$request->manufactur_discription;
        $data['status']=$request->status;
        DB::table('manufactur')->insert($data);
  session::put('fool','brand add successfully!!');
        return Redirect::to('/addbrand');
           
        
        
        
        
    }
    
    
    
    
    public function allbrand(){
     $this->adminauthcheck();
        $brand=DB::table('manufactur')
            ->get();
        

        
        $manage=view('admin.allbrand')
            ->with('adnan',$brand);
        
        return view('admin_layout')
            ->with('allbrand',$manage);
                
        
    }
        
        
        
        
        //        unactive barand 
    public function unactive_brand($manufactur_id)
    {
        
           $this->adminauthcheck();
        
DB::table('manufactur')
    ->where('manufactur_id',$manufactur_id)
    ->update(['status' => 0]);
            session::put('fool','brand unactive successfully!!');
        return Redirect::to('/allbrand');
        
        
    }
    
        
        
        
        
          
    public function active_brand($manufactur_id)
    {
   $this->adminauthcheck();
  
        
        
DB::table('manufactur')
    ->where('manufactur_id',$manufactur_id)
    ->update(['status' => 1]);
            session::put('fool','brand active successfully!!');
        return Redirect::to('/allbrand');
        
        
    }
        
    public function edit_brand($manufactur_id){
           $this->adminauthcheck();
//        return view('admin.edit_brand');
        $edit=DB::table('manufactur')
            ->where('manufactur_id',$manufactur_id)
            ->first();
        $manage=view('admin.edit_brand')
            ->with('adnan',$edit);
        return view('admin_layout')
            ->with('edit_brand',$manage);
        
        
        
        
    }    
    
    
    
//    UPDATE BRAND
    
    
  public function update_brand( Request $request,$manufactur_id){
         $this->adminauthcheck();
        $data=array();
        $data['manufactur_name']=$request->manufactur_name;
        $data['manufactur_discription']=$request->manufactur_discription;
      DB::table('manufactur')
        ->where('manufactur_id',$manufactur_id)
          ->update($data);
    session::put('fool','category update successfully!!!');
    return Redirect::to('/allbrand');
    
    }
    
   public function delete_brand($manufactur_id){
          $this->adminauthcheck();
       DB::table('manufactur')
           ->where('manufactur_id',$manufactur_id)
           ->delete();
       session::put('fool','brand delete successfully!!');
       return Redirect::to('/allbrand');
       
       
       
       
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
 


   