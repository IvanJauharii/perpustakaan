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