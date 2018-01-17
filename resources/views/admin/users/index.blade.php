@extends('admin/index')

@section('content')

    <h1>Users Index</h1>

    @if($users)
    <ul>
        @foreach($users as $user)
            <li style="color: {{ $user->is_active == 1 ? 'black' : 'red' }}"><strong>{{ $user->name }}</strong> ({{ $user->getRole->name }}) @ {{ $user->email }}<span style="font-size: 12px; color: #ccc;"> {{ $user->created_at->diffForHumans() }}</span></li>
        @endforeach
    </ul>
    @endif

@endsection