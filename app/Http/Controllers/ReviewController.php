<?php

namespace App\Http\Controllers;

use App\Review;
use App\Game;
use App\Machine;
use App\User;

use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    public function index(Review $review)
    {
        return view('reviews/index')->with(['reviews' => $review->getReview()]);
    }
    
    public function show(Review $review)
    {
        return view('reviews/show')->with(['review' => $review]);  
    }
    
    public function create(Game $game, Machine $machine)
    {
        return view('/reviews/create')->with(['games' => $game->get(), 'machines' => $machine->get()]);
    }
    
    public function store(ReviewRequest $request, Review $review)
    {
        $input = $request['review'];
        $review->fill($input)->save();
        return redirect('/reviews/' . $review->id);
    }
    
    public function edit(Review $review, Game $game, Machine $machine)
    {
        return view('reviews/edit')->with(['review' => $review, 'games' => $game->get(), 'machines' => $machine->get()]);
    }
    
    public function update(ReviewRequest $request, Review $review)
    {
        $input_review = $request['review'];
        $review->fill($input_review)->save();
        return redirect('/reviews/' . $review->id);
    }
    
    public function delete(Review $review)
    {
        $review->delete();
        return redirect('/');
    }
}
