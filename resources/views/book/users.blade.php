@extends('layouts.main')

@section('title', 'Users who own book')

@section('content')
    <h3>List of users who read book</h3>

    <a href="{{ route('assign', ['id' => $book->id]) }}" class="btn btn-danger" role="button">Assign to new user</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Action</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($book->users()->get() as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->firstname }}</td>
                <td>{{ $user->lastname }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="/user/{{ $user->id }}" class="btn btn-danger" role="button">Show</a>
                </td>
                <td>
                    {!! Form::open(array('url' => "book/$book->id/user/$user->id", 'method' => 'delete')) !!}
                    {!! Form::submit('Unassign User', ['class' => "btn btn-danger"]) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection