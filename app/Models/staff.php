<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    protected $table = 'staff';

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'alamat',
        'role'
    ];

    protected $hidden = [
        'password'
    ];
}
