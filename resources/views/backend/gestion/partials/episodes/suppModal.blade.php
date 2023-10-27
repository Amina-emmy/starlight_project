<!-- Button trigger modal -->
@if ($loop->iteration <= 9)
    {{-- Pour Ne Pas Supprimer les Episodes de base --}}
    <button type="button" disabled class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supp{{ $episode->id }}">
        <i class="fa-solid fa-calendar-xmark"></i>
    </button>
@else
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supp{{ $episode->id }}">
        <i class="fa-solid fa-calendar-xmark"></i>
    </button>
@endif

<!-- Modal -->
<div class="modal fade" id="supp{{ $episode->id }}" tabindex="-1" aria-labelledby="supp{{ $episode->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{route("admin.destroyEp",$episode->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="d-flex flex-column align-items-center py-3">
                        <div>
                            <img src="/storage/logo/iconSupp.webp" width="90" alt="warning_icon">
                        </div>
                        <div class="mt-3">
                            <h5>Êtes-vous sûr de vouloir supprimer cet élément ?</h5>
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
