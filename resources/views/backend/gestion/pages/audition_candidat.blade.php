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
            @include('backend.gestion.partials.audition.audCandidatAdd')
        </div>
        {{-- TABLE aud_candidats --}}
        <table class="table">
            <thead>
                <tr valign="middle">
                    <th scope="col">#</th>
                    <th scope="col">N badge</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Show</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($aud_candidats as $aud_candidat)
                    <tr valign="middle">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $aud_candidat->badge }}</td>
                        <td>{{ $aud_candidat->nom }}</td>
                        <td>{{ $aud_candidat->prenom }}</td>

                        @include('backend.gestion.partials.audition.showAudCandidat')

                        @include('backend.gestion.partials.audition.updateAudCandidat')
                        {{-- DELETE  --}}
                        <td>
                            <form action="{{ route('destroy.audCandidat', $aud_candidat->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-trash text-white"></i> </button>
                            </form>
                        </td>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <form action="{{ route('store.voteAud') }}" method="POST">
            @csrf
            @if (session('success'))
                <button type="submit" class=" btn btn-success text-white" disabled>inserer</button>
            @else
                <button type="submit" class=" btn btn-success text-white">inserer</button>
            @endif
        </form>


        <table class="table">
            <thead>
                <tr valign="middle" class="">
                    <th scope="col" class="text-center">#</th>
                    <th scope="col">vote_jury1</th>
                    <th scope="col">vote_jury2</th>
                    <th scope="col">vote_jury3</th>
                    <th scope="col">vote_jury4</th>
                    <th scope="col">vote_jury5</th>
                    <th scope="col">jury_points</th>
                    <th scope="col">Nom Complet</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vote_auds as $vote_aud)
                    <tr valign="middle">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $vote_aud->vote_jury1 }}</td>
                        <td>{{ $vote_aud->vote_jury2 }}</td>
                        <td>{{ $vote_aud->vote_jury3 }}</td>
                        <td>{{ $vote_aud->vote_jury4 }}</td>
                        <td>{{ $vote_aud->vote_jury5 }}</td>
                        <td>{{ $vote_aud->jury_points }}</td>
                        <td>{{ $vote_aud->aud_candidat->nom }} {{ $vote_aud->aud_candidat->prenom }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
