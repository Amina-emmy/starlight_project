<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('storage/logo/star_ico.png') }}">
    <title>Starlight</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- Fontawesome --}}
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.3.0-web/css/all.min.css') }}">

</head>

<body class="dashboard">
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('storage/logo/starlight_logo.png') }}" alt="Glowing logo" class="glow-image">
        </div>
        <ul class="menu">
            <li>
                <a href="{{ route('admin.dashboardAdmin') }}">
                    <i class="fa-solid fa-gauge-high"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.users') }}">
                    <i class="fa-solid fa-users"></i>
                    <span>Users</span>
                </a>
            </li>


            <li>
                <a href="#">
                    {{-- page pour gerer les candidat avant Game --}}
                    <i class="fa-solid fa-user"></i>
                    <span>Candidats</span>
                </a>
            </li>


            <li>
                <a href="#">
                    <i class="fa-solid fa-trophy"></i>
                    <span>Game</span>
                </a>
            </li>

            <ol class="test">
                <a href={{route('admin.audAffichage')}}>
                <i class="fa-solid fa-street-view"></i>
                <span>Audition</span>
                </a>
            </ol>
            <ol class="test">
                <a href="{{route('admin.FafAffichage')}}">
                <i class="fa-solid fa-user-group"></i>
                <span>FAF</span>
                </a>
            </ol>
            <ol class="test">
                <a href="{{route('admin.UFafAffichage')}}">
                <i class="fa-solid fa-shield"></i>
                <span>Ultime FAF</span>
                </a>
            </ol>
            <ol class="test">
                {{-- <a href="{{route('DemiFinale')}}"> --}}
                <i class="fa-solid fa-shield-halved"></i>
                <span>Demi finale</span>
                </a>
            </ol>
            <ol class="test">
                {{-- <a href="{{route('Finale')}}"> --}}
                <i class="fa-solid fa-trophy"></i>
                <span>Finale</span>
                </a>
            </ol>

            {{-- le detail de jeu --}}

            <li class="settings">
                <a href="#">
                    <i class="fa-solid fa-gear"></i>
                    <span>Settings</span>
                </a>

            </li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">
                    <li class="logout">
                        <a href="#">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </button>
            </form>
        </ul>

    </div>



    {{-- FIN DIV DE CANDIDATS --}}



    {{-- VOTES --}}
    {{-- <div class="votes">


</div> --}}

    </div>


</body>

</html>
