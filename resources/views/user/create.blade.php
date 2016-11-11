@extends('layouts.main')

@section('title', 'Add user')

@section('content')

    

    {!! Form::open(array('url' => 'user')) !!}
    <div class="form-group">
        {!! Form::label('firstname', 'Firstname') !!}
        {!! Form::text('firstname', Input::old('firstname')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('lastname', 'Lastname') !!}
        {!! Form::text('lastname', Input::old('lastname')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'E-Mail') !!}
        {!! Form::text('email', Input::old('email')) !!}
    </div>
    {!! Form::submit('Add', ['class' => "btn btn-default"]) !!}
    {!! Form::close() !!}

@endsection