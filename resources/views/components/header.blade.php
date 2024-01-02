<header class="relative h-[320px] overflow-hidden">
    <img src="{{ asset('lib/images/header-bg.jpg') }}"
        class="w-full h-hull absolute top-0 -translate-y-1/3 object-cover object-center scale-105">

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
