<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StarLight</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>

<body>
    @include("our_layouts.flash")
    @yield('content')
</body>

</html>
