<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use illuminate\support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
            $usertype = Auth::user()->usertype;

            if($usertype == 'user'){
                return view('user/user_dashboard');
            }
            else if($usertype == 'admin'){
                return view('admin/admin_dashboard');
            }
            else{
                return redirect()->back();
            }

        }
    }
    

}
