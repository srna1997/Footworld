<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
    
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
</head>
<body>
    
        @include('inc.navbar')
        <img id="bb" src="/storage/image/fw.jpg" alt="footworld" class="img-responsive slideanim" width="100%">
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
      <script>
          CKEDITOR.replace( 'article-ckeditor' );
      </script>
     @include('inc.footer')
</body>
</html>
