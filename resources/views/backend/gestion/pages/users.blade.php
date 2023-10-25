@include('layouts.index_admin')
<div class="main-content">
    <div class="contenir">
        <div class="header-title">
            <h4>Users</h4>
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
    <div class="py-3 container">
        <h1>Jury Members :</h1>
        @include('backend.gestion.partials.users.tableJurys')

        <h1>Public Members :</h1>
        @include('backend.gestion.partials.users.tablePublic')
    </div>

</div>
