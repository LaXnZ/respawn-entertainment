<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use illuminate\support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Appointment;
use App\Models\Game;
use App\Models\OrderDetail;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $users = User::all();
        $orders = Order::all();
        $reservations = Appointment::all();
        $games = Game::all();

        //product analytics
        $popularProducts = Product::orderBy('views', 'desc')->take(5)->get();
        $mostOrderedProducts = Order::with('orderDetails')->get()->pluck('orderDetails')->flatten()->pluck('product_name')->countBy()->sortDesc()->take(5);
        $mostOrderedProducts = Product::whereIn('name', $mostOrderedProducts->keys())->get();
        $mostPricedProducts = Product::orderBy('regular_price', 'desc')->take(5)->get();

        //game analytics
        $popularGames = Game::orderBy('views', 'desc')->take(5)->get();
        $mostOrderedGames = Order::with('orderDetails')->get()->pluck('orderDetails')->flatten()->pluck('product_name')->countBy()->sortDesc()->take(5);
        $mostOrderedGames = Game::whereIn('name', $mostOrderedGames->keys())->get();
        $mostPricedGames = Game::orderBy('price', 'desc')->take(5)->get();


        //order analytics
        $totalSales = OrderDetail::all()->sum('total');
        $currentMonthOrders = OrderDetail::whereYear('created_at', '=', now()->year)
            ->whereMonth('created_at', '=', now()->month)
            ->get();

        $currentMonthSales = OrderDetail::whereYear('created_at', '=', now()->year)
        ->whereMonth('created_at', '=', now()->month)
        ->get()->sum('total');

        $lastMonthOrders = OrderDetail::whereYear('created_at', '=', now()->subMonth()->year)
            ->whereMonth('created_at', '=', now()->subMonth()->month)
            ->get();


        if (Auth::id()) {
            $usertype = Auth::user()->usertype;

            if ($usertype == 'user') {
                return view('user/user_homepage');
            } else if ($usertype == 'admin') {
                return view('admin/admin_dashboard')->with('products', $products)
                    ->with('categories', $categories)->with('users', $users)->with('orders', $orders)->with('reservations', $reservations)
                    ->with('games', $games)->with('popularProducts', $popularProducts)->with('mostOrderedProducts', $mostOrderedProducts)
                    ->with('mostPricedProducts', $mostPricedProducts)->with('popularGames', $popularGames)->with('mostOrderedGames', $mostOrderedGames)
                    ->with('mostPricedGames', $mostPricedGames)->with('totalSales', $totalSales)->with('currentMonthOrders', $currentMonthOrders)
                    ->with('lastMonthOrders', $lastMonthOrders)->with('currentMonthSales',$currentMonthSales);
            } else {
                return redirect()->back();
            }
        }
    }

    public function aboutUs()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;

            if ($usertype == 'user') {
                return view('components/about-us');
            } else if ($usertype == 'admin') {
                return view('components/about-us');
            } else {
                return redirect()->back();
            }
        }
    }

    public function contactUs()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;

            if ($usertype == 'user') {
                return view('components/contact-us');
            } else if ($usertype == 'admin') {
                return view('components/contact-us');
            } else {
                return redirect()->back();
            }
        }
    }
}