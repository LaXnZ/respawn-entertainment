<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{
    public function cart(){
        if(Auth::id()){
            $usertype = Auth::user()->usertype;

            if($usertype == 'user'){
                return view('shop/partials/cart-component');
            }
            else if($usertype == 'admin'){
                return view('admin/admin_dashboard');
            }
            else{
                return redirect()->back();
            }

        }
    }
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cart-component');
    }
}
