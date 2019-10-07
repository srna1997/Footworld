@extends('layouts.app')

@section('content')

<br><br><h1 class="text-center display-2"><em>Edit Player</em></h1>

<br>
{{ Form::open(['action' => ['PlayersController@update',$player->id],'method'=>'POST', 'enctype' => 'multipart/form-data']) }}
<div class="form-group">
    {{Form::label('fname','First name')}}
    {{Form::text('fname',$player->fname,['class'=>'form-control','placeholder' =>'First name'])}}
</div>
<div class="form-group">
    {{Form::label('lname','Last name')}}
    {{Form::text('lname',$player->lname,['class'=>'form-control','placeholder' =>'Last name'])}}
</div>
<div class="form-group">
    {{Form::label('age','Age')}}
    {{Form::text('age',$player->age,['class'=>'form-control','placeholder' =>'Age'])}}
</div>
<div class="form-group">
    {{Form::label('country','Country')}}
    {{Form::text('country',$player->country,['class'=>'form-control','placeholder' =>'Country'])}}
</div>
<div class="form-group">
    {{Form::label('position','Position')}}
    {{Form::text('position',$player->position,['class'=>'form-control','placeholder' =>'Position'])}}
</div>
<div class="form-group">
    {{Form::file('image')}}
</div>
<br>
<select name="club_id" class="form-control">   
    <option selected>{{ $player->club->name}}</option>   
    @foreach($club as $c)
        <option value= "{{$c->id}}">{{$c->name}}</option>
   @endforeach
</select>
<br>
<div class="form-group">
        {{Form::label('text','About')}}
        {{Form::textarea('text',$player->text,['id'=>'article-ckeditor','class'=>'form-control','placeholder' =>'About player'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{{ Form::close() }}

@endsection