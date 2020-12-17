@extends('templates.layout')

@section('layout')
    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card card-pages">

            <div class="card-body">
                <div class="text-center m-t-20 m-b-30">
                        <a href="index.html" class="logo logo-admin">
                            {{-- <img src="assets/images/logo-dark.png" alt="" height="34"> --}}
                            <h1 style="font-family: fantasy">Engleco</h1>
                        </a>
                </div>
                <h4 class="text-muted text-center m-t-0"><b>Sign In</b></h4>
@include('templates.lib.flashMessage')  

                <form class="form-horizontal m-t-20" method="post" action="{{route('login')}}">

                    <div class="form-group">
                        <div class="col-12">
                            <input class="form-control" type="email" 
                            name="email" required="" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <input class="form-control" type="password" name="password" required="" placeholder="Password">
                        </div>
                    </div>
@csrf
                    <div class="form-group">
                        <div class="col-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup">
                                    Remember me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center m-t-40">
                        <div class="col-12">
                            <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                    <div class="form-group row m-t-30 m-b-0">
                        <div class="col-sm-7">
                            <a href="pages-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                        </div>
                        <div class="col-sm-5 text-right">
                            <a href="{{route('register')}}" 
                            
                            class="text-muted">
                                Create an account</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
        



        