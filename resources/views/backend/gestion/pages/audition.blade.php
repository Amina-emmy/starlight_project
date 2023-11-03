@include('layouts.index_admin')
<div class="main-content">
    <div class="contenir">
        <div class="header-title">
            <h4>Audition : gestion</h4>
        </div>
        <div class="user-info">
            <div class="img">
                <a href="{{ route('profile.edit') }}">
                    <img src={{ asset('storage/images_users/' . auth()->user()->image) }} alt="pfp">
                </a>
            </div>
            <a href="{{ route('profile.edit') }}" class="nav-link">
                <p>{{ auth()->user()->name }}</p>
            </a>
        </div>
    </div>
    {{-- MESSAGE D' ALERTS --}}
    <div class="mt-2">
        @include('layouts.flash')
    </div>
    {{-- END MESSAGE D' ALERTS --}}
    <div class="py-2 container">
        <div class="mb-2 mt-4 d-flex justify-content-center">
            {{-- modal d ajout --}}
        </div>
        {{-- TABLE --}}
        
    </div>

</div>
