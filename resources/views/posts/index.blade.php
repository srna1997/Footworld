@extends('layouts.app')

@section('content')
<br><br>
    <h1 class="display-2 text-center">Posts</h1><hr>
    @if(count($posts) > 0)
        @foreach ($posts as $post)
            <div class="card p-3">
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <small>Written on: {{$post->created_at}} by {{$post->user->username}}</small>
            </div>
                
        @endforeach
        <br><br><br>
            <a class="btn btn-info float-right text-white" href="/posts/create">Create Post</a>
            {{$posts->links()}}
    @else 
        <p>No posts</p>
        <a class="btn btn-info float-right text-white" href="/posts/create">Create Post</a>
    @endif
@endsection