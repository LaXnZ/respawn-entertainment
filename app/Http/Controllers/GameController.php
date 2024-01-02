<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Product;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::paginate(10);
        $allGames = Game::all();
        $allProducts = Product::all();
        $actionGames = Game::where('genre', 'action')->get();
        $adventureGames = Game::where('genre', 'adventure')->get();
        $rpgGames = Game::where('genre', 'rpg')->get();
        $shooterGames = Game::where('genre', 'shooter')->get();
        $simulationGames = Game::where('genre', 'simulation')->get();
        $strategyGames = Game::where('genre', 'strategy')->get();
        $brGames = Game::where('genre', 'battle royale')->get();

        return view('games.index', compact('games', 'allGames', 'allProducts', 'actionGames', 'adventureGames', 'rpgGames', 'shooterGames', 'simulationGames', 'strategyGames', 'brGames'));
    }

  
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|min:2',
        ]);
        
        $query = $_GET['search'];

        $allGames = Game::all();    
        $allProducts = Product::all();    
        
        $games = Game::query()
        ->where('name','LIKE',"%{$query}%")
        ->orWhere('genre','LIKE',"%{$query}%")
        ->orWhere('description','LIKE',"%{$query}%")
        ->paginate(10);

        return view('games.index', compact('games', 'allGames', 'allProducts'));
    }
    
    public function showCategory($genre)
    {

        $games = Game::where('genre', $genre)->get();
        $allGames = Game::all();
        $allProducts = Product::all();


        return view('games.partials.category', ['games' => $games, 'genre' => $genre, 'allGames' => $allGames, 'allProducts' => $allProducts]);
    }


    public function details(string $id)
    {
        $game = Game::find($id);
        $allGames = Game::all();
        $allProducts = Product::all();
        

        return view('games.partials.details-component', compact('game', 'allGames', 'allProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}