<div class="relative">
    <div class="absoulute inset-0 bg-[url('/img/bg-section1.jpg')] bg-center bg-cover z-0 w-full h-[90vh] mt-16">
        <section class="relative bg-white/90 text-white py-16 px-8 text-center z-1 h-[90vh]">
            <div class="max-w-screen-xl mx-auto ">
                <div class="">

                    <h2 class="text-xl text-gray-900 font-semibold ">Mau membaca buku tapi bingung mau yang mana?</h2>
                    <h1 class="text-4xl font-bold mt-4 text-gray-900 ">
                        <span class="text-[#16AE05] font-montserrat ">marbabu</span> alias gemar baca buku akan
                        membantumu! <br>
                        tidak ada alasan untuk malas membaca buku
                    </h1>
                    <p class="text-lg mt-4 text-gray-800">Karena malas adalah tidak rajin. </p>
                    {{-- <div class="relative w-3/4 mx-auto mt-6 mb-8">
                <input type="text" placeholder="Cari buku..." 
                    class="w-full px-6 py-3 text-gray-500 text-lg  font-light rounded-lg shadow-md pr-12 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500">
                
                <i data-feather="search" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
            </div> --}}
                    <x-search>
                    </x-search>
                </div>

                <div class="text-center ">
                    <h2 class="text-xl font-light text-gray-700 mb-8">Pilih berdasarkan kategori </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 max-w-4xl mx-auto">
                        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col  items-center">
                            <img src="{{ asset('img/logos/ai_pic.png') }}" alt="">
                            <p class="text-gray-600">AI</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col  items-center">
                            <img src="{{ asset('img/logos/brain_pic.png') }}" alt="">
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
                        <div onclick="openModal()"
                            class="bg-white p-6 pt-12 rounded-lg shadow-md flex flex-col justify-between items-center">
                            <i data-feather="menu" class="text-gray-900 w-16 h-16 "></i>
                            <p class="text-gray-500">See more</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
