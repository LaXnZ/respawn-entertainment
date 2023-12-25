<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Stripe\Service\Climate\OrderService;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'mobile' => 'required|string|max:20', 
            'email' => 'required|email|max:255',
            'line1' => 'required|string|max:255',
            'line2' => 'nullable|string|max:255',  
            'city' => 'required|string|max:255',
            'postalcode' => 'required|numeric',  
        ]);
    
        $order = Order::create($request->all());
    
        foreach (session('cart') as $product_id => $details) {
            // Retrieve the product based on the product_id
            $product = Product::find($product_id);
    
            // Check if the product is found
            if ($product) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'image' => $product->image,
                    'product_name' => $details['name'],
                    'product_price' => $details['price'],
                    'quantity' => $details['quantity'],
                    'total' => $details['price'] * $details['quantity'],
                ]);
            }
        }
    
        return redirect()->route('checkout.view')->with('success', 'Order placed successfully.');
    }
    


    public function index()
{
    $products = Product::paginate(10);
    
    $latestOrder = Order::where('user_id', Auth::id())
        ->latest('created_at')
        ->with('orderDetails') 
        ->first();

    $otherOrders = Order::where('user_id', Auth::id())
        ->where('id', '!=', optional($latestOrder)->id) 
        ->orderBy('created_at', 'desc')
        ->paginate(10);

    return view('checkout/order-confirmation', compact('latestOrder', 'otherOrders', 'products'));
}

public function view()
    {
        $products = Product::paginate(10);

    
      
        $orders = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);

        return view('checkout/orders', compact('orders', 'products'));
    }


}