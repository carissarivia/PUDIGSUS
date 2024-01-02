@extends('layout.setelah-login')

@section('main')
    <div class="px-12 py-24 grow">
        <div class="bg-white rounded p-8 mt-4">
            <h1 class="text-4xl font-bold ">Profil</h1>

            <h2 class="text-lg font-medium mt-12">Edit Profil</h2>

            <form action="{{ route('dashboard.profile.update') }}" method="POST" enctype="multipart/form-data" class="mt-2">
                @csrf
                @method('PUT')

                <div class="flex flex-col gap-4">
                    <div class="flex flex-col gap-2">
                        <label for="name">Nama</label>
                        <input type="text"  name="name" id="name" class="border border-gray-300 rounded-md p-2" value="{{ old('name', $user->name) }}" />
                        @error('name')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="profile">Foto Profil</label>
                        <input type="file"  name="profile" id="profile" class="border border-gray-300 rounded-md p-2" />
                        @error('profile')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="generasi">Generasi</label>
                        <input type="text"  name="generasi" id="generasi" class="border border-gray-300 rounded-md p-2" value="{{ old('generasi', $user->generasi) }}" />
                        @error('generasi')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="program_studi">Program Studi</label>
                        <input type="text"  name="program_studi" id="program_studi" class="border border-gray-300 rounded-md p-2" value="{{ old('program_studi', $user->program_studi) }}" />
                        @error('program_studi')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="password">Password</label>
                        <input type="password"  name="password" id="password" class="border border-gray-300 rounded-md p-2" />
                        @error('password')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password"  name="password_confirmation" id="password_confirmation" class="border border-gray-300 rounded-md p-2" />
                        @error('password_confirmation')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md mt-4 flex w-fit hover:bg-blue-600 font-bold">Simpan</button>

                </div>
            </form>
        </div>
    </div>
@endsection
