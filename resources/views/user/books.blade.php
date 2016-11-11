@extends('layouts.main')

@section('title', 'User\'s books')

@section('content')
    <h3>List of my books</h3>

    <a href="{{ route('choose', ['id' => $user->id]) }}" class="btn btn-info" role="button">Take new book</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
            <th>Genre</th>
            <th>Action</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($user->books()->get() as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->genre }}</td>
                <td>
                    <a href="/book/{{ $book->id }}" class="btn btn-info" role="button">Show</a>
                </td>
                <td>
                    {!! Form::open(array('url' => "user/$user->id/book/$book->id", 'method' => 'delete')) !!}
                    {!! Form::submit('Return to library', ['class' => "btn btn-info"]) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection