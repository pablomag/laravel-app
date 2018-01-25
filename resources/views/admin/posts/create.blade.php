@extends('layouts.index')

@section('content')

    <h1>Post Create</h1>

    <div style="width: 400px; margin: auto;">
        {!! Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store', 'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('content', 'Content:') !!}
            {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => 3]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Category:') !!}
            {!! Form::select('category_id', [0 => 'Select a category'] + $categories, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('file', 'Photo:') !!}
            {!! Form::file('file', null) !!}
        </div>

        <div class="form-group" style="display: inline-block; float: right;">
            {!! Form::submit('Create post', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

        <div style="clear: both;"><br/>@include('includes.errors')</div>
    </div>

    <div style="clear: both;"><br/></div>
@endsection