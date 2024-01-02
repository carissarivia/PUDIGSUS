@extends('layout.sebelum-login')

@section('main')
    <main class="grid grid-cols-2 gap-8 max-w-screen-xl mx-auto mt-[80px] ">
        @forelse ($relawan as $item)
            <div class="flex items-center">

                @if ($item->profile != null && file_exists(public_path('storage/profile/' . $item->profile)))
                    <img src="{{ asset('storage/profile/' . $item->profile) }}"
                        class="h-32 aspect-square rounded-full object-cover">
                @else
                    <img src="{{ asset('lib/images/default-profile.webp') }}"
                        class="h-32 aspect-square rounded-full object-cover">
                @endif
                <div class="flex flex-col ml-8">
                    <div class="text-xl">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td class="px-2">:</td>
                                    <td>{{ $item->name }}</td>
                                </tr>
                                <tr>
                                    <td>Program Studi</td>
                                    <td class="px-2">:</td>
                                    <td>{{ $item->program_studi ?? '-Belum Diatur-' }}</td>
                                </tr>
                                <tr>
                                    <td>Generasi</td>
                                    <td class="px-2">:</td>
                                    <td>{{ $item->generasi ?? '-Belum Diatur-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <form action="{{ route('relawan.request', $item->id) }}" class="contents" method="POST">
                            @csrf
                            <button type="submit"
                                class="text-white font-bold bg-blue-500 px-6 py-3 rounded-md mt-4 gap-2 items-center flex w-fit hover:bg-blue-600">
                                <span>Kirim Permintaan</span><i class="fa fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-2">
                <div class="flex flex-col items-center justify-center">
                    <h2 class="text-2xl font-bold mt-8">Tidak Ada Data</h2>
                </div>
            </div>
        @endforelse
    </main>
@endsection
