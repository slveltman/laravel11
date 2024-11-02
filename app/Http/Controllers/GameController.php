<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\review;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        // Start by creating a query object
        $query = Game::query();

        // Get the search input
        $search = $request->input('search');

        // If search is provided, filter the results by game name of description
        if ($search) {
            $query->where(function($zoek) use ($search) {
                $zoek->where('gameName', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%");
            });
        }

        // Get the sort option from the request
        $sort_by = $request->query('sort_by');

        // Apply sorting logic based on the user's choice
        if ($sort_by == 'price_asc') {
            $query->orderBy('price');
        } elseif ($sort_by == 'price_desc') {
            $query->orderBy('price', 'desc');
        } elseif ($sort_by == 'rating_asc') {
            $query->orderBy('rating');
        } elseif ($sort_by == 'rating_desc') {
            $query->orderBy('rating', 'desc');
        }

        // Filter by price range
        $price_filter = $request->query('price_filter');

        if ($price_filter == 'under_30') {
            $query->where('price', '<', 30);
        } elseif ($price_filter == 'over_30') {
            $query->where('price', '>=', 30);
        }

        // Filter by rating range
        $rating_filter = $request->query('rating_filter');

        if ($rating_filter == 'over_3.5') {
            $query->where('rating', '>', 3.5);
        }elseif ($rating_filter == 'under_3.5') {
            $query->where('rating', '<=', 3.5);
        }

        // Get the final results after applying search, sort, price, and rating filter
        $games = $query->get();

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
        // Controleer of de ingelogde gebruiker minstens 3 reviews heeft geschreven
        $user = auth()->user();
        $reviewCount = Review::where('user_id', $user->id)->count();

        if ($reviewCount < 3) {
            // Geef een foutmelding en stuur de gebruiker terug naar de index pagina
            return redirect()->route('games.index')->with('error', 'You need to review at least 3 times before you can create a game.');
        }

        // Als de gebruiker voldoende reviews heeft ga dan door met het opslaan van de game
        $validatedData = $request->validate([
            'gameName' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'rating' => 'required|numeric|min:0|max:5',
        ]);

        // Game opslaan met de gegevens van de gebruiker
        $game = new Game();
        $game->user_id = $user->id;
        $game->gameName = $validatedData['gameName'];
        $game->description = $validatedData['description'];
        $game->price = $validatedData['price'];
        $game->rating = $validatedData['rating'];
        $game->save();

        return redirect()->route('games.index')->with('success', 'Game successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        //laat alle de games zien
        $game->load('reviews');
        return view('games.show', ['game' => $game]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        // Zorg ervoor dat de ingelogde gebruiker alleen zijn eigen games kan bewerken
        if ($game->user_id !== auth()->id()&& !auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        // Return the view with the game data
        return view('games.edit', ['game' => $game]);
    }

    public function update(Request $request, Game $game)
    {
        // Controleer of het wel echt de user is
        if ($game->user_id !== auth()->id() && !auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        //validatie van de gegevens
        $request->validate([
            'gameName' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'rating' => 'required|numeric|min:0|max:5|regex:/^\d+(\.\d{1})?$/',
        ]);


        //behandel de request
        $game->update([
            'gameName' => $request->gameName,
            'price' => $request->price,
            'description' => $request->description,
            'rating' => $request->rating,
        ]);


        // Redirect back to the index with a success message
        return redirect()->route('games.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        // Controleer of het wel echt de user is
        if ($game->user_id !== auth()->id() && !auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        // Delete the game
        $game->delete();

        // Redirect to the games index met bericht
        return redirect()->route('games.index')->with('success', 'Game deleted successfully!');
    }
}
