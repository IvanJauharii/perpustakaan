<!-- resources/views/peminjam/pages/koleksi/index.blade.php -->

@extends('peminjam.layout.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Koleksi Saya</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form buat koleksi baru -->
        <form action="{{ route('koleksi.store') }}" method="POST" class="flex gap-2 mb-6">
            @csrf
            <input type="text" name="nama" placeholder="Nama koleksi " class="border rounded p-2 w-full">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Buat Koleksi</button>
        </form>

        @if ($koleksis->count() > 0)
            @foreach ($koleksis as $koleksi)
                <div class="mb-8">
                    <div class="flex justify-between items-center mb-2">
                        <h2 class="text-xl font-semibold">{{ $koleksi->nama }}</h2>
                        <form action="{{ route('koleksi.destroy', $koleksi->id) }}" method="POST"
                            onsubmit="return confirm('Hapus koleksi ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500">Hapus</button>
                        </form>
                    </div>

                    {{-- <div class="grid grid-cols-2 md:grid-cols-4 gap-1"> --}}
                    <div class="flex gap-4">
                        @forelse($koleksi->buku as $buku)
                            <div class="border rounded shadow p-1.5 w-36">
                                <img src="{{ asset($buku->poto_buku) }}" class="object-cover"
                                    alt="Cover {{ $buku->judul }}" class="w-full h-40 object-cover rounded mb-2">
                                <h3 class="font-semibold text-base">{{ $buku->judul }}</h3>
                                <p class="text-sm text-gray-600 mb-2">{{ $buku->penulis }}</p>
                                <form action="{{ route('koleksi.removeBuku', [$koleksi->id, $buku->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 text-sm">Hapus dari Koleksi</button>
                                </form>
                            </div>
                        @empty
                            <p class="text-gray-500">Belum ada buku dalam koleksi ini.</p>
                        @endforelse
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-gray-500">Kamu belum punya koleksi. Buat koleksi terlebih dahulu!</p>
        @endif
    </div>
@endsection
