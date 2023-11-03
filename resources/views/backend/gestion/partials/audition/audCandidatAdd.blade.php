@if (count($aud_candidats) < 3)
    {{-- Limiter a 64 candidats --}}

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Ajouter_Audition_Candidat">
        Add Candidats
    </button>
 {{-- AJOUT AUDITION CANDIDAT --}}
    <!-- Modal -->
    <form action="{{ route('store.audCandidat') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal modal-xl fade " id="Ajouter_Audition_Candidat" tabindex="-1"
            aria-labelledby="ModalAddCandidatLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title text-black" id="exampleModalLabel">Audition Candidats </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body ajout w-100 d-flex justify-content-evenly align-content-between">
                        <div class="">
                            <div class="">
                                <label for="badge" name="badge">Badge :</label>
                                <input type="text" name="badge" id="" class="form-control w-100">
                            </div>

                            <div class="">
                                <label for="chanson" name="chanson">Chanson :</label>
                                <input type="text" name="chanson" id="" class="form-control w-100">
                            </div>
                        </div>

                        <div class="">

                            <div class="">
                                <label for="prenom" name="prenom">Prenom :</label>
                                <input type="text" name="prenom" id="" class="form-control w-100">
                            </div>


                            <div class="">
                                <label for="gender" name="gender">Gender :</label>
                                <select name="gender" id=""class="form-control w-100">

                                    <option value="Femme">
                                        Femme
                                    </option>
                                    <option value="Homme">Homme</option>
                                </select>
                            </div>

                        </div>

                        <div class="">
                            <div class="">
                                <label for="nom" name="nom">Nom :</label>
                                <input type="text" name="nom" id="" class="form-control w-100">
                            </div>


                            <div class="">
                                <label for="ville_provenance" name="ville_provenance">Ville :</label>
                                <input type="text" name="ville_provenance" id=""
                                    class="form-control w-100">
                            </div>
                        </div>

                        <div class="">
                            <div class="">
                                <label for="date_naissance" name="date_naissance">Date Naissance :</label>
                                <input type="date" name="date_naissance" id=""
                                    class="form-control w-100">
                            </div>


                            {{-- <div class="">
                            <label for="episode_id">Episode :</label>
                            <select name="episode_id" id="" class="form-control w-100">
                                @foreach ($aud_candidats->unique('episode_id') as $aud_candidat)
                                <option value="{{ $aud_candidat->episode->id }}">
                                    {{ $aud_candidat->episode->prime }}
                                </option>
                                    
                                @endforeach
                            </select>
                        </div> --}}

                            <div class="">
                                <label for="episode_id">Episode :</label>
                                <select name="episode_id" id="" class="form-control w-100">
                                    @foreach ($episodes as $episode)
                                        <option value=" {{ $episode->prime }} ">
                                            {{ $episode->prime }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Ajoutez</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- Fin modal --}}

    @else
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#supp">
        Add Candidats
    </button>


    <!-- Modal -->
    <div class="modal fade " id="supp" tabindex="-1" aria-labelledby="suppLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body h-100">
                    <div class="d-flex flex-column align-items-center py-3">
                        <div>
                            <img src="/storage/img/iconSupp.webp" width="90" alt="warning_icon">
                        </div>
                        <div class="mt-3">
                            <h5 class="">Vous etes dépassez 64 candidats</h5>
                        </div>
                        <div class="mt-4">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif