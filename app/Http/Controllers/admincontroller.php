<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


use Illuminate\Support\Facades\Redirect;

use Session;
session_start();

class admincontroller extends Controller
{
    public function index(){
        
        
        return view('admin_login'); 
        
        
    }
    public function admindasbords(Request $request){
        $admin_email=$request->admin_email;
        $admin_password=md5($request->admin_password);
        $result=DB::table('tbl_admin')
            ->where('admin_email',$admin_email)
            ->where('admin_password',$admin_password)
            ->first();
     
        if($result){
            
            session::put('admin_name',$result->admin_name);
            session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashbord');
            
            
        }
        else{
            
           session::put('fool','invalid password or email'); 
         return Redirect::to('/backend');
        }
        
    }
//    admin logout
    
    
    
  
    

}
