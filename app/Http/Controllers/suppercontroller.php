<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


use Illuminate\Support\Facades\Redirect;

use Session;
session_start();

class suppercontroller extends Controller
{
    public function index(){
        
        $this->adminauthcheck();
        
       return view('admin.dashbord'); 
        
        
        
    }
    
    
      public function logout(){
//        session::put('admin_name',null);
//        session::put('admin_id',null); 
        
        session::flush();
        return Redirect::to('/backend');
        
        
        
        
        
        
        
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
