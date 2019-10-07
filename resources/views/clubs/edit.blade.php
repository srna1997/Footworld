@extends('layouts.app')

@section('content')

<br><br><h1 class="text-center display-2"><em>Edit Club</em></h1>

<br>
{{ Form::open(['action' => ['ClubController@update',$club->id],'method'=>'POST', 'enctype' => 'multipart/form-data']) }}
<div class="form-group">
    {{Form::label('name','Name')}}
    {{Form::text('name',$club->name,['class'=>'form-control','placeholder' =>'name'])}}
</div>
<div class="form-group">
    {{Form::label('place','Place')}}
    {{Form::text('place',$club->place,['class'=>'form-control','placeholder' =>'place'])}}
</div>
<div class="form-group">
    {{Form::file('image')}}
</div>
<div class="form-group">
        {{Form::label('text','About')}}
        {{Form::textarea('text',$club->text,['id'=>'article-ckeditor','class'=>'form-control','placeholder' =>'About club'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{{ Form::close() }}

@endsection