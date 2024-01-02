@extends('layout.sebelum-login')

@section('main')
    <main class="grid grid-cols-2 gap-8 max-w-screen-xl mx-auto mt-[80px] ">
        <div class="col-span-2 flex justify-center">
            <form action="{{ '/buku-digital' }}" class="flex items-center gap-4 mt-8">
                <label for="search" class="relative">

                    <i class="fas fa-search text-black absolute left-4 top-1/2 -translate-y-1/2"></i>

                    <input type="text" name="search" autocomplete="off"
                        class="text-black pl-12  w-[800px] h-[60px] px-4 text-lg font-bold rounded-lg bg-gray-100"
                        id="search" placeholder="Cari Buku Digital" />

                </label>
            </form>
        </div>

        @forelse ($buku as $item)
            <a class="flex items-center hover:bg-gray-100 p-4" href="{{ route('buku-digital.show', $item->id) }}">
                <img src="{{ asset('storage/buku/cover/' . $item->cover) }}" class="h-48 aspect-[3/4]">
                <div class="flex flex-col ml-8">
                    <h2 class="font-bold text-2xl font-bold">
                        {{ $item->judul }}
                    </h2>
                    <div class="text-lg">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Penulis</td>
                                    <td class="px-2">:</td>
                                    <td>{{ $item->penulis }}</td>
                                </tr>
                                <tr>
                                    <td>Tahun</td>
                                    <td class="px-2">:</td>
                                    <td>{{ $item->tahun_terbit }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-2">
                <div class="flex flex-col items-center justify-center">
                    <h2 class="text-2xl font-bold mt-8">Tidak Ada Data</h2>

                </div>
            </div>
        @endforelse

        @if (isset($show_detail) && $show_detail)
            <dialog id="detail_buku"
                class="bg-gray-900 bg-opacity-50 w-screen h-screen top-0 left-0 grid place-items-center ">
                <div class="bg-white px-8 py-6 rounded min-w-[1024px] flex flex-col gap-4 h-[90vh]">
                    <div class="flex justify-between">
                        <audio controls>
                            <source src="{{ asset('storage/buku/audio/' . $item->audio) }}">
                        </audio>
                        <button class="ml-auto text-2xl" id="close-dialog">
                            <i class="fa fa-close"></i>
                        </button>
                    </div>
                    <iframe src="{{ asset('storage/buku/files/' . $item->file) }}" frameborder="0"
                        class="w-full grow"></iframe>

                </div>
            </dialog>
        @endif
    </main>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#detail_buku').show()
            $('#close-dialog').click(function(e) {
                $('#detail_buku').hide()
            })
        })
    </script>
@endpush
