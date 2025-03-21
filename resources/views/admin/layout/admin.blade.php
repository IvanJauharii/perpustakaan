<!--
=========================================================
* Soft UI Dashboard Tailwind - v1.0.5
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard-tailwind
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="./assets/img/favicon.png" />
    <link rel="icon" href="{{ asset('img/marbabu/marbabu-webicon.png') }}" type="image/png" sizes="16x16">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>marbabu | @yield('title')</title>
    @include('admin.pages.buku.script-detail')
</head>

<body>
    <div class="">

        @if (Auth::check() && Auth::user()->role === 'admin')
            @include('admin.partials.sidebar') {{-- Sidebar untuk Admin --}}
        @elseif(Auth::check() && Auth::user()->role === 'petugas')
            @include('petugas.partials.sidebar') {{-- Sidebar untuk Petugas --}}
        @else
            @include('peminjam.sidebar') {{-- Sidebar untuk Peminjam --}}
        @endif

        @include('admin.pages.buku.detail-buku')
        <div class="w-3/4 -z-10 m-auto">
            @yield('content')
        </div>
    </div>
</body>

</html>
