<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();



        return view('page.dashboard.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required',
            'password' => 'nullable',
            'password_confirmation' => 'nullable|same:password',
        ]);

        $user->name = $request->name;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->generasi = $request->generasi ?? null;
        $user->program_studi = $request->program_studi ?? null;

        if ($request->hasFile('profile')) {
            File::delete(public_path('storage/profile/' . $user->profile));

            $profile = $request->file('profile');
            $profile_name = 'profile_' . time() . '.' . $request->nim . $profile->extension();
            $profile->storePubliclyAs('public/profile', $profile_name);
            $user->profile = $profile_name;
        }

        $user->save();

        return redirect()->route('dashboard.index')->with('message', 'Berhasil mengubah profil.');
    }
}
