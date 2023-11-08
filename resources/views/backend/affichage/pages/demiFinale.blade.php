@include('layouts.index_admin')


<div class="main-content">
    <div class="contenir">
        <div class="header-title">
            <h4>Demi Finale</h4>
        </div>

        {{-- prime --}}
        <ul class="prime">
            <li> <a href="">Prime8</a>
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


    <div class="candidats">

        <div class="info">
            <div class="navigation">
                <a href="#" id="previousCandidate">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>

            <div class="img">
                <img src="{{ asset('storage/img/adele2.jpg') }}" alt="" srcset="">
            </div>

            <p id="badge">N badge : {{ $candidats[0]->badge }}</p>
            <p id="name">Name : {{ $candidats[0]->name }}</p>
            <p id="song">{{ $candidats[0]->song }}</p>
            <p id="score">Nombre de vote : {{ $candidats[0]->score }}</p>

            <div class="navigation">
                <a href="#" id="nextCandidate">
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>


    </div>

    {{-- Les jurys --}}

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
    const candidats = @json($candidats); // Convertir les données des candidats en JSON

    let currentCandidateIndex = 0; // Indice du candidat actuel

    // Fonction pour afficher les détails du candidat en fonction de son indice
    function showCandidateDetails(index) {
        const candidate = candidats[index];
        document.getElementById('badge').textContent = 'N badge : ' + candidate.badge;
        document.getElementById('name').textContent = 'Name : ' + candidate.name;
        document.getElementById('song').textContent = candidate.song;
        document.getElementById('score').textContent = 'Nombre de vote : ' + candidate.score;
    }

    // Gérer le clic sur le bouton "Précédent"
    document.getElementById('previousCandidate').addEventListener('click', function(e) {
        e.preventDefault(); // Empêcher le lien de naviguer

        currentCandidateIndex--;

        if (currentCandidateIndex < 0) {
            currentCandidateIndex = candidats.length - 1;
        }

        showCandidateDetails(currentCandidateIndex);
    });

    // Gérer le clic sur le bouton "Suivant"
    document.getElementById('nextCandidate').addEventListener('click', function(e) {
        e.preventDefault(); // Empêcher le lien de naviguer

        currentCandidateIndex++;

        if (currentCandidateIndex >= candidats.length) {
            currentCandidateIndex = 0;
        }

        showCandidateDetails(currentCandidateIndex);
    });

    // Afficher le candidat actuel
    showCandidateDetails(currentCandidateIndex);
</script>