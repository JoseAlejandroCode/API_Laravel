<!DOCTYPE html>
<html data-whatinput="initial" data-whatintent="mouse" class=" whatinput-types-initial"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <title>Landon Hotel App</title>
            <link rel="icon" type="image/x-icon" href="favicon.ico" />
            
            <link rel="stylesheet" href="{{ asset('css/foundation.css') }}">
            <link rel="stylesheet" href="{{ asset('css/foundation.css') }}">
            <link rel="stylesheet" href="{{ asset('css/app.css') }}">
            <link rel="stylesheet" href="{{ asset('pickadate/lib/themes/default.css') }}">
            <link rel="stylesheet" href="{{ asset('pickadate/lib/themes/default.date.css') }}">
    <meta class="foundation-mq"></head>
    <body>

        <!-- Start Top Bar -->
    <div class="top-bar">
      <div class="row">
        <div class="top-bar-left">
          <ul class="dropdown menu" data-dropdown-menu="49qhhm-dropdown-menu" role="menubar">
            <li role="menuitem"><a href="{{ route('home') }}">Home</a></li>
            <li role="menuitem"><a href="{{ route('clients') }}">Clients</a></li>
          </ul>
        </div>
        <div class="top-bar-right">
          <ul class="dropdown menu" data-dropdown-menu="49qhhm-dropdown-menu" role="menubar">
            <li role="menuitem">
              @if (Auth::guest())
              <a href="{{ route('login') }}">Login</a>
              @else
              <a  href="{{ route('logout') }}"
                  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  Logout
              </a>
              @endif
          </li>
          </ul>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
        </div>
      </div>
    </div>
    <!-- End Top Bar -->

    <br>
    
    @yield('content')
    
    

    

    <div class="row column">
      <hr>
      <ul class="menu">
        <li class="float-right">Copyright 2017</li>
      </ul>
    </div>

    

        <script src="{{ asset('js/vendor/jquery.js') }}"></script>
        <script src="{{ asset('js/vendor/what-input.js') }}"></script>
        <script src="{{ asset('js/vendor/foundation.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('pickadate/lib/picker.js') }}"></script>
        <script src="{{ asset('pickadate/lib/picker.date.js') }}"></script>
        <script>
        $(document).foundation();
        </script>
        <script>
            $('.datepicker').pickadate(
              { 
                format: 'yyyy-mm-dd',
                formatSubmit: 'yyyy-mm-dd' 
              }
              );
        </script>

    </body>
</html>