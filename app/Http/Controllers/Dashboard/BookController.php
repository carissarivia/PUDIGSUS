<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Str;

class BookController extends Controller
{
    public function index()
    {
        $buku = Book::all()->sortByDesc('created_at');
        return view('page.dashboard.book.index', compact('buku'));
    }

    public function create()
    {
        return view('page.dashboard.book.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'file' => 'required|mimes:pdf|max:20000',
            'audio' => 'required|mimes:mp3,wav,mpeg|max:20000',
        ]);

        $name_hash = Str::random(32);

        $cover = $request->file('cover');
        $cover_name = 'cover_' . $name_hash . '.' . $cover->extension();
        $cover->storePubliclyAs('public/buku/cover', $cover_name);

        $file = $request->file('file');
        $file_name = 'file_' . $name_hash . '.' . $file->extension();
        $file->storePubliclyAs('public/buku/files', $file_name);

        $audio = $request->file('audio');
        $audio_name = 'audio_' . $name_hash . '.' . $audio->extension();
        $audio->storePubliclyAs('public/buku/audio', $audio_name);

        Book::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tahun_terbit' => $request->tahun_terbit,
            'cover' => $cover_name,
            'audio'=> $audio_name,
            'file' => $file_name,
        ]);

        return redirect()->route('dashboard.book.index')->with('message', 'Buku berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $buku = Book::findOrFail($id);

        File::delete(public_path('storage/buku/cover/' . $buku->cover));
        File::delete(public_path('storage/buku/files/' . $buku->file));
        File::delete(public_path('storage/buku/audio/' . $buku->audio));

        $buku->delete();

        return redirect()->route('dashboard.book.index')->with('message', 'Buku berhasil dihapus');
    }

    public function edit($id)
    {
        $buku = Book::findOrFail($id);

        return view('page.dashboard.book.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'file' => 'mimes:pdf|max:20000',
            'audio' => 'mimes:mp3,wav,mpeg|max:20000',
        ]);

        $buku = Book::findOrFail($id);


        $name_hash = Str::random(32);

        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->tahun_terbit = $request->tahun_terbit;

        if ($request->hasFile('cover')) {


            File::delete(public_path('storage/buku/cover/' . $buku->cover));

            $cover = $request->file('cover');
            $cover_name = 'cover_' . $name_hash . '.' . $cover->extension();
            $cover->storePubliclyAs('public/buku/cover', $cover_name);

            $buku->cover = $cover_name;
        }

        if ($request->hasFile('file')) {
            File::delete(public_path('storage/buku/files/' . $buku->file));

            $file = $request->file('file');
            $file_name = 'file_' . $name_hash . '.' . $file->extension();
            $file->storePubliclyAs('public/buku/files', $file_name);

            $buku->file = $file_name;
        }

        if ($request->hasFile('audio')) {
            File::delete(public_path('storage/buku/audio/' . $buku->audio));

            $audio = $request->file('audio');
            $audio_name = 'audio_' . $name_hash . '.' . $audio->extension();
            $audio->storePubliclyAs('public/buku/audio', $audio_name);

            $buku->audio = $audio_name;
        }

        $buku->save();

        return redirect()->route('dashboard.book.index')->with('message', 'Buku berhasil diubah');
    }

    public function download_file($id)
    {
        $buku = Book::findOrFail($id);

        return Storage::response('public/buku/files/' . $buku->file);
    }

    public function download_audio($id)
    {
        $buku = Book::findOrFail($id);

        return Storage::response('public/buku/audio/' . $buku->audio);
    }
}
