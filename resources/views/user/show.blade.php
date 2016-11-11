@extends('layouts.main')

@section('title', 'User')

@section('content')

    <h3>User profile</h3>
    <ul class="list-group">
        <li class="list-group-item">{{ $user->firstname }}</li>
        <li class="list-group-item">{{ $user->lastname }}</li>
        <li class="list-group-item">{{ $user->email }}</li>
    </ul>

    <a href="{{ $user->id }}/books" class="btn btn-info" role="button">Show my books</a>
    <br><br>
    <a href="{{ $user->id }}/edit" class="btn btn-info" role="button">Edit</a>
    <br><br>
    {!! Form::open(array('url' => "user/$user->id", 'method' => 'delete')) !!}
    {!! Form::submit('Delete', ['class' => "btn btn-info"]) !!}
    {!! Form::close() !!}

@endsection