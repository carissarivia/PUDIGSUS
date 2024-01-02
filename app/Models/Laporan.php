<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = "laporan";

    protected $fillable = [
        'book_id',
        'user_id',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
