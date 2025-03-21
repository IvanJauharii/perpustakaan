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
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="">

        @include('petugas.partials.sidebar')
        <div class="w-3/4 -z-10 m-auto">
            @yield('content')
        </div>
    </div>
</body>

</html>
