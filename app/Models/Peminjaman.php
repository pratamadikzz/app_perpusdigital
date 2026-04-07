<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Book;

class Peminjaman extends Model
{
    protected $table = 'peminjamans';

    protected $casts = [
    'tanggal_peminjaman' => 'datetime',
];
    protected $fillable = [
        'nomor_peminjaman',
        'user_id',
        'buku_id',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'status',
        'alasan_penolakan',
        'denda',
        'denda_dibayar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buku()
    {
        return $this->belongsTo(Book::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'buku_id');
    }
}
