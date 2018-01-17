@extends('admin/index')

@section('content')

    <h1>Users Index</h1>

    @if($users)
    <ul>
        @foreach($users as $user)
        <a href="{{route('admin.users.edit', $user->id)}}">
            <img src="{{$user->getPhoto ? $user->getPhoto->file : '/images/default.jpg'}}"
                 style="line-height: 50px; border-radius: 20px; height: 40px; width: 40px; display: inline-block;">
            <li style="line-height: 50px; color: {{ $user->is_active == 1 ? 'black' : 'red' }}; display: inline-block;">
                <strong>{{ $user->name }}</strong>
                ({{ $user->getRole->name }}) @ {{ $user->email }}<span style="font-size: 12px; color: #ccc;">
                    {{ $user->created_at->diffForHumans() }}</span></li>
            <span class="clearfix"></span>
        </a>
        @endforeach
    </ul>
    @endif

@endsection