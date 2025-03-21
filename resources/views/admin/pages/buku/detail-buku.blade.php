    <div id="popup-modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
        <div id="popup-content" class="bg-white rounded-md shadow-lg  w-3/4 p-3 relative ">

            <button onclick="closeModal()" class="absolute top-2 right-3 text-gray-600 hover:text-gray-900 text-xl">
                &times;
            </button>
            <table class="border-collapse w-full mt-6">
                <thead>
                    <tr>
                        <th
                            class="p-3 text-sm font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            Id
                        </th>
                        <th
                            class="p-3 text-sm font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            Cover buku</th>
                        <th
                            class="p-3 text-sm font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            kode</th>
                        <th
                            class="p-3 text-sm  font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            judul</th>
                        <th
                            class="p-3 text-sm font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            kategori</th>
                        <th
                            class="p-3 text-sm font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            penulis</th>
                        <th
                            class="p-3 text-sm font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            penerbit</th>
                        <th
                            class="p-3 text-sm font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            tahun </th>
                        <th
                            class="p-3 text-sm font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            deskripsi </th>
                        <th
                            class="p-3 text-sm font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            Stok</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($buku as $book)
                        <tr
                            class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center text-sm border border-b block lg:table-cell relative lg:static">
                                {{ $book->id }}
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center text-sm block lg:table-cell relative lg:static">
                                <img src="{{ $book->poto_buku }}" alt="" width="50">
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center text-sm block lg:table-cell relative lg:static">
                                {{ $book->code }}
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center text-sm  block lg:table-cell relative lg:static">
                                {{ $book->judul }}
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center text-sm block lg:table-cell relative lg:static">
                                {{ $book->relasi_kategori->nama_kategori ?? 'kok ilang' }}
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center text-sm block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-sm font-bold uppercase">Country</span>
                                {{ $book->penulis }}
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center text-sm block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-sm font-bold uppercase">Country</span>
                                {{ $book->penerbit }}
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center text-sm block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-sm font-bold uppercase">Country</span>
                                {{ $book->tahun_terbit }}
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 border border-b text-left text-sm block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-sm font-bold uppercase">Country</span>
                                {{ $book->description }}
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-sm font-bold uppercase">Country</span>
                                {{ $book->jumlah }}
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
