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
        // Validasi dasar
        if ($requestData->action == 'create' && empty($requestData->category)) {
            return back()->with('error', 'Kategori tidak boleh kosong untuk request create');
        }

        // ======================
        // CREATE
        // ======================
        if ($requestData->action == 'create') {

            Book::create([
                'title' => $requestData->title,
                'author' => $requestData->author,
                'publisher' => $requestData->publisher,
                'category' => $requestData->category,
                'stock' => $requestData->stock,
                'publication_year' => $requestData->publication_year,
                'description' => $requestData->description,
                'cover' => $requestData->cover,
                'isbn' => $requestData->isbn ?? $this->generateISBN(),
                'languange' => $requestData->languange ?? 'Indonesia',
                'book_length' => $requestData->book_length,
                'book_weight' => $requestData->book_weight,
                'book_width' => $requestData->book_width,
                'number_of_books' => $requestData->number_of_books,
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
                    'category' => $requestData->category ?? $book->category,
                    'stock' => $requestData->stock,
                    'publication_year' => $requestData->publication_year,
                    'description' => $requestData->description,
                    'cover' => $requestData->cover ?? $book->cover,
                    'isbn' => $requestData->isbn ?? $book->isbn ?? $this->generateISBN(),
                    'languange' => $requestData->languange ?? $book->languange ?? 'Indonesia',
                    'book_length' => $requestData->book_length ?? $book->book_length,
                    'book_weight' => $requestData->book_weight ?? $book->book_weight,
                    'book_width' => $requestData->book_width ?? $book->book_width,
                    'number_of_books' => $requestData->number_of_books ?? $book->number_of_books,
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

    private function generateISBN()
    {
        do {
            $datePart = now()->format('Ymd');
            $randomPart = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            $isbn = "IS-{$datePart}-{$randomPart}";
        } while (Book::where('isbn', $isbn)->exists());

        return $isbn;
    }
}
