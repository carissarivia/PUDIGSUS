<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Mentor;
use Illuminate\Http\Request;

class MentoringController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role == 'admin') {
            $mentorings = Mentor::all();
        } else if ($user->is_mentor) {
            $mentorings = Mentor::where('mentor_id', $user->id)->get();
        } else {
            $mentorings = Mentor::where('student_id', $user->id)->get();
        }

        return view('page.dashboard.mentoring.index', compact('mentorings'));
    }

    public function edit($id)
    {
        $mentoring = Mentor::findOrFail($id);

        $user = auth()->user();

        if ($user->id != $mentoring->mentor_id) {
            return redirect()->back()->with('error', 'Tidak dapat mengedit permintaan mentoring orang lain.');
        }

        return view('page.dashboard.mentoring.edit', compact('mentoring'));
    }

    public function update(Request $request, $id)
    {
        $mentoring = Mentor::findOrFail($id);

        $user = auth()->user();

        if ($user->id != $mentoring->mentor_id) {
            return redirect()->back()->with('error', 'Tidak dapat mengedit permintaan mentoring orang lain.');
        }

        $request->validate([
            'description' => 'required',
            'status' => 'required',
        ]);

        $mentoring->status = $request->status;
        $mentoring->description = $request->description;

        $mentoring->save();

        return redirect()->route('dashboard.mentoring.index')->with('message', 'Berhasil mengubah permintaan mentoring.');
    }

}
