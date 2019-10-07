@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header text-center">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(auth()->user()->role == 'Admin')
                    <div align="center">
                            <a href="/admin" class="btn btn-info">Admin</a>
                            <hr>
                    </div>
                    @elseif(auth()->user()->role == 'Moderator')
                    <div align="center">
                            <a href="/admin" class="btn btn-info">Moderator</a>
                            <hr>
                    </div>
                    @endif
                    <div align="center">
                        <a href="/posts/create" class="btn btn-info">Create Post</a>
                    </div>
                    <br><br>
                    <div align="center">
                        <h3>Your Blog Posts</h3>
                    </div>
                    @if (count($posts)>0)
                
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>   
                        </tr>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></td>
                                <td>
                                    {!! Form::open(['action' => ['PostsController@destroy', $post->id],'method'=>'POST']) !!}  
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete',['class' => 'btn btn-danger move-right'])}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                    </table>
                    @else 
                    <p align="center"> You have no posts!</p>
                    <div style="padding:20%";></div>
                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
