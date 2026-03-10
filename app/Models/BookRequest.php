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
        'KategoriID',
        'stock',
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
