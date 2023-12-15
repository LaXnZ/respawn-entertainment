<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request){
      
            
        $this->validate($request, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',  // Adjust max length as needed
            'email' => 'required|email|max:255',
            'line1' => 'required|string|max:255',
            'line2' => 'nullable|string|max:255',  // Allowing null or a string up to 255 characters
            'city' => 'required|string|max:255',
            'postalcode' => 'required|string|max:20',  // Adjust max length as needed
          
            'total' => 'required|numeric|min:0',  // Assuming total is a numeric field with a minimum value of 0
            'status' => 'required|string|max:255',
        ]);
        

        $requestData = $request->all();
    $requestData['purchased_products'] = json_decode($request->input('purchased_products'), true);

    Order::create($requestData);

        return redirect()->route('home')->with('success','skhagdk');
        // return redirect()->route('checkout.process');
}
}