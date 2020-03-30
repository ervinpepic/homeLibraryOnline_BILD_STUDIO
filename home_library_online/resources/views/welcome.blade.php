<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Home Library</title>
  
  
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  
  <style>
    html, body {
      background-color: #fff;
      color: #636b6f;
      font-family: 'Nunito', sans-serif;
      font-weight: 200;
      height: 100vh;
      margin: 0;
    }
    
    .full-height {
      height: 100vh;
    }
    
    .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
    }
    
    .position-ref {
      position: relative;
    }
    
    .top-right {
      position: absolute;
      right: 10px;
      top: 18px;
    }
    
    .content {
      text-align: center;
    }
    
    .title {
      font-size: 84px;
    }
    
    .links > a {
      color: #636b6f;
      padding: 0 25px;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: .1rem;
      text-decoration: none;
      text-transform: uppercase;
    }
    
    .m-b-md {
      margin-bottom: 30px;
    }
  </style>

</head>
<body>
<div class="flex-center position-ref full-height">
  @if (Route::has('login'))
    <div class="top-right links">
      @auth
        <a href="{{ url('/home') }}">Home</a>
        <a href="{{route('book_list')}}">Books</a>
        @can('Librarian')
          <a href="{{route('book_create')}}">Enter new Book</a>
        @endcan
        @can('Librarian')
          <a href="{{route('admin_home')}}">Admin</a>
        @endcan
        <a href="{{ route('book_orders') }}">Your Orders</a>
        @can('Admin')
          <a href="{{route('admin_home')}}">Admin</a>
        @endcan
      @else
        <a href="{{ route('login') }}">Login</a>
        @if (Route::has('register'))
          <a href="{{ route('register') }}">Register</a>
        @endif
      @endauth
    </div>
  @endif
  
  <div class="content">
    
    <div class="title m-b-md">
      Welcome to the world of knowledge
    </div>
    
    
    @if (session()->has('message'))
      <div class="alert alert-info" role="alert">
        {{session('message')}}
      </div>
    @endif
  
  </div>
</div>
<div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
