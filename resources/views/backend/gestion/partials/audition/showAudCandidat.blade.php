{{-- SHOW Infos des Candidats --}}

    <button type="button" class="btn btn-info" data-bs-toggle="modal"
        data-bs-target="#show{{$aud_candidat->id}}">
        <i class="fa-solid fa-eye text-white"></i>
    </button>
    <!-- Modal SHOW-->
    <div class="modal modal-lg fade" id="show{{$aud_candidat->id}}" tabindex="-1"
        aria-labelledby="show{{$aud_candidat->id}}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content ">
                <div class="modal-header d-flex flex-column">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <h4>Show Candidat</h4>
                </div>
                <div class="modal-body h-100 show_aud_candidat">
                    <div class="cartes">
                        <div class="carte1">
                            <div class="img_gender">
                                <img src="{{ asset('/storage/images_cand/'. $aud_candidat->photo) }}"
                                    alt="avatar_person">
                            </div>
                            <div class="">
                                <label for="badge" name="badge">Badge :</label>
                                <label for=""
                                    class="">{{ $aud_candidat->badge }}</label>
                            </div>
                        </div>
                        <div class="carte2">
                            <div class="">
                                <label for="prenom" name="prenom" class="propriete">Prenom
                                    :</label>
                                <label for=""
                                    class="">{{ $aud_candidat->prenom }}</label>
                            </div>
                            <div>
                                <label for="nom" name="nom" class="propriete">Nom
                                    :</label>
                                <label for=""
                                    class="">{{ $aud_candidat->nom }}</label>
                            </div>
                            <div>
                                <label for="chanson" name="chanson" class="propriete">Chanson
                                    :</label>
                                <label for=""
                                    class="">{{ $aud_candidat->chanson }}</label>
                            </div>
                            <div>
                                <label for="gender" name="gender" class="propriete">Gender
                                    :</label>
                                <label for=""
                                    class="">{{ $aud_candidat->gender }}</label>
                            </div>
                            <div>
                                <label for="ville_provenance" name="ville_provenance"
                                    class="propriete">Ville
                                    :</label>
                                <label for=""
                                    class="">{{ $aud_candidat->ville_provenance }}</label>
                            </div>
                            <div>
                                <label for="date_naissance" name="date_naissance"
                                    class="propriete">Date.Né :</label>
                                <label for=""
                                    class="">{{ date('d.m.Y', strtotime($aud_candidat->date_naissance)) }}</label>
                            </div>
                            <div>
                                <label for="episode_id" class="propriete">Episode :</label>
                                <label for="" class="">
                                    {{ $aud_candidat->episode->prime }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
