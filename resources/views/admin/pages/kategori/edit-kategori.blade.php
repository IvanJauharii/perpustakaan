@extends('admin.layout.admin')
@section('title', 'Edit Kategori')
@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow-md">
        <h2 class="text-2xl font-bold mb-4">Edit Kategori</h2>
        <form action="{{ route('kategori.update', $kat->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium">Nama Kategori</label>
                <input type="text" name="nama_kategori" value="{{ $kat->nama_kategori }}"
                    class="w-full border rounded p-2">
            </div>

            <div class="flex justify-end">
                <a href="{{ route('kategori.index') }}" class="mr-4 bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection
