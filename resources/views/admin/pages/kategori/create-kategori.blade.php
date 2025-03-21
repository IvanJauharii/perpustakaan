@extends('admin.layout.admin')
@section('title', 'Tambah Kategori')
@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded-md shadow-md">
    <h2 class="text-xl font-semibold mb-4">Tambah Kategori</h2>

    <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="w-full p-2 border rounded" required>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-700">
            Tambah Kategori
        </button>
    </form>
</div>
@endsection