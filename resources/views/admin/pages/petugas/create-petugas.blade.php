@extends('admin.layout.admin')
@section('title', 'Tambah Petugas')
@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow-md">
        <h2 class="text-2xl font-bold mb-4">Tambah Petugas</h2>

        <form action="{{ route('petugas.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium">Pilih User Petugas</label>
                <select name="id_user" class="w-full border rounded p-2">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">No. Telepon</label>
                <input type="text" name="phone" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Alamat</label>
                <input type="text" name="alamat" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Foto </label>
                <input type="file" name="poto" class="w-full border rounded p-2">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
@endsection
