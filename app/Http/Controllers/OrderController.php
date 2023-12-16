<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class OrderController extends Controller
{
    public function store(Request $request){
      
            
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
        

        $requestData = $request->all();
 
        Order::create($requestData);
        
        return redirect()->route('checkout.view')->with('success', 'Order placed successfully.');
    }


    public function index()
    {
        $products = Product::paginate(10);
        
        $latestOrder = Order::where('user_id', Auth::id())
        ->latest('created_at')
        ->first();

   
    $otherOrders = Order::where('user_id', Auth::id())
        ->where('id', '!=', optional($latestOrder)->id) 
        ->orderBy('created_at', 'desc')
        ->paginate(10);

    return view('checkout/order-confirmation', compact('latestOrder', 'otherOrders', 'products'));

    }
}