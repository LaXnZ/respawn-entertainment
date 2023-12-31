<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use illuminate\support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Appointment;

class HomeController extends Controller
{
    public function index(){
        $products = Product::all();
        $categories = Category::all();
        $users = User::all();
        $orders = Order::all();
        $reservations = Appointment::all();
        
        if(Auth::id()){
            $usertype = Auth::user()->usertype;

            if($usertype == 'user'){
                return view('user/user_homepage');
            }
            else if($usertype == 'admin'){
                return view('admin/admin_dashboard')->with('products',$products)->with('categories',$categories)->with('users',$users)->with('orders',$orders)->with('reservations',$reservations);
            }
            else{
                return redirect()->back();
            }

        }
    }

    public function aboutUs(){
        if(Auth::id()){
            $usertype = Auth::user()->usertype;

            if($usertype == 'user'){
                return view('components/about-us');
            }
            else if($usertype == 'admin'){
                return view('components/about-us');
            }
            else{
                return redirect()->back();
            }

        }
    }
    
    public function contactUs(){
        if(Auth::id()){
            $usertype = Auth::user()->usertype;

            if($usertype == 'user'){
                return view('components/contact-us');
            }
            else if($usertype == 'admin'){
                return view('components/contact-us');
            }
            else{
                return redirect()->back();
            }

        }
    }

}