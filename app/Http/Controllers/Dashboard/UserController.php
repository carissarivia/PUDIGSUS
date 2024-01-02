<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('page.dashboard.user.index', compact('users'));
    }

    public function create()
    {
        return view('page.dashboard.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'nim' => 'required|unique:users,nim',
            'profile' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->nim = $request->nim;
        $user->role = $request->role;
        $user->program_studi = $request->program_studi ?? null;
        $user->generasi = $request->generasi ?? null;
        $user->password = bcrypt($request->password);

        if ($request->hasFile('profile')) {
            $profile = $request->file('profile');
            $profile_name = 'profile_' . time() . '.' . $request->nim . '.' . $profile->extension();
            $profile->storePubliclyAs('public/profile', $profile_name);
            $user->profile = $profile_name;
        }

        $user->save();

        return redirect()->route('dashboard.user.index')->with('message', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('page.dashboard.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'nim' => 'required|unique:users,nim,' . $id,
            'profile' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'password' => 'nullable|min:8',
            'password_confirmation' => 'nullable|same:password'
        ]);

        $user->name = $request->name;
        $user->nim = $request->nim;
        $user->role = $request->role;
        $user->program_studi = $request->program_studi ?? null;
        $user->generasi = $request->generasi ?? null;

        if ($request->hasFile('profile')) {
            File::delete(public_path('storage/profile/' . $user->profile));

            $profile = $request->file('profile');
            $profile_name = 'profile_' . time() . '.' . $request->nim . $profile->extension();
            $profile->storePubliclyAs('public/profile', $profile_name);
            $user->profile = $profile_name;
        }

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('dashboard.user.index')->with('message', 'User berhasil diubah');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        File::delete(public_path('storage/profile/' . $user->profile));

        $user->delete();

        return redirect()->route('dashboard.user.index')->with('message', 'User berhasil dihapus');
    }
}
