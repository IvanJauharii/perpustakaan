@extends('petugas.layout.petugas')
@section('title', 'Tabel Ulasan')
@section('content')
    <table class="border-collapse w-full">
        <thead>
            <tr>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Id
                </th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Id Peminjam</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    id buku</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    ulasan</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Aksi</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($ulasan as $item_ulasan)
                <tr
                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{ $item_ulasan->id }}
                    </td>

                    <td
                        class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        {{ $item_ulasan->peminjam->nama_lengkap }}
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center block lg:table-cell relative lg:static">
                        {{ $item_ulasan->buku->judul}}
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center block lg:table-cell relative lg:static">
                        {{ $item_ulasan->ulasan }}
                    </td>


                    <td
                        class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        <div class=" justify-center">
                           
                            <form action="{{ route('ulasan.destroy', $item_ulasan->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="pl-3"
                                    onclick="return confirm('Yakin ingin menghapus ulasan ini?')"><i data-feather="trash-2"
                                        class="text-red-600 "></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
