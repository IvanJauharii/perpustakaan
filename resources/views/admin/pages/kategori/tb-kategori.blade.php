@extends('admin.layout.admin')
@section('title', 'Tabel Kategori')
@section('content')
    <table class="border-collapse w-full">
        <thead>
            <tr>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Id
                </th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Nama Kategori</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Aksi</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($kategori_buku as $item_kat)
                <tr
                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{ $item_kat->id }}
                    </td>

                    <td
                        class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        {{ $item_kat->nama_kategori }}
                    </td>


                    <td
                        class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        <div class="flex flex-row justify-center">
                            <a href="{{ route('kategori.edit', $item_kat->id) }}"><i data-feather="edit"
                                    class="text-blue-400 "></i></a>
                            <form action="{{ route('kategori.destroy', $item_kat->id) }}" method="post">
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
        {{ $kategori_buku->links('pagination::tailwind') }}
    </div>

    <form action="{{ route('kategori.create') }}" method="get">
        <button type="submit"
            class="bg-green-700 hover:bg-green-600 duration-100 cursor-pointer rounded text-white flex flex-row gap-2 mt-2 p-2">
            <i data-feather="plus-square"></i>Tambah kategori
        </button>
    </form>
@endsection
