<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $sudahReview = Review::where('user_id', Auth::id())
            ->where('book_id', $request->book_id)
            ->exists();

        if ($sudahReview) {
            return back()->with('error', 'Anda sudah memberi ulasan');
        }

        Review::create([
            'user_id' => Auth::id(),
            'book_id' => $request->book_id,
            'rating' => $request->rating,
            'ulasan' => $request->ulasan
        ]);

        return back()->with('success', 'Terima kasih atas ulasan anda');
    }
}
