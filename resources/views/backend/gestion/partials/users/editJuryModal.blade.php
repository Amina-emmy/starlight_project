<!-- Button trigger modal -->
<button type="button" class="btn btn-tablejury" data-bs-toggle="modal" data-bs-target="#editjury{{ $jury->id }}">
    <i class="fa-solid fa-user-pen" style="color: #5c2452;"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="editjury{{ $jury->id }}" tabindex="-1" aria-labelledby="editjury{{ $jury->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-black" id="editjury{{ $jury->id }}Label">"{{$jury->name}}" informations</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action={{route("admin.updateJury",$jury->id)}} method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-column ">
                        <div class="d-flex justify-content-center py-2">
                            <img src={{asset("storage/images_users/".$jury->image)}} class="rounded-circle" width="120" alt="">
                        </div>
                        <div class="py-2">
                            <label for="image">Image :</label>
                            <input type="file" name="image" class="form-control mt-1">
                        </div>
                        <div class="py-2">
                            <label for="name">Name :</label>
                            <input type="text" name="name" class="form-control mt-1" value="{{$jury->name}}">
                        </div>
                        <div class="py-2">
                            <label for="email">Email :</label>
                            <input type="text" name="email" class="form-control mt-1" value="{{$jury->email}}">
                        </div>
                    </div>
                    <div class="mt-4 d-flex gap-2 justify-content-end">
                        <button type="submit" class="btn btn-btnjury">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
