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