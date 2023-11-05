 {{-- UPDATE --}}

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
        data-bs-target="#Edit{{ $aud_candidat->id }}Label">
        <i class="fa-solid fa-pen text-white"></i>
    </button>

    <!-- Modal UPDATE -->
    <form action="{{route('update.audCandidat', $aud_candidat->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal modal-xl fade " id="Edit{{ $aud_candidat->id }}Label" tabindex="-1"
            aria-labelledby="Edit{{ $aud_candidat->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-black" id="exampleModalLabel">Audition
                            Candidat Num: {{ $aud_candidat->badge }}</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div
                        class="modal-body ajout w-100 d-flex justify-content-evenly align-content-between">
                        <div class="">
                            <div class="">
                                <label for="badge" name="badge">Badge :</label>
                                <input type="text" name="badge" id=""
                                    class="form-control w-100"
                                    value="{{ $aud_candidat->badge }}">
                            </div>
                            <div class="">
                                <label for="chanson" name="chanson">Chanson :</label>
                                <input type="text" name="chanson" id=""
                                    class="form-control w-100"
                                    value="{{ $aud_candidat->chanson }}">
                            </div>
                        </div>
                        <div class="">
                            <div class="">
                                <label for="prenom" name="prenom">Prenom :</label>
                                <input type="text" name="prenom" id=""
                                    class="form-control w-100"
                                    value="{{ $aud_candidat->prenom }}">
                            </div>
                            <div class="">
                                <label for="gender" name="gender">Gender :</label>
                                <select name="gender" id=""class="form-control w-100">                                   
                                    <option value="Femme" {{ $aud_candidat->gender === 'Femme' ? 'selected' : '' }}>
                                        Femme
                                    </option>
                                    <option value="Homme" {{$aud_candidat->gender === 'Homme' ? 'selected' : ''}}>Homme</option>
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <div class="">
                                <label for="nom" name="nom">Nom :</label>
                                <input type="text" name="nom" id=""
                                    class="form-control w-100" value="{{ $aud_candidat->nom }}">
                            </div>
                            <div class="">
                                <label for="ville_provenance" name="ville_provenance">Ville
                                    :</label>
                                <input type="text" name="ville_provenance" id=""
                                    class="form-control w-100"
                                    value="{{ $aud_candidat->ville_provenance }}">
                            </div>
                        </div>
                        <div class="">
                            <div class="">
                                <label for="date_naissance" name="date_naissance">Date Naissance
                                    :</label>
                                <input type="date" name="date_naissance" id=""
                                    class="form-control w-100"
                                    value="{{ $aud_candidat->date_naissance }}">
                            </div>
                            <div class="">
                                <label for="episode_id">Episode :</label>
                                <select name="episode_id" id=""
                                    class="form-control w-100">
                                    @foreach ($episodes as $episode)
                                    <option value="{{ $episode->prime }}" >
                                        {{ $episode->prime }}
                                    </option>
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Modifiez</button>
                    </div>
                </div>
            </div>
        </div>
    </form>