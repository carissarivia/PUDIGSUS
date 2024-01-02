@extends('layout.sebelum-login')

@section('main')
    <main class="mt-[80px] flex flex-col items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="160" height="103" viewBox="0 0 160 103" fill="none">
            <path d="M11.5413 68.2478C10.528 67.7534 10.6667 66.9363 10.6667 66.9363L16.2773 24.0333C16.2773 24.0333 16.3627 23.5595 16.6933 23.3192C16.896 23.1681 17.152 22.9484 17.6533 22.8179C23.2747 21.3347 53.8987 10.6571 69.3333 20.6C71.8933 22.5089 74.6667 25.3243 74.6667 27.4667V63.7776C74.6667 63.7776 74.7307 64.5467 73.6533 65.0136C73.2603 65.1562 72.8179 65.2328 72.3668 65.2364C71.9156 65.24 71.4704 65.1705 71.072 65.0342C47.328 57.3847 20.8213 66.0917 14.1333 68.3783C13.7284 68.5224 13.2663 68.5863 12.8051 68.5619C12.3439 68.5375 11.9042 68.4258 11.5413 68.2409V68.2478ZM145.867 68.3783C139.179 66.0917 112.672 57.3916 88.928 65.0342C88.5296 65.1705 88.0844 65.24 87.6332 65.2364C87.1821 65.2328 86.7397 65.1562 86.3467 65.0136C85.2693 64.5467 85.3333 63.7776 85.3333 63.7776V27.4667C85.3333 25.3243 88.1067 22.5089 90.6667 20.6C106.091 10.6571 136.533 21.3347 142.155 22.8179C142.645 22.9484 142.901 23.1681 143.115 23.3192C143.435 23.5595 143.531 24.0333 143.531 24.0333L149.323 66.9363C149.323 66.9363 149.472 67.7534 148.469 68.2409C148.105 68.4272 147.664 68.5397 147.2 68.5642C146.737 68.5886 146.273 68.5239 145.867 68.3783ZM94.56 87.1105C95.0523 87.0193 95.4907 86.8352 95.8187 86.5818C96.0729 86.3639 96.228 86.1047 96.2667 85.8333C96.8 79.3924 113.589 73.3909 145.845 85.6273C146.667 85.9295 147.616 85.902 148.427 85.5243C149.344 85.0917 149.333 84.357 149.333 84.357V80.5597C149.333 80.5597 149.333 80.031 149.045 79.7426C148.807 79.4917 148.463 79.2893 148.053 79.1589C126.453 70.1293 99.136 66.126 85.28 78.0603C85.1226 78.3119 84.8513 78.5272 84.5013 78.6783C83.8933 78.9873 83.1573 78.9667 83.1573 78.9667H76.9173C76.9173 78.9667 76.1707 78.9873 75.5733 78.6851C75.2234 78.5341 74.9521 78.3187 74.7947 78.0671C60.928 66.126 33.6213 69.937 12.0213 78.9667C11.6103 79.0989 11.2663 79.3038 11.0293 79.5572C10.7413 79.8456 10.7413 80.3675 10.7413 80.3675V84.1716C10.7413 84.1716 10.7307 84.9063 11.648 85.3389C12.0163 85.5185 12.4588 85.624 12.9198 85.6423C13.3809 85.6606 13.8402 85.5909 14.24 85.4419C46.4853 73.2055 63.2853 79.3993 63.808 85.8333C63.8497 86.1054 64.0086 86.3647 64.2667 86.5818C64.5946 86.8352 65.0331 87.0193 65.5253 87.1105C73.216 88.3465 84.384 88.8272 94.56 87.1105Z" fill="#918C8C"/>
        </svg>
        <h1 class="text-2xl mt-4 font-bold">Perpustakaan Digital Khusus</h1>

        <form action="{{ route('register.store') }}" method="POST" class="flex flex-col gap-4 w-[400px] py-8">
            @csrf

            <input required value="{{ old('name') }}" class="px-8 py-4 rounded-lg bg-gray-200 text-black" placeholder="Nama" type="text" name="name" id="name">
            @error('name')
                <div class="text-red-500">{{ $message }}</div>
            @enderror

            <input required value="{{ old('nim') }}" class="px-8 py-4 rounded-lg bg-gray-200 text-black" placeholder="NIM" type="text" name="nim" id="nim">
            @error('nim')
                <div class="text-red-500">{{ $message }}</div>
            @enderror

            <input required value="{{ old('password') }}" class="px-8 py-4 rounded-lg bg-gray-200 text-black" placeholder="Password" type="password" name="password" id="password">
            @error('password')
                <div class="text-red-500">{{ $message }}</div>
            @enderror

            <input required value="{{ old('password_confirmation') }}" class="px-8 py-4 rounded-lg bg-gray-200 text-black" placeholder="Konfirmasi Password" type="password" name="password_confirmation" id="password_confirmation">
            @error('password_confirmation')
                <div class="text-red-500">{{ $message }}</div>
            @enderror

            <input type="submit" value="Daftar" class="px-8 py-4 mt-4 rounded-lg bg-blue-500 text-white cursor-pointer hover:bg-blue-600">

            <div class="flex justify-center gap-1">
                <span>Sudah punya akun?</span><a href="/login" class="text-blue-500 hover:underline">Masuk</a>
            </div>

            @error('auth')
                <div class="text-red-500 text-center">{{ $message }}</div>
            @enderror
        </form>
    </main>
@endsection
