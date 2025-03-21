@extends('petugas.layout.petugas')
@section('title', 'Tabel Peminjam')
@section('content')
    <table class="border-collapse w-full">
        <thead>
            <tr>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Id
                </th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Id
                    User</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Email</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Nama</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">No.
                    telepon</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Lokasi</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Alamat</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Poto</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjams as $item_peminjam)
                <tr
                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{ $item_peminjam->id }}
                    </td>

                    <td
                        class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        {{ $item_peminjam->id_user }}
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        {{ $item_peminjam->email }}
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center block lg:table-cell relative lg:static">
                        {{ $item_peminjam->nama_lengkap }}
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center block lg:table-cell relative lg:static">
                        {{ $item_peminjam->phone }}
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        {{ $item_peminjam->location }}
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        {{ $item_peminjam->alamat }}
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        <img src="{{ $item_peminjam->poto }}" alt="">
                    </td>

                    <td
                        class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        <div class="flex flex-row justify-center">
                            <a href="{{ route('peminjam.edit', $item_peminjam->id) }}"><i data-feather="edit"
                                    class="text-blue-400 "></i></a>
                            <form action="{{ route('peminjam.destroy', $item_peminjam->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="pl-3"
                                    onclick="return confirm('Yakin ingin menghapus peminjam ini?')"><i
                                        data-feather="trash-2" class="text-red-600 "></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{-- {{ $kategori_buku->links('pagination::tailwind') }} --}}
    </div>

    {{-- <form action="{{ route('petugas.create') }}" method="get">
        <button type="submit"
            class="bg-green-700 hover:bg-green-600 duration-100 cursor-pointer rounded text-white flex flex-row gap-2 mt-2 p-2">
            <i data-feather="plus-square"></i>Tambah Peminjam
        </button>
    </form> --}}
@endsection
