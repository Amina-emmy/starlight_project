{{-- PUBLIC TABLE --}}
<table class="table rounded-3 overflow-hidden">
    <thead class="table-tablepub">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($publics as $public)
            <tr valign="middle">
                <th scope="row">{{ $loop->iteration }}</th>
                <td>
                    <img src="{{ asset('storage/images_users/' . $public->image) }}" width="40" alt="public avatar">
                </td>
                <td>{{ $public->name }}</td>
                <td>{{ $public->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>