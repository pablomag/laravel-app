@extends('layouts.index')

@section('content')

    <h1>User Edit</h1>

    <div style="display: inline-block; float: left;">
        <img src="{{$user->getPhoto ? $user->getPhoto->file : '/images/default.jpg'}}"
             style="line-height: 150px; border-radius: 60px; height: 120px; width: 120px;">
    </div>

    <div style="width: 400px; margin: auto;">
        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password_confirmation', 'Confirm password:') !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('role_id', 'Role:') !!}
            {!! Form::select('role_id', [0 => 'Select a role'] + $roles, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('is_active', 'Status:') !!}
            {!! Form::select('is_active', [0 => 'Inactive', 1 => 'Active'], null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('file', 'Photo:') !!}
            {!! Form::file('file', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group" style="display: inline-block; float: right;">
            {!! Form::submit('Save data', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

        {!! Form::model($user, ['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}

        <div class="form-group" style="display: inline-block; float: left;">
            {!! Form::submit('Delete user', ['class' => 'btn btn-danger']) !!}
        </div>

        {!! Form::close() !!}

        <div style="clear: both;"><br/>@include('includes.errors')</div>
    </div>

    <div style="clear: both;"><br/></div>
@endsection