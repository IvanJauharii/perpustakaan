@extends('admin.layout.admin')
@section('title', 'Tabel Kategori')
@section('content')
    <table class="border-collapse w-full">
        <thead>
            <tr>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Id
                </th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Cover Buku</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Judul Buku</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Kategori</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($listKategori as $lk)
                <tr
                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{ $lk->id }}
                    </td>

                    <td
                        class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        <img src="{{ asset($lk->buku->poto_buku ?? 'not found') }}" class="w-12 m-auto object-cover"
                            alt="cover">
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        {{ $lk->buku->judul ?? 'tidak ada' }}
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        {{ $lk->kategori->nama_kategori ?? 'tidak ada' }}
                    </td>


                </tr>
            @endforeach

        </tbody>
    </table>
    <div class="mt-4">
        {{ $listKategori->links('pagination::tailwind') }}
    </div>

@endsection
