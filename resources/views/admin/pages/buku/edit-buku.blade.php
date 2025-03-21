@extends('admin.layout.admin')
@section('title', 'Edit Buku')
@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow-md">
        <h2 class="text-2xl font-bold mb-4">Edit Buku</h2>
        <form action="{{ route('buku.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium">Judul Buku</label>
                <input type="text" name="judul" value="{{ $book->judul }}" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Kategori</label>
                <select name="id_kategori" class="w-full border rounded p-2">
                    @foreach ($kategori as $kat)
                        <option value="{{ $kat->id }}" {{ $book->id_kategori == $kat->id ? 'selected' : '' }}>
                            {{ $kat->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Penulis</label>
                <input type="text" name="penulis" value="{{ $book->penulis }}" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Penerbit</label>
                <input type="text" name="penerbit" value="{{ $book->penerbit }}" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Tahun Terbit</label>
                <input type="number" name="tahun_terbit" value="{{ $book->tahun_terbit }}"
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Jumlah</label>
                <input type="number" name="jumlah" value="{{ $book->jumlah }}" class="w-full border rounded p-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Status</label>
                <select name="status" class="form-control">
                    <option value="aktif" {{ $book->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ $book->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Deskripsi</label>
                <textarea name="description" class="w-full border rounded p-2">{{ $book->description }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Kode Buku</label>
                <input type="text" name="code" value="{{ $book->code }}" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Cover Buku</label>
                <input type="file" name="poto_buku" class="w-full border rounded p-2">
                @if ($book->poto_buku)
                    <img src="{{ asset($book->poto_buku) }}" alt="Cover Buku" class="mt-2 w-32">
                @endif
            </div>

            <div class="flex justify-end">
                <a href="{{ route('buku.index') }}" class="mr-4 bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection
