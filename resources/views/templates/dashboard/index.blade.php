@extends('templates.layout')

@section('layout')
<div class="header-bg">
    <!-- Navigation Bar-->
    <header id="topnav">
        <div class="topbar-main">
            <div class="container-fluid">
                <!-- Logo-->
                <div>
                    <a href="index.html" class="logo">
                        <h1 style="font-family: fantasy">Engleco </h1>
                    </a>
                </div>
                <!-- End Logo-->
                <div class="menu-extras topbar-custom navbar p-0">
                    <ul class="mb-0 nav navbar-right ml-auto list-inline">
                        <li class="list-inline-item dropdown notification-list">
                            <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light notification-icon-box" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-bell"></i> 
                                <span class="badge badge-xs badge-danger"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg">
                                <li class="text-center notifi-title">
                                    Notification <span class="badge badge-xs badge-success">
                                        3</span></li>
                                <li class="list-group">
                                    <a href="javascript:void(0);" class="dropdown-item notify-item mt-2">
                                        <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                        <p class="notify-details">Your order is placed<span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                                    </a>
                                    <!-- item-->
                                </li>
                            </ul>
                        </li>
                        <li class="list-inline-item notification-list d-none d-sm-inline-block">
                            <a href="#" id="btn-fullscreen" class="waves-effect waves-light notification-icon-box"><i class="fas fa-expand"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                <img src="{{asset('template')}}/assets/images/users/avatar-1.jpg" alt="user-img" class="rounded-circle">
                                <span class="profile-username">
                                    {{Auth::user()->name}}<span class="mdi mdi-chevron-down font-15"></span>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                            <li><a href="{{route('logout')}}" class="dropdown-item"> 
                                    Logout</a></li>
                            </ul>
                        </li>
                        <li class="menu-item dropdown notification-list list-inline-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>
                    </ul>
                </div>
                <!-- end menu-extras -->
                <div class="clearfix"></div>
            </div>
            <!-- end container -->
        </div>
        <!-- end topbar-main -->
        @if (Auth::user()->level == 1)
            @include('templates.dashboard.admin.adminnav')
        @else
            @include('templates.dashboard.user.usernav')
        @endif
    </header>
    <!-- End Navigation Bar-->

</div>
<!-- header-bg -->

<div class="wrapper">


    



    <div class="container-fluid">
        @yield('dashboard')
        <!-- Page-Title -->
        {{-- <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Dashboard</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="m-b-30 m-t-0">Messages</h4>
                        <div class="inbox-widget slimscroller" style="max-height:360px;">

                            <div class="media inbox-item">
                                <img class="mr-3 rounded-circle" src="{{asset('template')}}/assets/images/users/avatar-1.jpg" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h5 class="mt-0">Clinton Murphy</h5>
                                    <p class="text-muted">Nullam id tincidunt ante on auctor lacus vivamus laoreet pellentesque quam aliquam efficitur.</p>
                                    <p class="inbox-item-time">5 mins ago</p>
                                </div>
                            </div>

                            <div class="media inbox-item mt-3">
                                <img class="mr-3 rounded-circle" src="{{asset('template')}}/assets/images/users/avatar-2.jpg" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h5 class="mt-0">Frank Martinez</h5>
                                    <p class="text-muted">Nullam id tincidunt ante on auctor lacus vivamus laoreet pellentesque quam aliquam efficitur.</p>
                                    <p class="inbox-item-time">6 mins ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div> --}}
        <!-- end container-fluid -->
    </div>
</div>
<!-- end wrapper -->

    <!-- Footer -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    © 2020 Engleco <span class="d-none d-md-inline-block"> - Admin Interface</span>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
@endsection