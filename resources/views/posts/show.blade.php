@extends('layouts.app')

@section('content')   
<br><br>
<ul class="list-group">
    <li class="list-group-item">
        <h1 align="center" class="display-3"><em>{!!$post->title!!}</em></h1>    
    <small>Written on: {{$post->created_at}} by  {{$post->user->username}}</small>
    </li>
    <li class="list-group-item text-center">
        <br><h3><strong><em>{!!$post->body!!}</em></strong></h3>
    </li>
</ul>
        
<ul class="list-group">
    <li class="list-group-item">   
    <h1 class="text-center"><em>Comments</em> </h1>
    </li>
    @foreach ($post->comments as $comment)
        <div>
            <li class="list-group-item">
                    <strong><i>Username:</i></strong> <i>{!!$comment->user->username!!}</i>
            </li>
            <li class="list-group-item">
                    <strong>Comment:</i></strong><p><i> {!!$comment->content!!} </i></p> 
            </li>
            
            <li class="list-group-item">
                    @if ((Auth::user()->id == $post->user_id) || (Auth::user()->id == $comment->user_id) ||  (Auth::user()->role == 'Admin') || (auth()->user()->role == 'Moderator'))
                {!! Form::open(['action' => ['CommentController@destroy', $comment->id],'method'=>'POST']) !!}    
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class' => 'btn btn-danger move-right'])}}
                {!! Form::close() !!}
                @endif  
            </li>
        
            
        </div>
        
    @endforeach
        </ul>
    </div>
    <hr>
    @if (Auth::user()->id == $post->user_id || (auth()->user()->role == 'Admin') || (auth()->user()->role == 'Moderator'))
        {!! Form::open(['action' => ['PostsController@destroy', $post->id],'method'=>'POST']) !!}
            <div align="center">
            <a class="btn btn-info pull-left text-white" href="/posts/{{$post->id}}/edit">Edit</a>    
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete',['class' => 'btn btn-danger move-right'])}} 
            <a class="btn btn-info text-white" href="comment/{!!$post->id!!}"">Add comment</a>
            <a class="btn btn-danger pull-left" href="/posts">Back</a>
            @else   
            <div align="center">
            <a class="btn btn-info text-white" href="comment/{!!$post->id!!}"">Add comment</a>
            <a class="btn btn-danger pull-left" href="/posts">Back</a>
            </div>
        </div>
        {!! Form::close() !!}
    @endif
    <br>
    
</ul>
@endsection