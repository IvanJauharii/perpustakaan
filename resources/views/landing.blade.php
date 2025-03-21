<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>marbabu | Gemar Baca Buku</title>
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/marbabu/marbabu-webicon.png') }}" type="image/png" sizes="16x16">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @vite('resources/js/app.js')
    @include('script')

</head>

<body>

    @include('components.navbar')
    @include('jumbotron')
    @include('popup-kategori')
    @include('news')
    @include('components.footer')
</body>

</html>
