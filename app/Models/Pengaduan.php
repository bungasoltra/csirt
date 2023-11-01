<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan'; // Nama tabel dalam database

    protected $fillable = [
        'ticket_number',
        'name',
        'no_hp',
        'opd',
        'isi_pengaduan',
        'lampiran',
        'number',
    ];
    protected $guarded = [
        'status',
    ];
}
