
@extends('layouts.app')

@section('content')
<div class="jumbotron">
        <h1 class="text-center display-4">Clubs</h1><br>
        @include('inc.button')<br>
        <div align="center">
                <a class="btn btn-primary text-white" href="/clubs/create">Create Club</a>
        </div>
</div>
<table class="table">
        <thead style="background-color:aqua;">
                <tr>
            
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Place</th>
                        <th scope="col">Image</th>
                        <th scope="col">Text</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                </tr>
        </thead>
        <tbody>
                
                        @foreach($club as $c)
                        <?php $string = $c->text;?>
                        <tr>

                                <td>{{$c->id}}</td>
                                <td>{{$c->name}}</td>
                                <td>{{$c->place}}</td>
                                <td>{{$c->image}}</td>
                                <td><?php echo str_limit($string, 30) ?></td><br>
                                <td><a class="btn btn-info" href="/clubs/{{$c->id}}/edit">Edit</td>
                                <td>    {!! Form::open(['action' => ['ClubController@destroy', $c->id],'method'=>'POST']) !!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                        {!! Form::close() !!}
                                </td>
                        </tr>
                        @endforeach
                
               
            
      </tbody>
</table>
<br><a class="btn btn-secondary text-white float-right" href="/admin">Back</a>
@endsection