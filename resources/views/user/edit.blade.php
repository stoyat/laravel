@extends('layouts.main')

@section('title', 'Edit user')

@section('content')

    

    {!! Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'put')) !!}
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
    {!! Form::submit('Edit', ['class' => "btn btn-default"]) !!}
    {!! Form::close() !!}

@endsection