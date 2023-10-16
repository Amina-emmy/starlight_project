<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('storage/logo/star_ico.png') }}">
    <title>StarLight</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    @auth
        <x-app-layout>
            {{-- here the default breeze nav --}}
        </x-app-layout>
    @endauth

    {{-- les messages d'erreurs --}}
    @include('our_layouts.flash')

    {{-- different contenu selon la page--}}
    @yield('content')
</body>

</html>
