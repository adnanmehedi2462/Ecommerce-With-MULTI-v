<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


use Illuminate\Support\Facades\Redirect;

use Session;
session_start();

class addcatagerycontroller extends Controller
{
    public function index(){
        
            $this->adminauthcheck();
     return view('admin.addcatagery');
        
        
    }  public function allcategory(){
        
           $this->adminauthcheck();
//     return view('admin.allcategory');
      
        $all=DB::table('category_tbl')
            ->get();
    $manage=view('admin.allcategory')
        ->with('adnan',$all);
        return view('admin_layout')
            ->with('allcategory',$manage);
        
        
    }
    public function savecategory(Request $request){
        
           $this->adminauthcheck();
        $data=array();
        $data['category_id']=$request->category_id;
        $data['category_name']=$request->category_name;
        $data['catagery_discription']=$request->catagery_discription;
        $data['status']=$request->status;
        
        
        DB::table('category_tbl')->insert($data);
        session::put('fool','category add successfully!!');
        return Redirect::to('/addcatagory');
    
        
        
    }
    
    
    
    public function unactive_category($category_id)
    {
        
           $this->adminauthcheck();
        
DB::table('category_tbl')
    ->where('category_id',$category_id)
    ->update(['status' => 0]);
            session::put('fool','category unactive successfully!!');
        return Redirect::to('/allcategory');
        
        
    }
    
     
    public function active_category($category_id)
    {
        
        
           $this->adminauthcheck();
DB::table('category_tbl')
    ->where('category_id',$category_id)
    ->update(['status' => 1]);
            session::put('fool','category active successfully!!');
        return Redirect::to('/allcategory');
        
        
    }
    
    public function edit_category($category_id){
           $this->adminauthcheck();
        $info=DB::table('category_tbl')
            ->where('category_id',$category_id)
            ->first();
     
        $manage=view('admin.category_edit')
            
            ->with('adnan',$info);
        return view('admin_layout')
            
            ->with('category_edit',$manage);
        
//        return view('admin.category_edit');
        
        
        
        
    }
    
    
    public function update_category( Request $request,$category_id){
           $this->adminauthcheck();
        $data=array();
        $data['category_name']=$request->category_name;
        $data['catagery_discription']=$request->catagery_discription;
      DB::table('category_tbl')
        ->where('category_id',$category_id)
          ->update($data);
        
    session::put('fool','category update successfully!!!');
    return Redirect::to('/allcategory');
    
    }
    public function delete_category($category_id){
           $this->adminauthcheck();
        DB::table('category_tbl')
            ->where('category_id',$category_id)
            ->delete();
        
        
        return Redirect::to('/allcategory');
        
        
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
