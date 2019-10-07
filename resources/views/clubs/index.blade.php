@extends('layouts.app')

@section('content')
<div style="background-color: white !important;">
<br><br><h1 class="display-3 text-center"><em>Clubs</em></h1><br>
    @if(count($club) > 0)
        @foreach ($club as $clubs)
            <table align="center">
                <th>
                    <a href="/clubs/{{$clubs->id}}"><img src="/storage/image/{{$clubs->image}}" height="250" width="300" alt="grb"></a><br><br>
                </th>
            </table>
           
        @endforeach
    @endif
    </div>            
@endsection