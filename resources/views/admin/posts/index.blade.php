@extends('layouts.index')

@section('content')

    <h1>Posts</h1>

    @if(Session::has('flash_message'))
        <div class="bg-success">{{session('flash_message')}}</div>
    @endif

    @if($posts)
    <ul>
        @foreach($posts as $post)
        <li>
            <a href="{{route('admin.posts.edit', $post->id)}}">
                <img src="{{$post->getPhoto ? $post->getPhoto->file : '/images/default_post.jpg'}}"
                     style="line-height: 50px; height: 50px; width: 50px; display: inline-block;">
                <strong>{{ $post->title }}</strong>:
                <div style="line-height: 50px; display: inline-block;">{{ $post->content }}</div>
                <div style="line-height: 50px; display: inline-block;">
                    <span style="font-size: 12px; color: #999;">
                        Posted by
                        <span style="color: black;">({{ $post->getUser->name }}) @ {{ $post->getUser->email }}</span>
                        {{ $post->created_at->diffForHumans() }}
                    </span>
                </div>
            </a>
            <span class="clearfix"></span>
        </li>
        @endforeach
    </ul>
    @endif

    <div style="clear: both;"><br/></div>
@endsection