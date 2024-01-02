<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "buku";

    protected $fillable = [
        'judul',
        'penulis',
        'tahun_terbit',
        'cover',
        'file',
        'audio',
    ];

    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }
}
