@extends('layouts.index')

@section('content')

    <h1>Users Create</h1>

    <div style="width: 400px; margin: auto;">
        {!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store', 'files' => true]) !!}

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
            {!! Form::select('is_active', [0 => 'Inactive', 1 => 'Active'], 0, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('file', 'Photo:') !!}
            {!! Form::file('file', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group" style="display: inline-block; float: right;">
            {!! Form::submit('Create user', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

        <div style="clear: both;"><br/>@include('includes.errors')</div>
    </div>

    <div style="clear: both;"><br/></div>
@endsection