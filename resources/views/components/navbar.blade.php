<div class="fixed top-0 w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 z-50">
    <div x-data="{ open: false }"
        class="flex flex-col max-w-screen-xl px-6 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
        <div class="p-4 flex flex-row items-center justify-between">
            {{-- <a href="#" class="text-lg font-semibold tracking-widest text-gray-900  rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">e-Perpustakaan</a> --}}
            <a href="{{ route('index') }}" class="rounded-lg focus:outline-none focus:shadow-outline ">
                <img src="{{ asset('img/marbabu/marbabu-logo4.png') }}" alt="Logo e-Perpustakaan" class="h-10 w-auto">
            </a>
            <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <nav :class="{ 'flex': open, 'hidden': !open }"
            class="flex-col gap-3 flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
            <div class="flex space-x-6">
                <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="{{ route('index') }}">Home</a>
                <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="#">About</a>
            </div>

            <div class="flex items-center space-x-6">
                @guest
                    <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{ route('register') }}">Daftar</a>
                @endguest

                @auth
                    {{-- @php
                        $notifikasi = \App\Models\Notifikasi::where('id_peminjam', Auth::id())
                            ->orderBy('created_at', 'desc')
                            ->get();
                        $jumlahNotifikasi = $notifikasi->count();
                    @endphp --}}
                    {{-- Notifikasi Start --}}
                    <button onclick="toggleNotification()" class="relative">
                        <i data-feather="bell" class="w-6 h-6"></i>
                        @if ($jumlahNotifikasi > 0)
                            <span
                                class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full px-1">{{ $jumlahNotifikasi }}</span>
                        @endif
                    </button>

                    <!-- Modal Notifikasi -->
                    <div id="notificationModal"
                        class="absolute top-full z-50 right-0 mt-2 w-64 bg-white rounded shadow-lg hidden">
                        <div class="p-3 border-b">
                            <p class="font-bold">Notifikasi</p>

                        </div>
                        <div class="p-3 max-h-60 overflow-y-auto">

                            @if ($jumlahNotifikasi > 0)
                                @foreach ($notifikasi as $notif)
                                    <div class="p-2 border-b">
                                        <p class="text-gray-800 text-sm">{!! $notif->pesan !!}</p>
                                        <p class="text-gray-500 text-xs">{{ $notif->created_at->diffForHumans() }}</p>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-gray-600 text-sm">Tidak ada notifikasi baru.</p>
                            @endif
                            <button onclick="closeNotification()" class="text-gray-500 text-sm">Tutup</button>

                        </div>
                    </div>

                    {{-- Notifikasi End --}}

                    {{-- Profile Start --}}
                    <div class="relative">
                        <!-- Foto Profil -->
                        <button onclick="toggleProfileMenu()" class="flex items-center space-x-2">
                            <img src="{{ Auth::user()->poto ?? asset('img/logos/default-profile.png') }}"
                                class="w-10 h-10 rounded-full">
                        </button>

                        <div id="profileMenu" class="absolute right-0 mt-2 w-48 bg-white rounded shadow-lg hidden">
                            <div class="p-3 border-b">
                                <p class="font-bold">{{ Auth::user()->name }}</p>
                                <p class="text-sm text-gray-600">{{ Auth::user()->email }}</p>
                            </div>
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">Lihat
                                Profil</a>
                            <a href="{{ route('koleksi.index') }}" class="block px-4 py-2 hover:bg-gray-100">Koleksi</a>
                            {{-- <a href="#" class="block px-4 py-2 hover:bg-gray-100">Koleksi</a> --}}
                            {{-- <a href="{{ route('peminjaman.index') }}" class="block px-4 py-2 hover:bg-gray-100">Peminjaman --}}
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Peminjaman
                                Buku</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
                            </form>
                        </div>
                    </div>
                    {{-- Profile End --}}
                @endauth
            </div>


    </div>
    </nav>
</div>
</div>
