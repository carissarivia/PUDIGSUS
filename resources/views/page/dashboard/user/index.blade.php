@extends('layout.setelah-login')

@section('main')
    <div class="px-12 py-24 grow">

        <div class="bg-white rounded p-8 mt-4">
            <h1 class="text-4xl font-bold ">Daftar User</h1>

            <div class="mt-2">
                <a href="{{ route('dashboard.user.create') }}" class="contents">
                    <button class="bg-blue-500 text-white px-6 py-3 rounded-md mt-4 flex w-fit hover:bg-blue-600 font-bold w-fit">Tambah User</button>
                </a>
            </div>

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
                            <th>Role</th>
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
                                    <img src="{{ asset('storage/profile/'.$item->profile) }}" class="w-12 h-12 rounded-full object-cover">
                                @else
                                    -Belum Diatur-
                                @endif
                            </td>
                            <td class="uppercase">{{ $item->role }}</td>

                            <td width="1">
                                <div class="flex items-center gap-2">
                                    <a class="text-white bg-yellow-500 px-6 py-2 rounded block" href="{{ route('dashboard.user.edit', $item->id) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('dashboard.user.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus User Ini?')"
                                        >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-white bg-red-500 px-6 py-2 rounded">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
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
