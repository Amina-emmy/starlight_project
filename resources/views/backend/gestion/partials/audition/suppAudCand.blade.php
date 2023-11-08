{{-- SUPPRIMER AUD CANDIDAT --}}
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#suppaudcand{{ $aud_candidat->id }}">
    <i class="fa-solid fa-trash text-white"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="suppaudcand{{ $aud_candidat->id }}" tabindex="-1"
    aria-labelledby="suppaudcand{{ $aud_candidat->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('destroy.audCandidat', $aud_candidat->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="d-flex flex-column align-items-center py-3">
                        <div>
                            <img src="/storage/logo/iconSupp.webp" width="90" alt="warning_icon">
                        </div>
                        <div class="mt-3">
                            <h5>Êtes-vous sûr de vouloir supprimer cet Candidat ?</h5>
                        </div>
                        <div class="mt-4">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
