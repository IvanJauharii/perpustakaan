@extends('petugas.layout.petugas')
@section('title', 'Daftar Notifikasi')
@section('content')

    <h2 class="text-xl font-bold mb-4">Daftar Notifikasi</h2>

    @if (session('success'))
        <p class="text-green-600">{{ session('success') }}</p>
    @endif

    <table class="border-collapse w-full">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Id</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Peminjam</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Buku</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Jumlah</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Tgl Peminjaman</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Tgl Pengembalian</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    pesan</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Status</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notifikasi as $notif)
                <tr
                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{ $notif->id }}</td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{ $notif->peminjam->nama_lengkap }}</td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <img src="{{ asset($notif->buku->poto_buku) }}" alt="" width="50">
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{ $notif->jumlah }}</td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{ $notif->tanggal_peminjaman }}</td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{ $notif->tanggal_pengembalian }}</td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{ $notif->pesan }}</td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span
                            class="px-2 py-1 rounded {{ $notif->status == 'pending' ? 'bg-yellow-500 text-white' : 'bg-green-400 text-white' }}">
                            {{ ucfirst($notif->status) }}
                        </span>
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <div class="flex flex-row  justify-center gap-2 ">

                            @if ($notif->status == 'pending')
                                <form action="{{ route('notifikasi.kirim', $notif->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-400 transition-all duration-100 ease-in-out">
                                        <i data-feather="send" class="w-5 h-5"></i>
                                    </button>
                                </form>
                            @elseif($notif->status == 'confirmed')
                                <form action="{{ route('peminjaman.konfirmasi', $notif->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="bg-green-500 text-white px-3 py-2 rounded hover:bg-green-400 transition-all duration-100 ease-in-out">
                                        <i data-feather="check-square" class="w-5 h-5"></i>
                                    </button>
                                </form>
                            @else
                              
                            @endif

                            <form action="{{ route('notifikasi.hapus', $notif->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin tidak mengonfirmasi dan menghapus ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-400 transition-all duration-100 ease-in-out">
                                    <i data-feather="trash-2" class="w-5 h-5"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Script untuk alert hapus -->
    <script>
        function confirmDelete(id) {
            if (confirm("Yakin tidak mengonfirmasi dan menghapus?")) {
                window.location.href = "/notifikasi/hapus/" + id;
            }
        }
    </script>

@endsection
