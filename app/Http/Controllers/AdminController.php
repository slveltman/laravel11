<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\review;
use Illuminate\Http\Request;
use function Pest\Laravel\get;

class AdminController extends Controller
{
    public function index()
    {
        $games = Game::all();
        $reviews = Review::all();
        // Alleen admins mogen deze pagina zien


        if (auth()->user()->is_admin) {
            return view('admin.index', compact('games', 'reviews')); // Toon de admin dashboard view
        } else {
            return redirect('/games'); // Geen admin stuur terug naar de homepage
        }

    }
}
