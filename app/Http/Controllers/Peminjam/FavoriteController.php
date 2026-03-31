<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Auth::user()->favorites;
        return view('peminjam.favorit.index', compact('favorites'));
    }

    public function toggle($bookId)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $user->favorites()->toggle($bookId);

        // Check if it's an AJAX request
        if (request()->ajax()) {
            $isFavorited = $user->favorites()->where('book_id', $bookId)->exists();
            return response()->json([
                'success' => true,
                'is_favorited' => $isFavorited,
                'message' => $isFavorited ? 'Buku ditambahkan ke favorit' : 'Buku dihapus dari favorit'
            ]);
        }

        return back();
    }
}
