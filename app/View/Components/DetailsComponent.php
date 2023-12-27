<?php

namespace App\View\Components;

use App\Models\Category;
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

        $allProducts = Product::all();

        $product = Product::where('slug', $slug)->first();
        $category = Category::where('slug',$slug)->first();
       

        $categories = Category::orderBy('name','ASC')->get();
      
       $rproducts = Product::where('category_id',  $product->category_id)->inRandomOrder()->limit(4)->get();
       $nproducts = Product::latest()->take(3)->get();

        if ($product !== null) {
            if(Auth::id()){
                $usertype = Auth::user()->usertype;
                if($usertype == 'user'){
                    
                    return view('shop/partials/details-component',[
                        'product' => $product, 'rproducts' => $rproducts, 'nproducts' => $nproducts , 'categories' => $categories, 'allProducts' => $allProducts
                    ]);
                }
                else if($usertype == 'admin'){
                    return view('shop/partials/details-component',[
                        'product' => $product, 'rproducts' => $rproducts, 'nproducts' => $nproducts , 'categories' => $categories
                    ]);
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