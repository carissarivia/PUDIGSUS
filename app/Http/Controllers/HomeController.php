<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate(8);

        return view('page.home', compact('books'));
    }

    public function dashboard()
    {
        $user = auth()->user();

        if ($user->role == 'admin') {
            $data['mahasiswa_count'] = User::where('role', 'mahasiswa')->count();
            $data['mentor_count'] = User::where('is_mentor', true)->count();
        } else if ($user->role == 'mahasiswa' && $user->is_mentor) {
            $data['mentoring_count'] = $user->mentors->count();
        } else if ($user->role == 'mahasiswa') {
            $data['mentoring_count'] = $user->students->count();
        }

        $data['buku_count'] = Book::count();

        return view('page.dashboard', compact('data'));
    }

    public function lokasi()
    {
        return view('page.lokasi');
    }
}
