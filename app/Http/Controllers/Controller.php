<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Session ;
use DB ;
use Illuminate\Support\Facades\Redirect ;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        $admin_type = Session::get('admin_type');
        if ($admin_id == null)
            return Redirect::to('admin')->send();
        if ($admin_type == 2)
            return Redirect::to('/')->send(); 
        if ($admin_type == 3)
            return Redirect::to('/')->send();    
        }
    
    }
