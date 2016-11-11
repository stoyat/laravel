@extends('layouts.main')

@section('title', 'Book')

@section('content')

    <h3>Book info</h3>
    <ul class="list-group">
        <li class="list-group-item">{{ $book->title }}</li>
        <li class="list-group-item">{{ $book->author }}</li>
        <li class="list-group-item">{{ $book->year }}</li>
        <li class="list-group-item">{{ $book->genre }}</li>
    </ul>

    <a href="{{ $book->id }}/users" class="btn btn-danger" role="button">Show assigned users</a>
    <br><br>
    <a href="{{ $book->id }}/edit" class="btn btn-danger" role="button">Edit</a>
    <br><br>
    {!! Form::open(array('url' => "book/$book->id", 'method' => 'delete')) !!}
    {!! Form::submit('Delete', ['class' => "btn btn-danger"]) !!}
    {!! Form::close() !!}

@endsection