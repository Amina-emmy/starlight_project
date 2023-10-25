{{-- JURYS TABLE --}}
<table class="table rounded-3 overflow-hidden">
    <thead class="table-tablejury">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th></th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($jurys as $jury)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>
                    <img src="{{ asset('storage/images_users/' . $jury->image) }}" width="50" alt="jury avatar">
                </td>
                <td>{{ $jury->name }}</td>
                <td>{{ $jury->email }}</td>
                <td>edit</td>
            </tr>
        @endforeach
    </tbody>
</table>