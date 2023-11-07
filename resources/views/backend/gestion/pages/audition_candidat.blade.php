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
        {{-- PARTIE Aud_Candidats --}}
        <div class="mb-2 mt-4 d-flex justify-content-center">
            @include('backend.gestion.partials.audition.audCandidatAdd')
        </div>
        @include('backend.gestion.partials.audition.tableAudCandidats')
    </div>

    {{-- PARTIE VOTES Aud_Candidats --}}
    <div class="py-2 container">
        <div class="mb-2 mt-4 d-flex justify-content-center">
            <form action="{{ route('store.voteAud') }}" method="POST">
                @csrf
                @if (count($vote_auds) < 64)
                    <button type="submit" class=" btn btn-success text-white">
                        <i class="fa-solid fa-rotate-right me-2" style="color: #ffffff;"></i>lancer table de votes </button>
                @else
                    <button type="submit" class=" btn btn-success text-white" disabled>
                        <i class="fa-solid fa-rotate-right me-2" style="color: #ffffff;"></i>lancer table de votes </button>
                @endif
            </form>
        </div>

        <table class="table rounded-3 overflow-hidden">
            <thead>
                <tr valign="middle" class="text-center">
                    <th scope="col" class="text-center">#</th>
                    <th scope="col">vote_jury1</th>
                    <th scope="col">vote_jury2</th>
                    <th scope="col">vote_jury3</th>
                    <th scope="col">vote_jury4</th>
                    <th scope="col">vote_jury5</th>
                    <th scope="col">jury_points</th>
                    <th scope="col">Nom Complet</th>
                    <th scope="col">Num Badge</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($vote_auds as $vote_aud)
                    <tr valign="middle" class="text-center">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $vote_aud->vote_jury1 }}</td>
                        <td>{{ $vote_aud->vote_jury2 }}</td>
                        <td>{{ $vote_aud->vote_jury3 }}</td>
                        <td>{{ $vote_aud->vote_jury4 }}</td>
                        <td>{{ $vote_aud->vote_jury5 }}</td>
                        <td>{{ $vote_aud->jury_points }}</td>
                        <td>{{ $vote_aud->aud_candidat->nom }} {{ $vote_aud->aud_candidat->prenom }}</td>
                        <td>{{ $vote_aud->aud_candidat->badge }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
