@extends('admin.layout.admin')
@section('title', 'Edit Denda')
@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow-md">
        <h2 class="text-2xl font-bold mb-4">Edit Denda</h2>
        <form action="{{ route('denda.update', $denda->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium">Id Peminjam</label>
                <input type="text" name="id_peminjam" value="{{ $denda->id_peminjam }}" class="w-full border rounded p-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Id Buku</label>
                <input type="text" name="id_buku" value="{{ $denda->id_buku }}" class="w-full border rounded p-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Denda</label>
                <input type="text" name="denda" value="{{ $denda->denda }}" class="w-full border rounded p-2">
            </div>

            <div class="flex justify-end">
                <a href="{{ route('denda.index') }}" class="mr-4 bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Perubahan</button>
            </div>
        </form>
    </div>
    
@endsection