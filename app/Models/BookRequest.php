<?php

namespace App\Models;

use App\Models\KategoriBuku;
use Illuminate\Database\Eloquent\Model;

class BookRequest extends Model
{
    protected $fillable = [
        'book_id',
        'action',
        'title',
        'author',
        'publisher',
        'category',
        'stock',
        'isbn',
        'languange',
        'book_length',
        'book_weight',
        'book_width',
        'number_of_books',
        'publication_year',
        'description',
        'cover',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(KategoriBuku::class);
    }
}
