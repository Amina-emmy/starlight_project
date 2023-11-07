<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('storage/logo/star_ico.png') }}">
    <title>Starlight</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- Fontawesome --}}
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.3.0-web/css/all.min.css') }}">
</head>

<body>
    <div class="juri_vote_aud_candidat">
        <div class="contenir_jury">
            <div class="header-title">
                <h4>Audition</h4>
            </div>

            <div class="user-info">
                <div class="img">
                    <img src={{ asset('storage/images_users/' . auth()->user()->image) }} alt="pfpuser" srcset="">
                </div>

                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                        <a href="" class="text-decoration-none text-black ">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">
                                    <li class="mx-3">
                                        <i class="fa-solid fa-arrow-right-from-bracket mx-1"></i>
                                        Logout
                                    </li>
                                </button>
                            </form>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
        {{-- PARTIE CANDIDAT --}}
        <div class="candidats_jury">
            <div class="candidat_aud_jury">

                <div class="img">
                    <img src="{{ asset('/storage/images_cand/' . $currentCandidat->photo) }}" alt=""
                        srcset="">
                </div>
                <p>N badge : {{ $currentCandidat->badge }}</p>
                <p>Name : {{ $currentCandidat->nom }}</p>
                <p>" {{ $currentCandidat->chanson }} "</p>

                @if (isset($votesParCandidat[$currentCandidat->id]))
                    <p>Nombre de votes : {{ $votesParCandidat[$currentCandidat->id] }}</p>
                @else
                    <p>Nombre de votes : 0</p>
                @endif

                <div class="navigations mt-2">
                    <div class="navigation">
                        <a href="{{ route('jury.index', ['candidatIndex' => $currentCandidatIndex - 1]) }}">
                            <i class="fa-solid fa-arrow-left"></i>
                        </a>
                    </div>
                    {{-- i need to add the form here for the vote function and send the current candidat id --}}
                    <div class="btn_vote">
                        <form action="{{route("jury.voterAud",$currentCandidat->id)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-lg py-0 px-5 text-white">Vote</button>
                        </form>
                    </div>

                    <div class="navigation">
                        <a href="{{ route('jury.index', ['candidatIndex' => $currentCandidatIndex + 1]) }}">
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>


</body>

</html>
