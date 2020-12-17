<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <base href="{{asset('')}}">
    <title>DOAN2</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="site/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="site/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="site/css/style.min.css" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="{{asset('template')}}/assets/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

</head>

<body>
     <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="#" target="_blank">
            <strong class="blue-text">Engleco</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link waves-effect" href="/">Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect" href="{{route('homedocument')}}"
                    >Documents</a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect" href="{{route('chat')}}" >
                    Chat
                </a>
            </li>
          </ul>

          <!-- Right -->
            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item">
                    <a href="#" class="nav-link waves-effect" >
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link waves-effect" >
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="nav-item">
                    @if (Auth::check())
                        <div class="dropdown">
                            <button class="btn btn-secondary" 
                            style="
                                padding: 5px !important;
                                background: gray !important;
                                border-radius: 5% !important;
                            "
                            type="button" id="dropdownMenuButton" 
                            data-toggle="dropdown" aria-haspopup="true" 
                            aria-expanded="false">
                                <img src="documents/imageUser/default.png" width="20px" height="20px" style="border-radius: 50%;" alt=""> &nbsp;
                                <span>{{Auth::user()->name}}</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route('dashboard')}}">
                                Profile
                            </a>
                            <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                            </div>
                        </div>
                    @else
                    <a href="{{route('login')}}" class="nav-link border border-light rounded waves-effect">
                        Login
                    </a>
                    @endif
                    
                </li>
            </ul>

        </div>
      </div>
    </nav>
    <!-- Navbar -->
  </header>
  <!--Main Navigation-->