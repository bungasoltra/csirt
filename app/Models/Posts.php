<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
        'judul',
        'tanggal',
        'isi',
        'gambar',
    ];
    protected $guarded = ['status'];
}
