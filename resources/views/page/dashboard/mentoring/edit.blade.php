@extends('layout.setelah-login')

@section('main')
    <div class="px-12 py-24 grow">
        <div class="bg-white rounded p-8 mt-4">
            <form action="{{ route('dashboard.mentoring.update', $mentoring->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="flex flex-col gap-4 ">
                    <div class="flex flex-col gap-2">
                        <label for="description">Deskripsi</label>
                        <textarea  name="description" id="description" class="editor min-h-[80px] border border-gray-300 rounded-md p-2">{{ old('description', $mentoring->description) }}</textarea>
                        @error('description')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="status">Status</label>
                        <select name="status" class="border border-gray-300 rounded-md p-2">
                            <option value="">Pending</option>
                            <option @if ($mentoring->status == 'diterima') selected @endif value="diterima">Terima</option>
                            <option @if ($mentoring->status == 'ditolak') selected @endif value="ditolak">Tolak</option>
                        </select>
                        @error('status')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md mt-4 flex w-fit hover:bg-blue-600 font-bold">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
