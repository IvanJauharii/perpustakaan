@extends('admin.layout.admin')
@section('title', 'Tabel Buku')
@section('content')
    <div class="">
        <table class="border-collapse w-full">
            <thead>
                <tr>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Id
                    </th>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Cover </th>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Kode</th>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Judul</th>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        kategori</th>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        stok</th>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Status</th>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        aksi</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($buku as $book)
                    <tr
                        class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            {{ $book->id }}
                        </td>
                        <td
                            class="w-auto lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                            <img src="{{ asset($book->poto_buku) }}" alt="" width="50" class="m-auto">
                        </td>
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                            {{ $book->code }}
                        </td>
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                            {{ $book->judul }}
                        </td>
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center block lg:table-cell relative lg:static">
                            {{-- {{ $book->relasi_kategori->nama_kategori ?? 'Kategori Tidak ada' }} --}}
                            {{ optional($book->relasi_kategori)->nama_kategori ?? 'adios' }}
                        </td>
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center block lg:table-cell relative lg:static">
                            <span
                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Country</span>
                            {{ $book->jumlah }}
                        </td>
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center block lg:table-cell relative lg:static">
                            <span
                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Country</span>
                            {{ $book->status }}
                        </td>

                        <td
                            class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                            <div class="flex flex-row">
                                <div onclick="openModal({{ $book->id }})">
                                    <i data-feather="eye" class="text-green-700   "></i>
                                </div>
                                <a href="{{ route('buku.edit', $book->id) }}" class="pl-3"><i data-feather="edit"
                                        class="text-blue-400 "></i></a>
                                <form action="{{ route('buku.destroy', $book->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="pl-3"
                                        onclick="return confirm('Yakin ingin mengapus buku ini?')"><i data-feather="trash-2"
                                            class="text-red-600 "></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="mt-4">
            {{ $buku->links('pagination::tailwind') }}
        </div>

        <form action="{{ route('buku.create') }}" method="get">
            <button type="submit"
                class="bg-green-700 hover:bg-green-600 duration-100 cursor-pointer rounded text-white flex flex-row gap-2 mt-2 p-2">
                <i data-feather="plus-square"></i>Tambah buku
            </button>
        </form>
    </div>
@endsection
