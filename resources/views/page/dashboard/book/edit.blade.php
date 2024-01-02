@extends('layout.setelah-login')

@section('main')
    <div class="px-12 py-24 grow">
        <div class="bg-white rounded p-8 mt-4">
            <form action="{{ route('dashboard.book.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="flex flex-col gap-4 ">
                    <div class="flex flex-col gap-2">
                        <label for="judul">Judul</label>
                        <input required type="text" name="judul" id="judul" class="border border-gray-300 rounded-md p-2" value="{{ old('judul', $buku->judul) }}">
                        @error('judul')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="penulis">Penulis</label>
                        <input required type="text" name="penulis" id="penulis" class="border border-gray-300 rounded-md p-2" value="{{ old('penulis', $buku->penulis) }}">
                        @error('penulis')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="tahun_terbit">Tahun Terbit</label>
                        <input required type="number" name="tahun_terbit" id="tahun_terbit" class="border border-gray-300 rounded-md p-2" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}">
                        @error('tahun_terbit')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="cover">Cover</label>
                        <input type="file" name="cover" id="cover" class="border border-gray-300 rounded-md p-2 file:mr-2 cursor-pointer">
                        @error('cover')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="file">File</label>
                        <input type="file" name="file" id="file" class="border border-gray-300 rounded-md p-2 file:mr-2 cursor-pointer">
                        @error('file')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="audio">Suara</label>
                        <input type="file" name="audio" id="audio" class="border border-gray-300 rounded-md p-2 file:mr-2 cursor-pointer">
                        @error('audio')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md mt-4 flex w-fit hover:bg-blue-600 font-bold">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
