<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FiguredBlog Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/clean-blog.min.css') }}" rel="stylesheet">

  </head>
  <body>
  	@include('nav_admin')
  	@yield('content')
  	<hr>
    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{asset('js/clean-blog.min.js')}}"></script>
  </body>

</html>