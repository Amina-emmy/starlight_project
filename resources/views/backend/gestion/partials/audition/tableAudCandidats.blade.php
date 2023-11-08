{{-- TABLE aud_candidats --}}
<table class="table rounded-3 overflow-hidden">
    <thead>
        <tr valign="middle">
            <th scope="col">#</th>
            <th scope="col">N badge</th>
            <th scope="col">Image</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Show</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>

        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($aud_candidats as $aud_candidat)
            <tr valign="middle">
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $aud_candidat->badge }}</td>
                <td>
                    <img src="{{ asset('/storage/images_cand/' . $aud_candidat->photo) }}" alt="avatar_person"
                        width="45">
                </td>
                <td>{{ $aud_candidat->nom }}</td>
                <td>{{ $aud_candidat->prenom }}</td>
                <td>
                    {{-- show modal les infos de candidat  --}}
                    @include('backend.gestion.partials.audition.showAudCandidat')
                </td>
                <td>
                    {{-- update modal candidat infos --}}
                    @include('backend.gestion.partials.audition.updateAudCandidat')
                </td>
                <td>
                    {{-- DELETE  --}}
                    @include("backend.gestion.partials.audition.suppAudCand")
                </td>
        @endforeach
        </tr>
    </tbody>
</table>
