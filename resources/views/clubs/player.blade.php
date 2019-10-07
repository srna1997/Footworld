@extends('layouts.app')

@section('content')


<br><br> 
    <ul align="center" class="list-group">
        <li class = "list-group-item">
            <h1 class="display-4 text-center"><em>{!!$player->fname!!} {!!$player->lname!!}</em></h1>
        </li> 
        <li class = "list-group-item">   
            <img src= "/storage/image/{!!$player->image!!}" height="400" width="380" alt="{!!$player->fname!!} {!!$player->lname!!}">
        </li> 
        <li class = "list-group-item">
            <h1 class="text-center"><em>Country: {!!$player->country!!}</em></h1>
        </li> 
        <li class = "list-group-item">
            <h1 class="text-center"><em>Country: {!!$player->age!!}</em></h1>
        </li> 
        <li class = "list-group-item">
            <h1 class="text-center"><em>Position: {!!$player->position!!}</em></h1>
        </li> 
        <li class = "list-group-item">
            <p class="text-center"><em><b>{!!$player->text!!}</b></em></p>
        </li> 
    </ul>

@endsection