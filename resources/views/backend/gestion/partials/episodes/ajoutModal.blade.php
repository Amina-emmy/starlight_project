{{-- AJOUT MODAL POUR EPISODES --}}
<!-- Button trigger modal -->
<button type="button" class="btn btn-lg btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add Episode
</button>
{{-- AJOUT --}}
<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-black" id="exampleModalLabel">Ajouter Episode :</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.storeEp') }}" method="POST">
                    @csrf
                    <div>
                        <div class="py-2">
                            <label for="day" name="day">Day:</label>
                            <input type="date" name="day" class="form-control">
                        </div>
                        <div class="py-2">
                            <label for="prime" name="prime">Prime:</label>
                            <input type="number" name="prime" min="1" class="form-control">
                        </div>
                        <div class="py-2">
                            <label for="category">Category:</label>
                            <select name="category" class="form-control">
                                <option value="Aud">Audition</option>
                                <option value="FaF">FAF</option>
                                <option value="UFaF">Ultime FAF</option>
                                <option value="demiFinale">Demi Finale</option>
                                <option value="Finale">Finale</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Fin modal --}}
