{{-- EPISODES TABLE --}}
<table class="table rounded-3 overflow-hidden">
    <thead class="table-tablejury">
        <tr>
            <th scope="col" class="px-4">Date</th>
            <th scope="col">Prime</th>
            <th scope="col">Category</th>
            <th scope="col">Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($episodes as $episode)
            <tr valign="middle">
                <th scope="row" class="px-4">{{date('d.m.Y',strtotime($episode->day))}}</th>
                <td>{{ $episode->prime }}</td>
                <td>{{ $episode->category }}</td>
                <td>
                    @include('backend.gestion.partials.episodes.editModal')
                </td>
                <td>
                    @include('backend.gestion.partials.episodes.suppModal')
                </td>
            </tr>
        @endforeach
    </tbody>
</table>