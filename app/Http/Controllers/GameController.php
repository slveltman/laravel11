<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::all();
        return view('games.index', ['games' => $games]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $game = new Game();
        $game->gameName = $request->input('gameName');
        $game->image = 'default.png';
        $game->price = $request->input('price');
        $game->description = $request->input('description');
        $game->rating = $request->input('rating');
        $game->save();
        return redirect()-> route('games.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        // This will retrieve a single game instance, not a collection
//        $game = Game::findOrFail($games);
        return view('games.show', ['game' => $game]);


    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $games)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $games)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        // Delete the game
        $game->delete();

        // Redirect to the games index with a success message
        return redirect()->route('games.index')->with('success', 'Game deleted successfully!');
    }

}
