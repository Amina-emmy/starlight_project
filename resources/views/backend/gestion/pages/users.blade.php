@include('layouts.index_admin')
<div class="main-content">
    @include('backend.gestion.partials.userInfo')

    <div class="py-3 container">
        <h1>Jury Members :</h1>
        @include('backend.gestion.partials.users.tableJurys')

        <h1>Public Members :</h1>
        @include('backend.gestion.partials.users.tablePublic')
    </div>

</div>
