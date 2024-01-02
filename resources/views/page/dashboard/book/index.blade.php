@extends('layout.setelah-login')

@section('main')
    <div class="px-12 py-24 grow">

        <div class="bg-white rounded p-8 mt-4">
            <h1 class="text-4xl font-bold">Daftar E-Book</h1>

            <a href="{{ route('dashboard.book.create') }}" class="contents">
                <button
                    class="bg-blue-500 text-white px-6 py-3 rounded-md mt-4 flex w-fit hover:bg-blue-600 font-bold w-fit">Tambah
                    E-Book</button>
            </a>

            <div class="mt-4">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Data E-Book</th>
                            <th>Penulis</th>
                            <th>Tahun Terbit</th>
                            <th>Cover</th>
                            <th>File</th>
                            <th>Audio</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buku as $item)
                            <tr>
                                <td width="1">
                                    {{ $loop->iteration }}
                                </td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->penulis }}</td>
                                <td>{{ $item->tahun_terbit }}</td>
                                <td>
                                    <img src="{{ asset('storage/buku/cover/' . $item->cover) }}"
                                        class="aspect-[3/4] w-24 object-contain">
                                </td>
                                <td>
                                    <a href="{{ route('book.download_file', $item->id) }}"
                                        class="text-blue-500 hover:underline" target="_blank">
                                        Download
                                    </a>

                                </td>
                                <td>
                                    <a href="{{ route('book.download_audio', $item->id) }}"
                                        class="text-blue-500 hover:underline" target="_blank">
                                        Download
                                    </a>

                                </td>
                                <td width="1">
                                    <div class="flex items-center gap-2">
                                        <a class="text-white bg-yellow-500 px-6 py-2 rounded block"
                                            href="{{ route('dashboard.book.edit', $item->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('dashboard.book.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')">
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
