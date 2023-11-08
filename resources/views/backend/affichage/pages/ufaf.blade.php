@include('layouts.index_admin')

<div class="main-content">
    <div class="contenir">
        <div class="header-title">
            {{-- <span>
                Quaternary
            </span> --}}

            <h4>Ultime Face a Face</h4>
        </div>
        {{-- prime --}}
        <ul class="prime">
            <li> <a href="">Prime7</a>
            </li>
            
        </ul>
        <div class="user-info">
            <div class="img">
                <a href="{{ route('profile.edit') }}">
                    <img src={{ asset('storage/images_users/' . auth()->user()->image) }} alt="pfpuser" srcset="">
                </a>
            </div>
            <a href="{{ route('profile.edit') }}" class="nav-link">
                <p>{{ auth()->user()->name }}</p>
            </a>
        </div>
    </div>



    {{-- LES CARTES --}}
    <div class="test_card">
        <div class="div1">
            <div class="nombre">
                <h4>
                    8/count(Pos)
                </h4>

                <p>Positions</p>
            </div>
            <div class="icone">
                <i class="fa-solid fa-award"></i>
            </div>
        </div>

        <div class="div2">
            <div class="nombre">
                <h4>
                    10/count(Candi)
                </h4>
                <p>Candidats</p>
            </div>
            <div class="icone">
                <i class="fa-solid fa-user"></i>
            </div>
        </div>

        <div class="div3">
            <div class="nombre">
                <h4>
                    5
                </h4>
                <p>Jurys</p>
            </div>
            <div class="icone">
                <i class="fa-solid fa-users"></i>

            </div>
        </div>

        <div class="div4">
            <div class="nombre">
                <h4>
                    3/count(votes)

                </h4>
                <p>Votes</p>
            </div>
            <div class="icone">
                <i class="fa-solid fa-star"></i>
            </div>
        </div>



    </div>


    {{-- LES CANDIDATS --}}
    <div class="candidats_faf">
        <!-- Bouton "Précédent" -->
        <!-- Bouton "Précédent" -->
        <div class="navigation">
            <a href="#" id="previousCandidate">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>

        <!-- Candidat 1 -->
        <div class="candidat" id="candidate1">
            <div class="img">
                <img src="{{ asset('storage/img/selena.jpg') }}" alt="" srcset="">
            </div>
            <p id="badge">N badge : {{ $candidats[0]->badge }}</p>
            <p id="name">Name : {{ $candidats[0]->nom }} {{ $candidats[0]->prenom }}</p>
        </div>

        <!-- Nombre de vote pour le candidat 1 -->
        <p class="nbr_vote" id="score">
            {{-- {{ $candidats[0]->score }} --}}
        </p>

        <!-- Nom de la chanson du candidat 1 -->
        <div class="song">
            <p id="song">{{ $candidats[0]->song }}</p>
        </div>

        <p class="nbr_vote" id="score2">
            {{-- {{ $candidats[1]->score }} --}}
        </p>
        <!-- Candidat 2 -->
        <div class="candidat" id="candidate2">
            <div class="img">
                <img src="{{ asset('storage/img/adele2.jpg') }}" alt="" srcset="">
            </div>
            <p id="badge2">N badge : {{ $candidats[1]->badge }}</p>
            <p id="name2">Name : {{ $candidats[1]->nom }}  {{ $candidats[1]->prenom }}</p>
        </div>

        <!-- Bouton "Suivant" -->
        <div class="navigation">
            <a href="#" id="nextCandidate">
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>

    {{-- Les jurys --}}
    <div class="jurys">
        @foreach ($jurys as $jury)
            <div class="jury">
                <img src="{{ asset('storage/images_users/'.$jury->image) }}" alt="" srcset="">
                <h4>{{$jury->name}}</h4>
                <div class="vote">
                    <button>
                        Vote 0
                        {{-- should be changed to 1 to jury that voted at the currentCandidat --}}
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    // this part to be functional must be like the audition (Infos from DB to View using affichage fonction)
    const candidats = @json($candidats); // Convertir les données des candidats en JSON
    let currentCandidateIndex = 0; // Indice du premier candidat

    // Fonction pour afficher les détails des deux candidats en fonction de l'indice du premier candidat
    function showCandidateDetails(firstCandidateIndex) {
        const firstCandidate = candidats[firstCandidateIndex];
        const secondCandidate = candidats[firstCandidateIndex + 1]; // Deuxième candidat

        // Affichage des détails du premier candidat
        document.getElementById('badge').textContent = 'N badge : ' + firstCandidate.badge;
        document.getElementById('name').textContent = 'Name : ' + firstCandidate.nom +" " +firstCandidate.prenom;
        document.getElementById('song').textContent = firstCandidate.song;
        document.getElementById('score').textContent = '' + firstCandidate.score;

        // Affichage des détails du deuxième candidat
        document.getElementById('badge2').textContent = 'N badge : ' + secondCandidate.badge;
        document.getElementById('name2').textContent = 'Name : ' + secondCandidate.nom+" " +firstCandidate.prenom;
        document.getElementById('score2').textContent = '' + secondCandidate.score;
    }

    // Gérer le clic sur le bouton "Précédent"
    document.getElementById('previousCandidate').addEventListener('click', function(e) {
        // e.preventDefault(); // Empêcher le lien de naviguer
        currentCandidateIndex = (currentCandidateIndex - 2 + candidats.length) % candidats.length;
        showCandidateDetails(currentCandidateIndex);
    });

    // Gérer le clic sur le bouton "Suivant"
    document.getElementById('nextCandidate').addEventListener('click', function(e) {
        // e.preventDefault(); // Empêcher le lien de naviguer
        currentCandidateIndex = (currentCandidateIndex + 2) % candidats.length;
        showCandidateDetails(currentCandidateIndex);
    });

    // Afficher les détails des candidats initiaux
    showCandidateDetails(currentCandidateIndex);
</script>
