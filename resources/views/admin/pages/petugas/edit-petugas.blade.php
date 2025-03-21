@extends('admin.layout.admin')
@section('title', 'Edit Petugas')
@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow-md">
    <h2 class="text-2xl font-bold mb-4">Edit Petugas</h2>

    <form action="{{ route('petugas.update', $petugas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" value="{{ $petugas->nama_lengkap }}" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">No. Telepon</label>
            <input type="text" name="phone" value="{{ $petugas->phone }}" class="w-full border rounded p-2" required>
        </div>  

        <div class="mb-4">
            <label class="block text-sm font-medium">Alamat</label>
            <input type="text" name="alamat" value="{{ $petugas->alamat }}" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Foto</label>
            <input type="text" name="poto" value="{{ $petugas->poto }}" class="w-full border rounded p-2">
            {{-- @if ($petugas->poto)
            <img src="{{ asset('storage/' . $petugas->poto) }}" class="mt-2" alt="Foto Petugas" style="max-width: 200px;">
        @endif --}}
        </div>

        <div class="flex justify-end">
            <a href="{{ route('petugas.index') }}" class="mr-4 bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection