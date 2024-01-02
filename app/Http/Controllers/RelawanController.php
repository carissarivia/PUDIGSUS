<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Models\User;
use Illuminate\Http\Request;

class RelawanController extends Controller
{
    public function index()
    {
        $relawan = User::where('role', 'mahasiswa')->where('is_mentor', true)->get();

        return view('page.relawan', compact('relawan'));
    }

    public function request($id)
    {
        $user = auth()->user();

        $mentoring = new Mentor;

        if ($user->id == $id) {
            return redirect()->back()->with('error', 'Tidak dapat mengirim permintaan kepada diri sendiri.');
        }

        $mentoring->mentor_id = $id;
        $mentoring->student_id = $user->id;

        $mentoring->save();

        return redirect()->back()->with('success', 'Berhasil mengirim permintaan kepada mentor. Silahkan menunggu konfirmasi dari mentor.');
    }
}
