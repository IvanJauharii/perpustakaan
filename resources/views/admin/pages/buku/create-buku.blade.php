@extends('admin.layout.admin')
@section('title', 'Tambah Buku')
@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded-md shadow-md">
    <h2 class="text-xl font-semibold mb-4">Tambah Buku</h2>

    <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Judul Buku</label>
            <input type="text" name="judul" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Kategori</label>
            <select name="id_kategori" class="w-full p-2 border rounded" required>
                @foreach ($kategori as $kat)
                    <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Penulis</label>
            <input type="text" name="penulis" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Penerbit</label>
            <input type="text" name="penerbit" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Deskripsi</label>
            <textarea name="description" class="w-full p-2 border rounded" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Kode Buku</label>
            <input type="text" name="code" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Jumlah Stok</label>
            <input type="number" name="jumlah" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Cover Buku (Upload File)</label>
            <input type="file" name="poto_buku" class="w-full p-2 border rounded">
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-700">
            Tambah Buku
        </button>
    </form>
</div>
@endsection

