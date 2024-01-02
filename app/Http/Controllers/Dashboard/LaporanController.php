<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $books = Book::withCount('laporan')->get();

        return view('page.dashboard.laporan.index', compact('books'));
    }
}
