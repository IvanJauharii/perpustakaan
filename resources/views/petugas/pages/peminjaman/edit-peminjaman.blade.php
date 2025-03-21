@extends('admin.layout.admin')
@section('title', 'Edit Peminjaman')
@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow-md">
        <h2 class="text-2xl font-bold mb-4">Edit Peminjaman</h2>
        <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium">Id Peminjam</label>
                <input type="text" name="id_peminjam" value="{{ $peminjaman->id_peminjam }}" class="w-full border rounded p-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Tgl Pinjam</label>
                <input type="text" name="tanggal_peminjaman" value="{{ $peminjaman->tanggal_peminjaman }}" class="w-full border rounded p-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Tgl Kembali</label>
                <input type="text" name="tanggal_pengembalian" value="{{ $peminjaman->tanggal_pengembalian }}" class="w-full border rounded p-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Tgl Dikembalikan</label>
                <input type="text" name="tanggal_dikembalikan" value="{{ $peminjaman->tanggal_dikembalikan }}" class="w-full border rounded p-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Status</label>
                <input type="text" name="status" value="{{ $peminjaman->status }}" class="w-full border rounded p-2">
            </div>
            <div class="flex justify-end">
                <a href="{{ route('peminjaman.index') }}" class="mr-4 bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection