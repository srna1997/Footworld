@extends('layouts.app')

@section('content')
<ul class="list-group">
        <br><br>
    <li class="list-group-item">
        <h1 class="text-center display-4"><em>Add Comment</em></h1><br><br>
    </li>
    <li class="list-group">
    	{{ Form::open(['action' => ['CommentController@store', $post->id] ,'method' => 'POST']) }}
        @csrf 			
            <div class="row">
                <div class="col-md-12">
                    <li class="list-group-item">
                        {{ Form::hidden('post_id',$post->id)}}
                        <strong><em>{{ Form::label('comment', "Comment:") }}</em></strong>
                        {{ Form::textarea('content', null, ['id'=>'article-ckeditor','class' => 'form-control']) }} 
                    </li>    
                    <li class="list-group-item">
                            <br>{{ Form::submit('Add Comment', ['class' => 'btn btn-primary']) }}
                            <a class="btn btn-danger float-right" href="/posts">Back</a><br><br><br>
                    </li>    
                </div>
            </div>
        {{ Form::close() }}
    </li>    
@endsection


