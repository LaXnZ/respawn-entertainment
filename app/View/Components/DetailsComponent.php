<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Symfony\Component\Console\Input\Input;

class DetailsComponent extends Component
{   
    public function details($slug){
        $product = $slug;

        $product = Product::where('slug', $slug)->first();
     
        // if(Auth::id()){
        //     $usertype = Auth::user()->usertype;
        //     if($usertype == 'user'){
        //         return view('shop/partials/details-component',[
        //             'product' => $product
        //         ]);
        //     }
        //     else if($usertype == 'admin'){
        //         return view('admin/admin_dashboard');
        //     }
        //     else{
        //         return redirect()->back();
        //     }

        // }
       

        if ($product !== null) {
            if(Auth::id()){
                $usertype = Auth::user()->usertype;
                if($usertype == 'user'){
                    
                    return view('shop/partials/details-component',[
                        'product' => $product
                    ]);
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
    
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.details-component');
    }
}
