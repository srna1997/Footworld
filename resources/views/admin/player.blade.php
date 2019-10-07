@extends('layouts.app')

@section('content')

<div class="jumbotron">
        <h1 class="text-center display-4">Players</h1><br>
        @include('inc.button')<br>
        <div align="center">
                <a class="btn btn-primary text-white" href="/players/create">Create Player</a>
        </div>
</div>
<table class="table">
        <thead style="background-color:aqua;">
                <tr>
            
                        <th scope="col">Id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Country</th>
                        <th scope="col">Position</th>
                        <th scope="col">Club</th>
                        <th scope="col">Image</th>
                        <th scope="col">Text</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                </tr>
        </thead>
        <tbody>
                
                        @foreach($players as $player)
                        <?php $string = $player->text;?>
                        <?php $club = $player->club->name;?>
                        <tr>

                                <td>{{$player->id}}</td>
                                <td>{{$player->fname}}</td>
                                <td>{{$player->lname}}</td>
                                <td>{{$player->age}}</td>
                                <td>{{$player->country}}</td>
                                <td>{{$player->position}}</td>
                                <td>{{$club}}</td>
                                <td>{{$player->image}}</td>
                                <td><?php echo str_limit($string, 30) ?></td><br>
                                <td><a class="btn btn-info" href="/players/{{$player->id}}/edit">Edit</td>
                                <td>    {!! Form::open(['action' => ['PlayersController@destroy', $player->id],'method'=>'POST']) !!}
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