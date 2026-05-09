<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReviewController
{
    public function index()
    {
        $reviews = Review::latest()->get();
        return Inertia::render('Review/Index', compact('reviews'));
    }

    public function create()
    {
        return Inertia('Review/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'reviewer_name' => 'required|string|max:255',
            'reviewer_position' => 'required|string|max:255',
            'review_text' => 'required',
        ]);

        $review = new Review;
        $review->reviewer_name = $request->reviewer_name;
        $review->reviewer_position = $request->reviewer_position;
        $review->review_text = $request->review_text;
        $review->save();

        return redirect()->route('review.index')->with('message', 'Review created successfully');
    }

    public function edit($id)
    {
        $review = Review::find($id);
        return Inertia::render('Review/Edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'reviewer_name' => 'required|string|max:255',
            'reviewer_position' => 'required|string|max:255',
            'review_text' => 'required',
        ]);

        $review = Review::find($id);
        $review->reviewer_name = $request->reviewer_name;
        $review->reviewer_position = $request->reviewer_position;
        $review->review_text = $request->review_text;
        $review->save();

        return redirect()->route('review.index')->with('message', 'Review updated successfully');
    }

    public function destroy($id)
    {
        $review = Review::find($id);
        $review->delete();

        return redirect()->route('review.index')->with('message', 'Review deleted successfully');
    }
}
