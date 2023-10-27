{{-- JURYS TABLE --}}
<table class="table rounded-3 overflow-hidden">
    <thead class="table-tablejury">
        <tr>
            <th scope="col" class="px-4">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($jurys as $jury)
            <tr valign="middle">
                <th scope="row" class="px-4">{{ $loop->iteration }}</th>
                <td>
                    <img src="{{ asset('storage/images_users/'.$jury->image) }}" class="rounded-circle" width="70" alt="jury avatar">
                </td>
                <td>{{ $jury->name }}</td>
                <td>{{ $jury->email }}</td>
                <td>
                    @include('backend.gestion.partials.users.editJuryModal')
                </td>
            </tr>
        @endforeach
    </tbody>
</table>