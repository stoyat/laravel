@extends('layouts.main')

@section('title', 'Books page')

@section('content')
    <h3>List of books
        <a href="book/create" class="btn btn-danger" role="button">Add new book</a>
    </h3>

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
        @foreach ($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->year }}</td>
            <td>{{ $book->genre }}</td>
            <td>
                <a href="book/{{ $book->id }}" class="btn btn-danger" role="button">Show</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <p class="pagination">{{ $books->links() }}</p>

@endsection