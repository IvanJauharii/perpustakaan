@extends('petugas.layout.petugas')
@section('title', 'Tabel Peminjaman')
@section('content')
    <table class="border-collapse w-full">
        <thead>
            <tr>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Id
                </th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Peminjam</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Buku</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Tgl Pinjam</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Tgl Kembali</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Tgl Dikembalikan</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Status</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $item)
                <tr
                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{ $item->id }}
                    </td>

                    <td
                        class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        {{ $item->peminjam->nama_lengkap }}
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        {{ $item->buku->judul }}
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        {{ $item->tanggal_peminjaman }}
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center block lg:table-cell relative lg:static">
                        {{ $item->tanggal_pengembalian }}
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center block lg:table-cell relative lg:static">
                        {{ $item->tanggal_dikembalikan }}
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center block lg:table-cell relative lg:static">
                        {{ $item->status }}
                    </td>

                    <td
                        class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        <div class="flex flex-row justify-center gap-2">
                            @if ($item->status == 'dipinjam')
                                <form action="{{ route('peminjaman.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="dikembalikan">
                                    <button type="submit" class="bg-green-500 text-white px-3 py-2 rounded">
                                        <i data-feather="check-square" class="w-5 h-5"></i>
                                    </button>
                                </form>
                            @endif

                            @if ($item->status == 'dikembalikan' || $item->tanggal_dikembalikan)
                                <form action="{{ route('peminjaman.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-2 rounded">
                                        <i data-feather="trash-2" class="w-5 h-5"></i>
                                    </button>
                                </form>
                            @endif  
                        </div>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Modal Berhasil --}}
    @if (session('success'))
        <div x-data="{ open: true }" x-show="open"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center w-72">
                <h2 class="text-lg font-bold mb-2">Berhasil!</h2>
                <p class="text-gray-700">{{ session('success') }}</p>
                <button @click="open = false" class="mt-4 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                    Tutup
                </button>
            </div>
        </div>
    @endif
    {{-- end --}}

    {{-- Sweet Alert --}}
    {{-- @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif --}}

    <script>
        function showSuccessModal() {
            document.getElementById('successModal').classList.remove('hidden');
        }

        function closeSuccessModal() {
            document.getElementById('successModal').classList.add('hidden');
        }
    </script>
@endsection
