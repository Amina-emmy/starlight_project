@include('layouts.index_admin')

<div class="main-content">
    <div class="contenir">
        <div class="header-title">
            <h4>Dashboard</h4>
        </div>

        <div class="user-info">
            <div class="img">
                <a href="{{ route('profile.edit') }}">
                    <img src={{ asset('storage/images_users/' . auth()->user()->image) }} alt="" srcset="">
                </a>
            </div>
            <a href="{{ route('profile.edit') }}" class="nav-link">
                <p>{{ auth()->user()->name }}</p>
            </a>
        </div>
    </div>


    {{-- ADMIN --}}
    {{-- cartes pour les cruds --}}
    <h1>JEU : Administration de données</h1>
    <div class="cartes_crud">
        <a href="{{ route('admin.episodes') }}">
            <div class="carte6">
                <i class="fa-solid fa-clapperboard"></i>
                <h5>Episodes</h5>
            </div>
        </a>
        <a href="{{ route('admin.audGestion') }}">
            <div class="carte1">
                <i class="fa-solid fa-street-view"></i>
                <h5>Audition</h5>
            </div>
        </a>
        <a href="#">
            <div class="carte2">
                <i class="fa-solid fa-user-group"></i>
                <h5>Face à Face</h5>
            </div>
        </a>
        <a href="#">
            <div class="carte3">
                <i class="fa-solid fa-shield"></i>
                <h5>UltimeFace à Face</h5>
            </div>
        </a>
        <a href="#">
        <div class="carte4">
            <i class="fa-solid fa-shield-halved"></i>
                <h5>Demi Finale</h5>
            </div>
        </a>
        <a href="#">
        <div class="carte5">
            <i class="fa-solid fa-trophy"></i>
                <h5>Finale</h5>
            </div>
        </a>
    </div>

</div>
