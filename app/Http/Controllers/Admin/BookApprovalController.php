<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookRequest;
use App\Models\Book;

class BookApprovalController extends Controller
{
    public function index()
    {
        $requests = BookRequest::where('status', 'pending')->get();
        $pendingCount = BookRequest::where('status', 'pending')->count();

        return view('admin.book_requests.index', compact('requests', 'pendingCount'));
    }


    public function approve(BookRequest $requestData)
    {
        // ======================
        // CREATE
        // ======================
        if ($requestData->action == 'create') {

            Book::create([
                'title' => $requestData->title,
                'author' => $requestData->author,
                'publisher' => $requestData->publisher,
                'category' => $requestData->KategoriID,
                'stock' => $requestData->stock,
                'publication_year' => $requestData->publication_year,
                'description' => $requestData->description,
                'cover' => $requestData->cover,
            ]);
        }

        // ======================
        // UPDATE
        // ======================
        if ($requestData->action == 'update') {

            $book = Book::find($requestData->book_id);

            if ($book) {
                $book->update([
                    'title' => $requestData->title,
                    'author' => $requestData->author,
                    'publisher' => $requestData->publisher,
                    'category' => $requestData->KategoriID,
                    'stock' => $requestData->stock,
                    'publication_year' => $requestData->publication_year,
                    'description' => $requestData->description,
                    'cover' => $requestData->cover ?? $book->cover,
                ]);
            }
        }

        // ======================
        // DELETE
        // ======================
        if ($requestData->action == 'delete') {
            Book::find($requestData->book_id)?->delete();
        }

        // Ubah status request
        $requestData->update([
            'status' => 'approved'
        ]);

        return back()->with('success', 'Request berhasil disetujui');
    }

    public function reject(BookRequest $requestData)
    {
        $requestData->update([
            'status' => 'rejected'
        ]);

        return back()->with('success', 'Request ditolak');
    }
}
