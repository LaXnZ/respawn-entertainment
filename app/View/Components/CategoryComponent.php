<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;

use illuminate\support\Facades\Auth;
use Illuminate\View\Component;
use Livewire\WithPagination;
use Cart;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

use function Livewire\store;

class CategoryComponent extends Component
{
    use WithPagination;

    // public function store($product_id, $product_name, $product_price){
        
    //     Cart::add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
    //     session()->flash('success_message', 'Item added in Cart');
    //     return redirect()->route('shop.cart');
    // }

    public $pageSize = 12;

    public function addToCart($product_id){
        $product = Product::findOrFail($product_id);

        
        $cart = session()->get('cart',[]);

        if(isset($cart[$product_id])){
           
            $cart[$product_id]['quantity']++;
        }
        else{
            $cart[$product_id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->regular_price,
                'id' => $product->id,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success','Product add to cart successfully!');

    }

    public function update(Request $request){
        if($request-> id && $request->quantity){
            $cart=session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart',$cart);
            session()->flash('success_message', 'Cart updated Successfully');
        }
    }

    public function remove(Request $request){
       if($request->id){
        $cart = session()->get('cart');
        if(isset($cart[$request->input('id')])){
            unset($cart[$request->input('id')]);
            session()->put('cart',$cart);
            }
       }
    }
    
    public function __construct()
    {
        //
    }


   

    public function category($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;

        $categories = Category::orderBy('name','ASC')->get();

        $products = Product::where('category_id', $category_id)->paginate(12);

        $nproducts = Product::latest()->take(3)->get();
        if(Auth::id()){
            $usertype = Auth::user()->usertype;

            if($usertype == 'user'){
                return view('shop/partials/category-component', ['products' => $products, 'nproducts' => $nproducts,  'categories'=>$categories, 'category_name'=>$category_name]);
            }
            else if($usertype == 'admin'){
                return view('admin/admin_dashboard');
            }
            else{
                return redirect()->back();
            }

        }

        
       
        // return view('components.shop',['products'=>$products, 'categories'=>$categories]);
    }
    public function render(): View|Closure|string
    {
        return view('components.details-component');
    }
}
