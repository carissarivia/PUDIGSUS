@extends('layout.setelah-login')

@section('main')
<div class="px-12 py-24 grow">
    <div class="bg-white rounded p-8 mt-4">
        <h1 class="text-4xl font-bold">List Laporan</h1>

        <p class="mt-4 text-medium text-gray-700">
            Anda dapat melihat daftar laporan dari semua buku di sini.
        </p>

        <div class="mt-4">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Data E-Book</th>
                        <th>Penulis</th>
                        <th>Tahun Terbit</th>
                        <th>Jumlah Baca</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $item)
                    <tr>
                        <td width="1">{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->penulis }}</td>
                        <td>{{ $item->tahun_terbit }}</td>
                        <td>{{ $item->laporan_count }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
