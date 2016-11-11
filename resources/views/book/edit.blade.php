@extends('layouts.main')

@section('title', 'Edit book')

@section('content')

    

    {!! Form::model($book, array('route' => array('book.update', $book->id), 'method' => 'put')) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', Input::old('title')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('author', 'Author') !!}
        {!! Form::text('author', Input::old('author')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('year', 'Year') !!}
        {!! Form::text('year', Input::old('year')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('genre', 'Genre') !!}
        {!! Form::text('genre', Input::old('genre')) !!}
    </div>
    {!! Form::submit('Edit', ['class' => "btn btn-danger"]) !!}
    {!! Form::close() !!}

@endsection