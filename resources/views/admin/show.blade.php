@extends('layouts.app')

@section('content')
<div class="jumbotron">
        <h1 class="text-center display-4">Users</h1><br>
        @include('inc.button')
</div>
<table class="table">
        <thead style="background-color:aqua;">
                <tr>
            
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Favorite club</th>
                        <th scope="col">Role</th>
                        <th scope="col">Delete</th>
                        
                </tr>
        </thead>
        <tbody>
                
                @foreach($data as $d)
                <tr>
                        <td>{{$d->id}}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->username}}</td>
                        <td>{{$d->email}}</td>
                        <td>{{$d->favorite_club}}</td>  
                        <td>
                                @if($d->id != 1)
                                        {{ Form::open(['action' => ['AdminController@update',$d->id],'method'=>'POST']) }}
                                                <select name="role" class="form-control" onchange="this.form.submit()">
                                                <option selected>{{ $d->role}}</option>
                                                @foreach($roles as $r)
                                                        <option value="{{$r->role}}">{{$r->role}}</option>        
                                                @endforeach
                                                </select>
                                        {{ Form::close() }}
                                @endif
                        </td>
                        <td> 
                                @if($d->id != 1)
                                        {!! Form::open(['action' => ['AdminController@destroy', $d->id],'method'=>'POST']) !!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                        {!! Form::close() !!}
                                @endif
                        </td>
                                
                </tr>
                @endforeach
        </tbody>
</table>

<br><a class="btn btn-secondary text-white float-right" href="/admin">Back</a>
@endsection