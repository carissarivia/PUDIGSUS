@extends('layout.base')

@section('content')
    <header class="relative w-screen h-[160px] overflow-hidden bg-black bg-opacity-25 z-10">

        <div class="top-4 left-4 absolute">
            <div class="flex items-center gap-4">
                <img src="{{ asset('lib/images/logo.png') }}" class="w-32 h-32">
                <div class="text-2xl text-yellow-400 uppercase font-bold">
                    Universitas Lancang Kuning
                </div>
            </div>
        </div>

        <div class="bottom-4 right-4 absolute">
            <div class="flex items-center gap-8 text-2xl font-semobold text-white ">
                <a class="hover:underline" href="/">Beranda</a>
                <a class="hover:underline" href="/buku-digital">Buku Digital</a>
                <a class="hover:underline" href="/relawan">Relawan</a>
                <a class="hover:underline" href="/lokasi">Lokasi Perpustakaan</a>
                @auth
                    <a class="hover:underline" href="/dashboard">Dashboard</a>
                @else
                    <a class="hover:underline" href="/login">Masuk Anggota</a>
                @endauth
            </div>
        </div>
    </header>

    <div class="absolute top-0 left-0 w-screen h-screen" id="home">
        <div class="flex flex-col h-full items-center text-white">
            <h1 class="mt-[30vh] text-5xl font-bold">PUDIGUS</h1>
            <div class="mt-4 text-5xl font-bold">Perpustakaan Digital Khusus</div>
            <p class="text-3xl italic mt-8">
                Masukkan satu atau lebih kata kunci dari judul, pengarang atau subyek
            </p>

            <form action="{{ '/buku-digital' }}" class="flex items-center gap-4 mt-8">
                <label for="search" class="relative">

                    <i class="fas fa-search text-black absolute left-4 top-1/2 -translate-y-1/2"></i>

                    <input type="text" name="search"
                        class="text-black pl-12  w-[800px] h-[60px] px-4 text-lg font-bold rounded-lg bg-white"
                        id="search" placeholder="Cari Buku Digital" />

                </label>
            </form>

            <div class="mt-12 w-full max-w-screen-lg mx-auto">
                @isset($books)
                    <div class="owl-carousel">
                        @foreach ($books as $item)
                            <a href="{{ route('buku-digital.show', $item->id) }}" class="contents">
                                <img class="aspect-[3/4]" src="{{ asset('storage/buku/cover/' . $item->cover) }}">
                            </a>
                        @endforeach
                    </div>
                @endisset
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                nav: true,
                margin: 32,
                navText: [
                    "<i class='fa fa-arrow-left'></i>",
                    "<i class='fa fa-arrow-right'></i>",
                ],
                items: 5,
            })
        });
    </script>
@endpush
