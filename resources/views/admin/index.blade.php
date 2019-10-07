@extends('layouts.app')

@section('content')

<div class="jumbotron">
<h1 class="text-center display-2"><em>Welcome {{$user}}</em></h1>

<br><br>
@include('inc.button')
</div>
<br><br><br><br><br><br>
@endsection