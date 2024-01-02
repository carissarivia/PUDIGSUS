@extends('layout.setelah-login')

@section('main')
    <div class="px-12 py-24 grow">
        <div class="bg-white rounded p-8 mt-4">
            <h1 class="text-4xl font-bold">List Mentoring</h1>

            <p class="mt-4 text-medium text-gray-700">
                @if (auth()->user()->role == 'admin')
                    Anda terdaftar sebagai Admin. Anda dapat melihat daftar mentoring di sini.
                @elseif (auth()->user()->is_mentor)
                    Anda terdaftar sebagai Mentor. Anda dapat melihat daftar mahasiswa yang Anda bimbing di sini.
                @else
                    Anda terdaftar sebagai Mahasiswa. Anda dapat melihat daftar mentor Anda di sini.
                @endif
            </p>

            <div class="mt-4">
                <table class="data-table">
                    <thead>
                        <th>No</th>
                        @if (auth()->user()->is_mentor || auth()->user()->role == 'admin')
                            <th>Mahasiswa</th>
                        @endif
                        @if (!auth()->user()->is_mentor || auth()->user()->role == 'admin')
                            <th>Mentor</th>
                        @endif
                        <th>Status</th>
                        <th>Deskripsi</th>
                        @if (auth()->user()->is_mentor)
                            <th>Aksi</th>
                        @endif
                    </thead>
                    <tbody>
                        @foreach ($mentorings as $item)
                            <tr>
                                <td width="1">{{ $loop->iteration }}</td>
                                @if (auth()->user()->is_mentor || auth()->user()->role == 'admin')
                                    <td>{{ $item->student->name }}</td>
                                @endif
                                @if (!auth()->user()->is_mentor || auth()->user()->role == 'admin')
                                    <td>{{ $item->mentor->name }}</td>
                                @endif
                                <td>
                                    @if ($item->status == 'pending')
                                        <div class="bg-yellow-500 px-3 text-white font-medium py-1 rounded w-fit mx-auto">
                                            Menunggu Konfirmasi
                                        </div>
                                    @elseif($item->status == 'diterima')
                                        <div class="bg-green-500 px-3 text-white font-medium py-1 rounded w-fit mx-auto">
                                            Diterima
                                        </div>
                                    @elseif($item->status == 'ditolak')
                                        <div class="bg-red-500 px-3 text-white font-medium py-1 rounded w-fit mx-auto">
                                            Ditolak
                                        </div>
                                    @else
                                        -
                                    @endif
                                <td>
                                    {!! $item->description ?? '-' !!}
                                </td>

                                @if (auth()->user()->is_mentor)
                                    <td width="1">
                                        <a href="{{ route('dashboard.mentoring.edit', $item->id) }}">
                                            <button class="text-white bg-yellow-500 px-6 py-2 rounded">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                    </td>
                                @endif

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
