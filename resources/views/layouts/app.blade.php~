<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'No Title') - Laravel Album</title>

    <!-- ?? CSS -->
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>

    <!-- bootstrap ??? -->
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO ?????? -->
          <a class="navbar-brand" href="{{ route('home') }}">Laravel Album</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <!-- ???? ?????? -->
            <!-- <li><a href="#">Link</a></li> -->
          </ul>
        </div>
      </div>
    </nav>

    <!-- bootstrap ?? -->
    <div class="container">
        <!-- ?????? -->
        @include('shared.messages')
        <!-- ?????? -->
        @yield('content')
    </div>

    <!-- ?? CSS -->
    <script src="/js/app.js"></script>
    @yield('script')
</body>
</html>                   

