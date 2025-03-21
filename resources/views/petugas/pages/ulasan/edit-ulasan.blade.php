@extends('admin.layout.admin')
@section('title', 'Edit Ulasan')
@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow-md">
        <h2 class="text-2xl font-bold mb-4">Edit Ulasan</h2>
        <form action="{{ route('ulasan.update', $ulasan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium">Id Peminjam</label>
                <input type="text" name="id_peminjam" value="{{ $ulasan->id_peminjam }}" class="w-full border rounded p-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Id Buku</label>
                <input type="text" name="id_buku" value="{{ $ulasan->id_buku }}" class="w-full border rounded p-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Ulasan</label>
                <input type="text" name="ulasan" value="{{ $ulasan->ulasan }}" class="w-full border rounded p-2">
            </div>

            <div class="flex justify-end">
                <a href="{{ route('ulasan.index') }}" class="mr-4 bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection
