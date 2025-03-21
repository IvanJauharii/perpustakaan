@extends('landing')
@section('content')
<div class="relative">
    <div class="absoulute inset-0 bg-[url('/img/bg-section1.jpg')] bg-center bg-cover z-0 w-full h-[90vh] mt-16">
    <section class="relative bg-white/90 text-white py-16 px-8 text-center z-1 h-[90vh]">
        <div class="max-w-screen-xl mx-auto ">
            <div class="">
    
                <h2 class="text-xl text-gray-900 font-semibold">Mau membaca buku tapi bingung mau yang mana?</h2>
                <h1 class="text-4xl font-bold mt-4 text-gray-900 ">
                    <span class="text-[#16AE05] font-montserrat ">marbabu</span> alias gemar baca buku akan membantumu! <br>
                    tidak ada alasan untuk malas membaca buku
                </h1>
                <p class="text-lg mt-4 text-gray-800">Karena malas adalah tidak rajin. </p>
                <div class="relative w-3/4 mx-auto mt-6 mb-8">
                    <input type="text" placeholder="Cari buku..." 
                        class="w-full px-6 py-3 text-gray-500 text-lg  font-light rounded-lg shadow-md pr-12 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    
                    <i data-feather="search" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                </div>
            </div>
    
            <div class="text-center">
                <h2 class="text-xl font-light text-gray-700 mb-8">Pilih berdasarkan kategori </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 max-w-4xl mx-auto">
                    <div class="bg-white p-6 rounded-lg shadow-md flex flex-col  items-center">
                        <img src="{{ asset('img/logos/ai_pic.png') }}" alt="">
                        <p class="text-gray-600">AI</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md flex flex-col  items-center">
                        <img src="{{ asset('img/logos/brain_pic.png') }}" alt="" >
                        <p class="text-gray-600">Psikologi</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md flex flex-col   items-center">
                        <img src="{{ asset('img/logos/microscope_pic.png') }}" alt="">
                        <p class="text-gray-600">Sains</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md flex flex-col  items-center">
                        <img src="{{ asset('img/logos/toga_pic.png') }}" alt="">
                        <p class="text-gray-600">Learning</p>
                    </div>
                    <div onclick="openModal()" class="bg-white p-6 pt-12 rounded-lg shadow-md flex flex-col justify-between items-center">
                        <i data-feather="menu" class="text-gray-900 w-16 h-16 "></i>
                        <p class="text-gray-500">See more</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    </div>
    <div id="popup-modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
        <div id="popup-content" class="bg-white rounded-md shadow-lg max-w-md w-full p-3 relative translate-y-10">
            <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-600 hover:text-gray-900 text-xl">
                &times;
            </button>
            <h2 class="text-xl font-semibold text-gray-900 text-center">Pilih berdasarkan kategori</h2>

            <div class="grid grid-cols-4 gap-6 mt-6">
                <div class="flex flex-col items-center p-4 border rounded-md shadow-sm hover:shadow-md cursor-pointer">
                    <img src="{{ asset('img/logos/ai_pic.png') }}" alt="">
                    <p class="text-gray-700 text-xs text-center mt-2">AI</p>
                </div>
                <div class="flex flex-col items-center p-4 border rounded-md shadow-sm hover:shadow-md cursor-pointer">
                    <img src="{{ asset('img/logos/brain_pic.png') }}" alt="">
                    <p class="text-gray-700 text-xs text-center mt-2">Psikologi</p>
                </div>
                <div class="flex flex-col items-center p-4 border rounded-md shadow-sm hover:shadow-md cursor-pointer">
                    <img src="{{ asset('img/logos/microscope_pic.png') }}" alt="">
                    <p class="text-gray-700 text-xs text-center mt-2">Sains</p>
                </div>
                <div class="flex flex-col items-center p-4 border rounded-md shadow-sm hover:shadow-md cursor-pointer">
                    <img src="{{ asset('img/logos/toga_pic.png') }}" alt="">
                    <p class="text-gray-700 text-xs text-center mt-2">Learning</p>
                </div>
                <div class="flex flex-col items-center p-4 border rounded-md shadow-sm hover:shadow-md cursor-pointer">
                    <img src="{{ asset('img/logos/toga_pic.png') }}" alt="">
                    <p class="text-gray-700 text-xs text-center mt-2">Something</p>
                </div>
                <div class="flex flex-col items-center p-4 border rounded-md shadow-sm hover:shadow-md cursor-pointer">
                    <img src="{{ asset('img/logos/computer_pic.png') }}" alt="">
                    <p class="text-gray-700 text-xs text-center mt-2">Something</p>
                </div>
                <div class="flex flex-col items-center p-4 border rounded-md shadow-sm hover:shadow-md cursor-pointer">
                    <img src="{{ asset('img/logos/planet_pic.png') }}" alt="">
                    <p class="text-gray-700 text-xs text-center mt-2">Something</p>
                </div>
                <div class="flex flex-col items-center p-4 border rounded-md shadow-sm hover:shadow-md cursor-pointer">
                    <img src="{{ asset('img/logos/atom_pic.png') }}" alt="">
                    <p class="text-gray-700 text-xs text-center mt-2">Something</p>
                </div>
                <div class="flex flex-col items-center p-4 border rounded-md shadow-sm hover:shadow-md cursor-pointer">
                    <img src="{{ asset('img/logos/brain_pic.png') }}" alt="">
                    <p class="text-gray-700 text-xs text-center mt-2">Something</p>
                </div>
                <div class="flex flex-col items-center p-4 border rounded-md shadow-sm hover:shadow-md cursor-pointer">
                    <img src="{{ asset('img/logos/microscope_pic.png') }}" alt="">
                    <p class="text-gray-700 text-xs text-center mt-2">Something</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto pt-16 mt-10">
        <h2 class="text-2xl font-bold text-gray-900 text-center">New collections + updated</h2>
        <p class="text-center text-gray-600 mt-2">
            Ini adalah daftar koleksi baru. Semoga Anda menyukainya. Mungkin tidak semuanya baru. Namun dari segi waktu, kami memastikan bahwa ini masih baru dari pengolahan kami.
        </p>
    
        <!-- Filter Buttons -->
        <div class="flex justify-center space-x-4 my-6">
            <button class="px-4 py-2 border rounded-full text-gray-800 hover:bg-gray-200">Education</button>
            <button class="px-4 py-2 border rounded-full text-gray-800 hover:bg-gray-200">Open access publishing</button>
            <button class="px-4 py-2 border rounded-full text-gray-800 hover:bg-gray-200">Science</button>
            <button class="px-4 py-2 border rounded-full text-gray-800 hover:bg-gray-200">Literacy</button>
            <button class="px-4 py-2 border rounded-full text-gray-800 hover:bg-gray-200">Artificial intelligence</button>
        </div>
    
        <!-- Card Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 px-4">
            <!-- Card -->
            <div class="bg-white shadow-md rounded-lg p-4">
                <img src="https://upload.wikimedia.org/wikipedia/id/f/ff/Filsafat-teras-5c6141eec112fe4c8123aeb2.jpg?20200316095421" alt="Book Cover" class="w-full h-60 object-cover rounded-md">
                <p class="mt-3 text-gray-900 font-medium">Filosofi Teras by Henry Manampiring</p>
            </div>
    
            <div class="bg-white shadow-md rounded-lg p-4">
                <img src="https://bintangpusnas.perpusnas.go.id/api/getImage/978-979-168-333-3.jpg" alt="Book Cover" class="w-full h-60 object-cover rounded-md">
                <p class="mt-3 text-gray-900z font-medium">Dari Penjara ke Penjara by Tan Malaka</p>
            </div>
    
            <div class="bg-white shadow-md rounded-lg p-4">
                <img src="https://cdn.gramedia.com/uploads/items/9786024246945_Laut-Bercerita.jpg" alt="Book Cover" class="w-full h-60 object-cover rounded-md">
                <p class="mt-3 text-gray-900 font-medium">Laut Bercerita by Leila S. Chudori</p>
            </div>
    
            <div class="bg-white shadow-md rounded-lg p-4">
                <img src="https://upload.wikimedia.org/wikipedia/id/thumb/f/f6/Sampul_buku_Makanya%2C_Mikir.jpg/330px-Sampul_buku_Makanya%2C_Mikir.jpg" alt="Book Cover" class="w-full h-60 object-cover rounded-md">
                <p class="mt-3 text-gray-900 font-medium">Makanya, Mikir! by Abigail Limuria dan Cania Citta</p>
            </div>
    
            <div class="bg-white shadow-md rounded-lg p-4">
                <img src="https://cdn.gramedia.com/uploads/items/9786020956596_9786020956596.jpg" alt="Book Cover" class="w-full h-60 object-cover rounded-md">
                <p class="mt-3 text-gray-900 font-medium">Today Matters by John C. Maxwell</p>
            </div>
        </div>
    </div>
        
@endsection