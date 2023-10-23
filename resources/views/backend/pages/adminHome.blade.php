@extends('our_layouts.index')
@section('content')
    <h1>admin home</h1>
    {{-- JURYS TABLE --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
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

    {{-- PUBLIC TABLE --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($publics as $public)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <img src="{{ asset('storage/images_users/' . $public->image) }}" width="50" alt="public avatar">
                    </td>
                    <td>{{ $public->name }}</td>
                    <td>{{ $public->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
