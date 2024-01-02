@extends('layout.base')

@push('head')
    <style>
        body {
            background-image: url("/lib/images/bg-home.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center
        }
    </style>
@endpush

@section('content')
    <div class="flex flex-col min-h-screen">
        @include('components.header-setelah-login')


        <div class="grow flex">
            @include('components.sidebar-setelah-login')

            @yield('main')
        </div>

    </div>
@endsection
