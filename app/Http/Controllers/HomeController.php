<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $role_id=Auth::user()->role_id;
        if($role_id == 'admin'){
return view('admin.admindashboard.index');

        }
        if($role_id == 'Enquêteur'){
            return view('admin.admindashboard.index');
            
                    }
                    if($role_id == 'Avocat'){
                        return view('Avocat.Gérerlesévidencess.index');
                        
                                }

    }
}
