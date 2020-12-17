@extends('templates.layout')

@section('layout')
<div class="accountbg"></div>
<div class="wrapper-page">
    <div class="card card-pages">

        <div class="card-body">
            <div class="text-center m-t-20 m-b-30">
                    {{-- <a href="index.html" class="logo logo-admin"><img src="assets/images/logo-dark.png" alt="" height="34"></a> --}}
                <h1 style="font-family: fantasy">Engleco</h1>
                </div>
            <h4 class="text-muted text-center m-t-0"><b>Sign Up</b></h4>
@include('templates.lib.flashMessage')  

        <form class="form-horizontal m-t-20" action="{{route('register')}}" method="post">
            @csrf
                <div class="form-group">
                    <div class="col-12">
                        <input class="form-control" type="email" name="email"
                        required="" placeholder="Email">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-12">
                        <input class="form-control" type="text" name="username"
                        required="" placeholder="Username">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-12">
                        <input class="form-control" type="password" name="password"
                        required="" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <input class="form-control" type="password" name="password_confirmation"
                        required="" placeholder="Confirm Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" type="checkbox" checked="checked">
                            <label for="checkbox-signup">
                                I accept <a href="#">Terms and Conditions</a>
                            </label>
                        </div>

                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-12">
                        <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Register</button>
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12 text-center">
                    <a href="{{route('login')}}" 
                        class="text-muted">Already have account?</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection