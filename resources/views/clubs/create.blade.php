@extends('layouts.app')

@section('content')

<br><br><h1 class="text-center display-2"><em>Create Club</em></h1>

<br>
{{ Form::open(['action' => 'ClubController@store','method'=>'POST', 'enctype' => 'multipart/form-data']) }}
<div class="form-group">
    {{Form::label('name','Name')}}
    {{Form::text('name','',['class'=>'form-control','placeholder' =>'name'])}}
</div>
<div class="form-group">
    {{Form::label('place','Place')}}
    {{Form::text('place','',['class'=>'form-control','placeholder' =>'place'])}}
</div>
<div class="form-group">
    {{Form::file('image')}}
</div>
<div class="form-group">
        {{Form::label('text','About')}}
        {{Form::textarea('text','',['id'=>'article-ckeditor','class'=>'form-control','placeholder' =>'About club'])}}
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{{ Form::close() }}

@endsection