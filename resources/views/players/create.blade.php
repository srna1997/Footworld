@extends('layouts.app')

@section('content')

<br><br><h1 class="text-center display-2"><em>Create Player</em></h1>

<br>
{{ Form::open(['action' => 'PlayersController@store','method'=>'POST', 'enctype' => 'multipart/form-data']) }}
<div class="form-group">
    {{Form::label('fname','First name')}}
    {{Form::text('fname','',['class'=>'form-control','placeholder' =>'First name'])}}
</div>
<div class="form-group">
    {{Form::label('lname','Lirst name')}}
    {{Form::text('lname','',['class'=>'form-control','placeholder' =>'Last name'])}}
</div>
<div class="form-group">
    {{Form::label('age','Age')}}
    {{Form::text('age','',['class'=>'form-control','placeholder' =>'Age'])}}
</div>
<div class="form-group">
    {{Form::label('country','Country')}}
    {{Form::text('country','',['class'=>'form-control','placeholder' =>'Country'])}}
</div>
<div class="form-group">
    {{Form::label('position','Position')}}
    {{Form::text('position','',['class'=>'form-control','placeholder' =>'Position'])}}
</div>
<div class="form-group">
    {{Form::file('image')}}
</div>
<br>
<select name="club_id" class="form-control">      
    @foreach($club as $p)         
        <option value="{{$p->id}}">{{$p->name}} </option>
    @endforeach
</select>
<br>
<div class="form-group">
        {{Form::label('text','About')}}
        {{Form::textarea('text','',['id'=>'article-ckeditor','class'=>'form-control','placeholder' =>'About player'])}}
    </div>
    {{Form::hidden('_method','POST')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{{ Form::close() }}

@endsection