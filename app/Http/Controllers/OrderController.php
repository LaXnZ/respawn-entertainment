<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Stripe\Service\Climate\OrderService;
use App\Models\User;
use App\Models\Game;

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
            $game = Game::find($product_id);

            //first check the type to see if it is a product or a game, then store
            if ($details['type'] == 'product') {
                $order->orderDetails()->create([
                    'order_id' => $order->id,
                    'order_type' => $details['type'],
                    'image' => $product->image,
                    'product_id' => $product_id,
                    'product_name' => $product->name,
                    'quantity' => $details['quantity'],
                    'product_price' => $product->regular_price,
                    'total' => $product->regular_price * $details['quantity'],
                ]);
            } else if ($details['type'] == 'game') {
                $order->orderDetails()->create([
                    'order_id' => $order->id,
                    'order_type' => $details['type'],
                    'image' => $game->image,
                    'product_id' => $product_id,
                    'product_name' => $game->name,
                    'quantity' => $details['quantity'],
                    'product_price' => $game->price,
                    'total' => $game->price * $details['quantity'],

                ]);
            }
        }

        return redirect()->route('checkout.view')->with('success', 'Order placed successfully.');
    }



    public function index()
    {
        $products = Product::paginate(10);
        $allProducts = Product::all();
        $allGames = Game::all();

        $latestOrder = Order::where('user_id', Auth::id())
            ->latest('created_at')
            ->with('orderDetails')
            ->first();

        $otherOrders = Order::where('user_id', Auth::id())
            ->where('id', '!=', optional($latestOrder)->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('checkout/order-confirmation', compact('latestOrder', 'otherOrders', 'products', 'allProducts', 'allGames'));
    }

    public function view()
    {
        $products = Product::paginate(10);



        $orders = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);

        return view('checkout/orders', compact('orders', 'products'));
    }


    public function adminOrderIndex(Request $request)
    {
        $users = User::all();
        $selectedUserId = $request->query('user');

        if ($selectedUserId) {

            $orders = Order::where('user_id', $selectedUserId)->paginate(10);
        } else {

            $orders = Order::paginate(10);
        }

        return view('admin/orders/orders', compact('orders', 'users'));
    }
}