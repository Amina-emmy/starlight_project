@include('layouts.index_admin')

<div class="main-content">
    <div class="contenir">
        <div class="header-title">
            <h4>Audition: <span class="text-tablejury">prime {{ $episode }}</span> </h4>
        </div>

        {{-- prime --}}
        <ul class="prime">
            <li><a href="{{ route('candidats.by.episode', 1) }}">Prime1</a></li>
            <li><a href="{{ route('candidats.by.episode', 2) }}">Prime2</a></li>
            <li><a href="{{ route('candidats.by.episode', 3) }}">Prime3</a></li>
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
        @if ($currentCandidat)
            <div class="div1">
                <div class="nombre">
                    {{-- THAT SHOULD BE MODIFIED TO COLLECT ONLY LES CANDIDATS QU'ONT SAME PRIME --}}
                    <h4>
                        {{ $currentCandidat->episode->prime }}/{{ count($episodes) }}
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
                        {{ $currentCandidat->id }}/{{ count($candidats) }}
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
            {{-- VOTES COUNT --}}
            <div class="div4">
                <div class="nombre">
                    <h4>
                        {{ $votesParCandidat[$currentCandidat->id] }}/5
                    </h4>
                    <p>Votes</p>
                </div>
                <div class="icone">
                    <i class="fa-solid fa-star"></i>
                </div>
            </div>
        @endif

    </div>


    {{-- LES CANDIDATS --}}
    <div class="candidats">

        {{-- LES INFOS DE CANDIDATS --}}
        <div class="info">
            @if ($currentCandidat)
                <div class="navigation">
                    <a
                        href="{{ route('candidats.by.episode', ['episode' => $episode, 'candidatIndex' => $currentCandidatIndex - 1]) }}">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                </div>
                <div class="img">
                    <img src="{{ asset('/storage/images_cand/' . $currentCandidat->photo) }}" alt=""
                        srcset="">
                </div>
                <p>N badge : {{ $currentCandidat->badge }}</p>
                <p>Name : {{ $currentCandidat->nom }} {{ $currentCandidat->prenom }}</p>
                <p>"{{ $currentCandidat->chanson }}"</p>
                <div class="navigation">
                    <a
                        href="{{ route('candidats.by.episode', ['episode' => $episode, 'candidatIndex' => $currentCandidatIndex - 1]) }}">
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            @else
                <p class="fs-5">Aucun candidat trouvé.</p>
            @endif
        </div>
    </div>

    {{-- Les jurys --}}
    <div class="jurys">
        @foreach ($jurys as $jury)
            <div class="jury">
                <img src="{{ asset('storage/images_users/' . $jury->image) }}" alt="" srcset="">
                <h4>{{ $jury->name }}</h4>
                <div class="vote">
                    @if (count($aud_votes) > 0)
                        @foreach ($aud_votes as $aud_vote)
                            @if ($currentCandidat)
                                @if (
                                    $aud_vote->aud_candidat_id == $currentCandidat->id &&
                                        $aud_vote->aud_candidat->episode_id == $currentCandidat->episode_id)
                                    @switch($jury->id)
                                        @case(2)
                                            @if ($aud_vote->vote_jury1 == false)
                                                <button> Vote 0</button>
                                            @else
                                                <button class="btnvote1"> Vote 1</button>
                                            @endif
                                        @break

                                        @case(3)
                                            @if ($aud_vote->vote_jury2 == false)
                                                <button> Vote 0</button>
                                            @else
                                                <button class="btnvote1"> Vote 1</button>
                                            @endif
                                        @break

                                        @case(4)
                                            @if ($aud_vote->vote_jury3 == false)
                                                <button> Vote 0</button>
                                            @else
                                                <button class="btnvote1"> Vote 1</button>
                                            @endif
                                        @break

                                        @case(5)
                                            @if ($aud_vote->vote_jury4 == false)
                                                <button> Vote 0</button>
                                            @else
                                                <button class="btnvote1"> Vote 1</button>
                                            @endif
                                        @break

                                        @case(6)
                                            @if ($aud_vote->vote_jury5 == false)
                                                <button> Vote 0</button>
                                            @else
                                                <button class="btnvote1"> Vote 1</button>
                                            @endif
                                        @break
                                    @endswitch
                                @endif
                            @endif
                        @endforeach
                    @else
                        <button> Vote 0</button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
