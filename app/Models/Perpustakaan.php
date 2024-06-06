<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perpustakaan extends Model
{
    protected $table = 'perpustakaan';
    use HasFactory;

    protected $fillable = [
        'namaperpustakaan',
        'alamat',
        'jam',
        'latiude',
        'longitude',
    ];
}
