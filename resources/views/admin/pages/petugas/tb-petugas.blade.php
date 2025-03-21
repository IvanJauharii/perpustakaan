@extends('admin.layout.admin')
@section('title', 'Tabel Petugas')
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
                    Alamat</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Poto</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Role</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($petugas as $item_petugas)
                <tr
                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td
                        class="w    -full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{ $item_petugas->id }}
                    </td>

                    <td
                        class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        {{ $item_petugas->id_user }}
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        {{ $item_petugas->email }}
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center block lg:table-cell relative lg:static">
                        {{ $item_petugas->nama_lengkap }}
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center block lg:table-cell relative lg:static">
                        {{ $item_petugas->phone }}
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        {{ $item_petugas->alamat }}
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        <img src="{{ $item_petugas->poto }}" alt="">

                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        {{ $item_petugas->role }}
                    </td>


                    <td
                        class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        <div class="flex flex-row justify-center">
                            <a href="{{ route('petugas.edit', $item_petugas->id) }}"><i data-feather="edit"
                                    class="text-blue-400 "></i></a>
                            <form action="{{ route('petugas.destroy', $item_petugas->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="pl-3"
                                    onclick="return confirm('Yakin ingin menghapus petugas ini?')"><i data-feather="trash-2"
                                        class="text-red-600 "></i></button>
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

    <form action="{{ route('petugas.create') }}" method="get">
        <button type="submit"
            class="bg-green-700 hover:bg-green-600 duration-100 cursor-pointer rounded text-white flex flex-row gap-2 mt-2 p-2">
            <i data-feather="plus-square"></i>Tambah Petugas
        </button>
    </form>
@endsection
