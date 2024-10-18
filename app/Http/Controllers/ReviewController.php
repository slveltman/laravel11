<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = review::all();
        return view('reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Game $game)
    {
        return view('reviews.create', ['game' => $game]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $review = new Review();
        $review->game_id = $request->input('game_id');
//        $review->user_id = auth()->id();  // Assuming users are authenticated
        $review->rating = $request->input('rating');
        $review->review = $request->input('review');
        $review->save();

        return redirect()->route('games.show', $request->input('game_id'))->with('success', 'Review submitted successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
//        $game->reviews;
        return view('reviews.show', ['reviews' => $game->reviews]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(review $review)
    {
        //
    }
}
