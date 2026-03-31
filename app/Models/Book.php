<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KategoriBuku;
use App\Models\User;


class Book extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'cover',
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
        'description'
    ];


    public function category()
    {
        return $this->belongsTo(KategoriBuku::class, 'KategoriID', 'id');
    }

    public function favoredBy()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    public function reviews()
    {
        return $this->hasMany(\App\Models\Review::class);
    }
}
