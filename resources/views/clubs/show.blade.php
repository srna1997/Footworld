@extends('layouts.app')

@section('content')
<div align = "center" style="background-color: white !important;">
    <br>
    <img src = "/storage/image/{{$club->image}}" height="250" width="300" alt="grb"><br><br>
    <p><b><em>{{$club->text}}</em></b></p>
    <br>
    <h2>Lista igrača</h2>
    <table class="table table-hover" style="max-width:70%">
        <thead class="thead-light">
          <tr>
            <div class="row justify-content-md-center">
              <th scope="col">Ime i prezime</th>
              <th scope="col">Godine</th>   
            </div>
          </tr>
        </thead>
        @foreach($club->player as $player)
        <tbody>
          <tr style="cursor: pointer;" onclick="window.location='/clubs/player/{{$player->id}}'">
      
              <td><i><strong>{!!$player->fname!!} {!!$player->lname!!}</strong></i></td>
              <td><i><strong>{!!$player->age!!}</strong></i></td>
             
          </tr>
          
      </tbody> 
      @endforeach
      
      </table>
</div>
@endsection