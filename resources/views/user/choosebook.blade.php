@extends('layouts.main')

@section('title', 'Books to choose')

@section('content')
    <h3>List of available books</h3>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
            <th>Genre</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($booksToChoose as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->genre }}</td>
                <td>
                    {!! Form::open(array('url' => "user/$user->id/book")) !!}
                    {!! Form::hidden('book_id', $book->id) !!}
                    {!! Form::submit('Take', ['class' => "btn btn-info"]) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection