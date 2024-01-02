<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Game;
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

class ShopComponent extends Component
{
    use WithPagination;

    // public function store($product_id, $product_name, $product_price){
        
    //     Cart::add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
    //     session()->flash('success_message', 'Item added in Cart');
    //     return redirect()->route('shop.cart');
    // }
    public $min_value;
    public $max_value;
    public $pageSize = 12;

    public function addToCart($product_id, Request $request){
       
        $product = Product::findOrFail($product_id);
    
        $cart = session()->get('cart', []);
    
        if(isset($cart[$product_id])){
            $cart[$product_id]['quantity']++;
        }
        else{
            $cart[$product_id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->regular_price,
                'id' => $product->id,
                'type' => $request->type ?? 'product', // Default to 'product' if 'type' is not provided
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

    public function clear(){
        session()->forget('cart');
    }

    public function __construct($min_value = 0, $max_value = 100000000)
    {
        $this->min_value = $min_value;
        $this->max_value = $max_value;
    }
    public function search(Request $request){
        $request->validate([
            'search' => 'required|min:2',
        ]);
        
        $search = $_GET['search'];
        $products = Product::query()
        ->where('name','LIKE',"%{$search}%")
        ->orWhere('description','LIKE',"%{$search}%")
        ->paginate(9);
        $nproducts = Product::latest()->take(3)->get();
        $images = Product::all('image');
        $categories = Category::orderBy('name','ASC')->get();
        $allProducts = Product::all();
        $allGames = Game::all();
        return view('shop/shop',[
            'products' => $products,
            'nproducts' => $nproducts,
            'images' => $images,
            'categories' => $categories,
            'allProducts' => $allProducts,
            'min_value' => $this->min_value,
            'max_value' => $this->max_value,
            'allGames' => $allGames,
        ]);
    }
    
    


    
    public function render()
    {

        $categories = Category::orderBy('name','ASC')->get();
        $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->paginate(9);
        $nproducts = Product::latest()->take(3)->get();
        //get image column from product
        $images = Product::all('image');
        $allProducts = Product::all();
        $allGames = Game::all();


        if (Auth::id()) {
            $usertype = Auth::user()->usertype;

            if ($usertype == 'user') {
                return view('shop/shop', [
                    'products' => $products,
                    'nproducts' => $nproducts,
                    'images' => $images,
                    'categories' => $categories,
                    'min_value' => $this->min_value,
                    'max_value' => $this->max_value,
                    'allProducts' => $allProducts,
                    'allGames' => $allGames,
                ]);
            } else if ($usertype == 'admin') {
                return view('shop/shop', [
                    'products' => $products,
                    'nproducts' => $nproducts,
                    'categories' => $categories,
                    'images' => $images,
                    'min_value' => $this->min_value,
                    'max_value' => $this->max_value,
                    'allProducts' => $allProducts,
                ]);
            } else {
                return redirect()->back();
            }
        }

        // return view('components.shop',['products'=>$products, 'categories'=>$categories]);
    }
}