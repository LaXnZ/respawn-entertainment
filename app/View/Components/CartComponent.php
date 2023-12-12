<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{
    public function cart(){
        
        // pass products from the product module
        $products = Product::paginate(12);
        
        if(Auth::id()){
            $usertype = Auth::user()->usertype;
            $userAddress = Auth::user()->address;
            $cafe_member = Auth::user()->cafe_member;

            if($usertype == 'user'){
                return view('shop/partials/cart-component',[
                    'products' => $products,
                    'cafe_member' => $cafe_member,
                ]);
            }
            else if($usertype == 'admin'){
                return view('admin/admin_dashboard',[
                    'products' => $products
                ]);
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