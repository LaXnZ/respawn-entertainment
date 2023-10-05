<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use illuminate\support\Facades\Auth;
use Illuminate\View\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;

    public function shop(){
        $products = Product::paginate(12);
        $nproducts = Product::latest()->take(3)->get();
        if(Auth::id()){
            $usertype = Auth::user()->usertype;

            if($usertype == 'user'){
                return view('shop/shop', ['products' => $products, 'nproducts' => $nproducts]);
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
