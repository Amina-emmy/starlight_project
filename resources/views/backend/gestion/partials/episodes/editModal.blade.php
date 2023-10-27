{{-- EDIT MODAL POUR EPISODES --}}
<!-- Button trigger modal -->
<button type="button" class="btn btn-tablejury" data-bs-toggle="modal" data-bs-target="#editModal{{ $episode->id }}">
    <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
</button>

<!-- Modal UPDATE -->
<div class="modal fade" id="editModal{{ $episode->id }}" tabindex="-1" aria-labelledby="editModal{{ $episode->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-black" id="exampleModalLabel">Episode Prime : {{ $episode->prime }} </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.updateEp', $episode->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <div class="py-2">
                            <label for="day">Day:</label>
                            <input type="date" name="day" class="form-control" value="{{ $episode->day }}">
                        </div>
                        @if ($loop->iteration > 9)
                        {{-- Pour Ne pas modifier Que la date des Primes de base --}}
                            <div class="py-2">
                                <label for="prime">Prime:</label>
                                <input type="number" name="prime" class="form-control" min="1"
                                    value="{{ $episode->prime }}">
                            </div>
                            <div class="py-2">
                                <label for="category">Category:</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="Aud" {{ $episode->category === 'Aud' ? 'selected' : '' }}>
                                        Audition</option>
                                    <option value="FaF" {{ $episode->category === 'FaF' ? 'selected' : '' }}>
                                        FAF</option>
                                    <option value="UFaF" {{ $episode->category === 'UFaF' ? 'selected' : '' }}>
                                        Ultime FAF</option>
                                    <option value="demiFinale"
                                        {{ $episode->category === 'demiFinale' ? 'selected' : '' }}>
                                        Demi Finale</option>
                                    <option value="Finale" {{ $episode->category === 'Finale' ? 'selected' : '' }}>
                                        Finale
                                    </option>
                                </select>
                            </div>
                        @endif
                    </div>
                    <div class="mt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-tablejury">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Fin modal --}}
