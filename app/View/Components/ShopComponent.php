<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use illuminate\support\Facades\Auth;
use Illuminate\View\Component;

class ShopComponent extends Component
{
    public function shop(){
        if(Auth::id()){
            $usertype = Auth::user()->usertype;

            if($usertype == 'user'){
                return view('shop/shop');
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
        return view('components.shop-component');
    }
}
