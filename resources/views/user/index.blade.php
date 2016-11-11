@extends('layouts.main')

@section('title', 'Library main page')

@section('content')
    <h3>List of users
        <a href="user/create" class="btn btn-info" role="button">Add new user</a>
    </h3>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->firstname }}</td>
            <td>{{ $user->lastname }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="user/{{ $user->id }}" class="btn btn-info" role="button">Show</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <p class="pagination">{{ $users->links() }}</p>

@endsection