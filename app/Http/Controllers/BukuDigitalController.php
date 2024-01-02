<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BukuDigitalController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $buku = Book::where('judul', 'LIKE', '%' . $request->search . '%')
                ->orWhere('penulis', 'LIKE', '%' . $request->search . '%')
                ->orWhere('tahun_terbit', 'LIKE', '%' . $request->search . '%')
                ->get();
        } else {
            $buku = Book::all();
        }

        return view('page.buku-digital.index', compact('buku'));
    }

    public function show($id)
    {
        $buku = Book::all();

        $show_detail = $id;
        $book_detail = Book::findOrFail($id);

        $book_detail->laporan()->create([
            'user_id' => auth()->user()->id,
        ]);


        return view('page.buku-digital.index', compact('buku', 'show_detail'));
    }
}
