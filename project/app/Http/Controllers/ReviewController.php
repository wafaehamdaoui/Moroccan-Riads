<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'comment' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Create a new Review instance
        $review = new Review();
        $review->name = $request->input('name');
        $review->comment = $request->input('comment');
        $review->ratting = $request->input('rating');
        $review->created_at = date('Y-m-d');

        // Save the review
        $review->save();

        // Optionally, you can redirect the user or show a success message
        return redirect()->route('room.show')->with('success', 'Review added successfully!');
    }
}
