@extends('layout.setelah-login')

@section('main')
    <div class="px-12 py-24 grow">
        <div class="bg-white rounded p-8 mt-4">
            <h1 class="text-4xl font-bold ">Selamat Datang</h1>

            <p class="mt-2 text-medium text-gray-700">
                @if (auth()->user()->role == 'admin')
                    Selamat datang di aplikasi Perpustakaan Digital Khusus! Anda dapat mengelola buku digital dan pengguna
                    di sini.
                @elseif (auth()->user()->role == 'mahasiswa')
                    Selamat datang di aplikasi Perpustakaan Digital Khusus! Anda dapat melihat informasi mengenai mentoring
                    anda di sini.
                @endif
            </p>

            <div class="grid grid-cols-3 gap-8 mt-8">
                <div class="bg-gradient-to-br from-green-400 to-green-500 text-white px-8 py-6 rounded">
                    <h2 class="text-xl font-medium">Jumlah Buku Digital</h2>
                    <p class="text-4xl font-bold mt-2">{{ $data['buku_count'] }}</p>
                </div>
                @if (auth()->user()->role == 'admin')
                    <div class="bg-gradient-to-br from-cyan-400 to-cyan-500 text-white px-8 py-6 rounded">
                        <h2 class="text-xl font-medium">Jumlah Pengguna</h2>
                        <p class="text-4xl font-bold mt-2">{{ $data['mahasiswa_count'] }}</p>
                    </div>
                    <div class="bg-gradient-to-br from-red-400 to-red-500 text-white px-8 py-6 rounded">
                        <h2 class="text-xl font-medium">Jumlah Mentor</h2>
                        <p class="text-4xl font-bold mt-2">{{ $data['mentor_count'] }}</p>
                    </div>
                @else
                    <div class="bg-gradient-to-br from-cyan-400 to-cyan-500 text-white px-8 py-6 rounded">
                        <h2 class="text-xl font-medium">Jumlah Mentoring</h2>
                        <p class="text-4xl font-bold mt-2">{{ $data['mentoring_count'] }}</p>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
