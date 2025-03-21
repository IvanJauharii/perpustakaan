@props(['mt' => 'mt-6'])
<div class="relative">
    <div class="relative w-3/4 mx-auto {{ $mt }}  mb-8">
        <input type="text" placeholder="Cari buku..." id="search"
            class="w-full px-6 py-3 text-gray-500 text-lg  font-light rounded-lg shadow-md pr-12 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500">

        <i data-feather="search" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
    </div>
    <div id="search-results" class="mt-3 bg-white shadow-lg rounded p-3 hidden"></div>
</div>
