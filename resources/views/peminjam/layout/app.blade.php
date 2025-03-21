<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/marbabu/marbabu-webicon.png') }}" type="image/png" sizes="16x16">
    @include('script')
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>@yield('title')</title>
</head>

<body class="w-full h-screen">
    <div class="w-full">
        <x-navbar></x-navbar>
        <x-search mt="mt-28"></x-search>
        <div class="w-full m-auto">
            @yield('content')

            <!-- Modal Login -->
            <div id="loginModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                <div class="bg-white p-6 rounded shadow-lg w-96">
                    <h2 class="text-xl font-semibold mb-4">Silakan Login</h2>
                    <p class="text-gray-600">Anda harus login untuk melakukan aksi ini.</p>
                    <div class="mt-4 flex justify-end">
                        <a href="{{ route('login') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Login</a>
                        <button onclick="closeLoginModal()"
                            class="ml-2 bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
</body>

</html>
