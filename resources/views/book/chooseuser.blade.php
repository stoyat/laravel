@extends('layouts.main')

@section('title', 'Users to assign to')

@section('content')
    <h3>List of available users</h3>

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
        @foreach ($usersToChoose as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->firstname }}</td>
                <td>{{ $user->lastname }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    {!! Form::open(array('url' => "book/$book->id/user")) !!}
                    {!! Form::hidden('user_id', $user->id) !!}
                    {!! Form::submit('Assign', ['class' => "btn btn-danger"]) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection