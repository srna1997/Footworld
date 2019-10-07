@extends('layouts.app')

@section('content')
<br>
<h1>Change Role</h1>

{{ Form::open(['action' => ['AdminController@update',$user->id],'method'=>'POST']) }}     
<div class="form-group">
    <label>Role: </label>
<input type="text" name="role" class="form-control" value="{{$user->role}}"><br>
</div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{{ Form::close() }}


@endsection

