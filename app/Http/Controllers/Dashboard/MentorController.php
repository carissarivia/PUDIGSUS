<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'mahasiswa')->get();

        return view('page.dashboard.mentor.index', compact('users'));
    }

    public function verify($id)
    {
        $user = User::findOrFail($id);

        $user->is_mentor = true;

        $user->save();

        return redirect()->route('dashboard.mentor.index')->with('message', 'Mahasiswa berhasil diverifikasi sebagai mentor');
    }

    public function unverify($id)
    {
        $user = User::findOrFail($id);

        $user->is_mentor = false;

        $user->save();

        return redirect()->route('dashboard.mentor.index')->with('message', 'Mahasiswa berhasil dihapus sebagai mentor');
    }

}
