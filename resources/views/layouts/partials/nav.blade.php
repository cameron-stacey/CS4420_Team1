<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{ config('app.name', 'Trail Buddy') }}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="{{ asset('css/tb.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>

<nav class="navbar navbar-tbuddy navbar-fixed-top">
  <div class="container-fluid">
    @guest
    <div class="navbar-header">
      <a class="navbar-brand" href="/">Welcome</a>
    </div>
    @else
    <div class="navbar-header">
      <a class="navbar-brand" href="/">{{ config('app.name', 'Trail Buddy') }}</a>
    </div>
    @endguest
    <ul class="nav navbar-nav navbar-right">
      <!-- Authenticate Links -->
      @guest
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
      </li>
      <li class="nav-item">
        @if (Route::has('register'))
        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        @endif
      </li>
      @else
      <li><a href="/home">{{ Auth::user()->name }}</a></li>
      <li><a href="/trails">Trails</a></li>
      <form class="navbar-form navbar-right" action="/under_construction">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search" name="search">
          <div class ="input-group-btn">
            <button class="btn btn-default" type="submit">
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </div>
        </div>
      </form>
      @endguest
    </ul>
  </div>
</nav>
</body>
</html>

