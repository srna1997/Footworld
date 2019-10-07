@extends('layouts.page')
<style type="text/css">
        body { background: snow !important; }
        #col {background: snow !important;}

        .slideanim {
    animation-name: slide;
    -webkit-animation-name: slide;
    animation-duration: 3s;
    -webkit-animation-duration: 3s;
    visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
     </style>
@section('content')
<br>
@if (Auth::guest())
<div id="col" class="jumbotron text-center slideanim">
        
        <h1>Welcome to home page</h1>
        <p>Version 1.0. Need time!!</p>
        <p><a class="btn btn primary btn-lg" href="/login" role="button">Login</a><a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p> 
</div>
@else

<div id="col" class="jumbotron text-center slideanim">
        
        <h1>Welcome to home page</h1>
        <p>This is first Balkan blog for football please don't be rude!</p>
</div>
@endif
@endsection






  
