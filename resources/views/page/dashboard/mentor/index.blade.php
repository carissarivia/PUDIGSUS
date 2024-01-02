@extends('layout.setelah-login')

@section('main')
    <div class="px-12 py-24 grow">
        <div class="bg-white rounded p-8 mt-4">
            <h1 class="text-4xl font-bold ">Daftar Mentor</h1>

            <p class="mt-2 text-medium text-gray-700">
                Anda dapat melakukan konfirmasi mentor di sini.
            </p>

            <div class="mt-4">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Generasi</th>
                            <th>Program Studi</th>
                            <th>Profil</th>
                            <th>Status Mentor</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td width="1">
                                    {{ $loop->iteration }}
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->nim }}</td>
                                <td>{{ $item->generasi ?? '-Belum Diatur-' }}</td>
                                <td>{{ $item->program_studi ?? '-Belum Diatur-' }}</td>
                                <td>
                                    @if ($item->profile)
                                        <img src="{{ asset('storage/profile/' . $item->profile) }}"
                                            class="w-12 h-12 rounded-full object-cover">
                                    @else
                                        -Belum Diatur-
                                    @endif
                                </td>
                                <td>
                                    @if ($item->is_mentor)
                                        <div class="bg-green-500 px-3 text-white font-medium py-1 rounded w-fit mx-auto">
                                            Sudah Diverifikasi
                                        </div>
                                    @else
                                        <div class="bg-red-500 px-3 text-white font-medium py-1 rounded w-fit mx-auto">
                                            Belum Diverifikasi
                                        </div>
                                    @endif
                                </td>

                                <td width="1">
                                    <div class="flex items-center gap-2">
                                        @if ($item->is_mentor)
                                            <a href="{{ route('dashboard.mentor.unverify', $item->id) }}">
                                                <button class="text-white bg-red-500  px-6 py-2 rounded">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </a>
                                        @else
                                            <a href="{{ route('dashboard.mentor.verify', $item->id) }}">
                                                <button class="text-white bg-green-500 px-6 py-2 rounded">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
