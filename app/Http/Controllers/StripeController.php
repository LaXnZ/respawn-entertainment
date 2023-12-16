<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('checkout/checkout', compact('products'));
    }
    
    
    
    public function checkout(){
        
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $products = Product::all();

        $lineItems = [];

      
        foreach (session('cart') as $product_id => $details) {
            foreach ($products as $product) {
                if ($product->id == $product_id) {
                   
                    $lineItems[] = [
                        'price_data' => [
                            'currency' => 'lkr', 
                            'product_data' => [
                                'name' => $details['name'],
                            ],
                            'unit_amount' => $details['price'] * 100, 
                        ],
                        'quantity' => $details['quantity'],
                    ];
                }
            }
        }
        
        
        // Create the Stripe Checkout Session
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'], 
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout'),
        ]);
        

        return redirect()->away($session->url);
    }

    public function success()
    {

        $products = Product::paginate(10);
        $latestOrder = Order::where('user_id', Auth::id())
            ->latest('created_at')
            ->with('orderDetails') 
            ->first();
            
        $otherOrders = Order::where('user_id', Auth::id())
            ->where('id', '!=', optional($latestOrder)->id) 
            ->orderBy('created_at', 'desc')
            ->paginate(3);
            
            
        $orderDetails = Order::where('user_id', Auth::id())
            ->latest('created_at')
            ->with('orderDetails') 
            ->first();
            
   
        session()->forget('cart');
        return view('checkout/success' , compact('latestOrder', 'otherOrders', 'products', 'orderDetails'));
    }
}