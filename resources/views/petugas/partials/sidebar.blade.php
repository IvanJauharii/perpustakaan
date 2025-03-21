<div
    class="sidebar fixed left-0 top-0 min-h-screen w-[3.35rem] overflow-hidden border-r hover:w-56 hover:bg-white hover:shadow-lg">
    <div class="flex h-screen flex-col justify-between pt-2 pb-6">
        <div>
            <div class="w-max p-2.5">
                <img src="https://tailus.io/images/logo.svg" class="w-32" alt="">
            </div>
            <ul class="mt-6 space-y-2 tracking-wide">
                <li class="min-w-max">
                    <a href="{{ route('profile.edit') }}" aria-label="dashboard"
                        class="relative flex  items-center space-x-4 pr-4 pl-2 py-3 rounded-md 
                        {{ request()->routeIs('profile.edit') ? 'bg-gradient-to-r from-green-700 to-green-500 text-white !important' : 'text-gray-600 hover:bg-gray-200' }}">

                        <!-- Ganti Icon User dengan Foto Profil -->
                        <img src="{{ Auth::user()->poto ?? asset('img/logos/default-profile.png') }}"
                            class="h-8 w-8 rounded-full object-cover">

                        <!-- Tampilkan Nama & Username -->
                        <div class="flex flex-col">
                            <span class="font-medium">{{ Auth::user()->name }}</span>
                            <span class="text-sm text-gray-500">{{ Auth::user()->email }}</span>
                        </div>
                    </a>
                </li>

                @php
                    $jumlahNotifikasi = \App\Models\Notifikasi::where('status', 'pending')->count();
                @endphp
                <li class="min-w-max">
                    <a href="{{ route('notifikasi.index') }}"
                        class="flex items-center space-x-4 px-4 py-3 rounded-md {{ request()->routeIs('notifikasi.index') ? 'bg-gradient-to-r from-green-700 to-green-500 text-white !important' : 'text-gray-600 hover:bg-gray-200' }}">
                        <div class="relative">
                            <i data-feather="bell" class="h-5 w-5"></i>

                            @if ($jumlahNotifikasi > 0)
                                <span
                                    class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full px-1">{{ $jumlahNotifikasi }}</span>
                            @endif
                        </div>
                        <span>Notifikasi</span>
                    </a>
                </li>

                <li class="min-w-max">
                    <a href="{{ route('petugas.dashboard') }}" aria-label="dashboard"
                        class="relative flex items-center space-x-4 px-4 py-3 rounded-md 
                        {{ request()->routeIs('petugas.dashboard') ? 'bg-gradient-to-r from-green-700 to-green-500 text-white !important' : 'text-gray-600 hover:bg-gray-200' }}">
                        <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z"
                                class="fill-current text-cyan-400 dark:fill-slate-600"></path>
                            <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z"
                                class="fill-current text-cyan-200"></path>
                            <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z"
                                class="fill-current"></path>
                        </svg>
                        <span class="-mr-1 font-medium">Dashboard</span>
                    </a>
                </li>

                <li class="min-w-max">
                    <a href="{{ route('peminjaman.index') }}"
                        class="flex items-center space-x-4 px-4 py-3 rounded-md 
                        {{ request()->routeIs('peminjaman.index') ? 'bg-gradient-to-r from-green-700 to-green-500 text-white !important' : 'text-gray-600 hover:bg-gray-200' }}">
                        <i data-feather="book" class="h-5 w-5"></i>
                        <span>Peminjaman</span>
                    </a>
                </li>

                <li class="min-w-max">
                    <a href="{{ route('peminjam.index') }}"
                        class="flex items-center space-x-4 px-4 py-3 rounded-md 
                        {{ request()->routeIs('peminjam.index') ? 'bg-gradient-to-r from-green-700 to-green-500 text-white !important' : 'text-gray-600 hover:bg-gray-200' }}">
                        <i data-feather="grid" class="h-5 w-5"></i>
                        <span>Peminjam</span>
                    </a>
                </li>


                <li class="min-w-max">
                    <a href="{{ route('denda.index') }}"
                        class="flex items-center space-x-4 px-4 py-3 rounded-md 
                        {{ request()->routeIs('denda.index') ? 'bg-gradient-to-r from-green-700 to-green-500 text-white !important' : 'text-gray-600 hover:bg-gray-200' }}">
                        <i data-feather="users" class="h-5 w-5"></i>
                        <span>Denda</span>
                    </a>
                </li>
                <li class="min-w-max">
                    <a href="{{ route('ulasan.index') }}"
                        class="flex items-center space-x-4 px-4 py-3 rounded-md 
                        {{ request()->routeIs('ulasan.index') ? 'bg-gradient-to-r from-green-700 to-green-500 text-white !important' : 'text-gray-600 hover:bg-gray-200' }}">
                        <i data-feather="bookmark" class="h-5 w-5"></i>
                        <span>Ulasan</span>
                    </a>
                </li>



        </div>
        <div class="w-max -mb-3">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="group flex items-center space-x-4 rounded-md px-4 py-3 text-gray-600">
                    <i data-feather="log-out" class="w-5 h-5 group-hover:text-red-600"></i>
                    <span class="group-hover:text-red-600">Logout</span>
                </button>
            </form>
        </div>
    </div>
</div>
