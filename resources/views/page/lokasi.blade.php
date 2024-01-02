@extends('layout.sebelum-login')

@section('main')
    <main class="max-w-screen-xl mx-auto py-[80px]">
        <h1>
            <div class="text-4xl font-bold text-center">Lokasi Perpustakaan</div>
        </h1>
        <iframe class="mx-auto mt-12"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d997.4041443310331!2d101.42329551395761!3d0.5761852785992813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ab5b67d69dd9%3A0xf5f814ad07df587d!2sLibrary%20of%20Lancang%20Kuning%20University!5e0!3m2!1sen!2sid!4v1704126070387!5m2!1sen!2sid"
            width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </main>
@endsection
