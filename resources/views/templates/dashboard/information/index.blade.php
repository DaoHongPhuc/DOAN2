@extends('templates.dashboard.index')

@section('dashboard')
@include('templates.lib.flashMessage')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title m-0">My Information</h4>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" action="{{route('myinformation')}}" method="post">
                    <div class="form-group row">
                        <label class="col-sm-2 control-label" for="describeSelf">
                            <img height="100px" width="100px" style="border-radius: 50%;" 
                            src="{{asset('documents/imageUser')}}/default.png" class="img-thumbnail" alt="">
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" 
                            value="{{Auth::user()->describeself}}" 
                            style="height: 100% !important;"
                            placeholder="Describe your self"
                            name="describeSelf"
                            id="describeSelf"
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label" for="firstName">
                            First Name
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" 
                            value="{{Auth::user()->firstname}}" 
                            placeholder="First Name"
                            name="firstName"
                            id="firstName">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label" for="middleName">
                            Middle Name
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" 
                            value="{{Auth::user()->middlename}}" 
                            placeholder="Middle Name"
                            name="middleName"
                            id="middleName">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label" for="lastName">
                            Last Name
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" 
                            value="{{Auth::user()->lastname}}" 
                            placeholder="Last Name"
                            name="lastName"
                            id="lastName">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label" for="userName">
                            Username
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" 
                            value="{{Auth::user()->name}}" 
                            name="userName"
                            id="userName">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label" for="email">email</label>
                        <div class="col-sm-10">
                            <input type="email" readonly
                            class="form-control" 
                            value="{{Auth::user()->email}}"
                            placeholder="Email"
                            name="email"
                            id="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label" for="address">
                            Address
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" 
                            value="{{Auth::user()->address}}" 
                            placeholder="Address"
                            name="address"
                            id="address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label" for="phone">
                            Phone
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" 
                            value="{{Auth::user()->phone}}" 
                            placeholder="Phone"
                            name="phone"
                            id="phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label" for="workPlace">
                            Work Place
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" 
                            value="{{Auth::user()->workplace}}" 
                            placeholder="Work Place"

                            name="workPlace"
                            id="workPlace">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label" for="birthDay">
                            Birth Day
                        </label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" 
                            value="{{Auth::user()->birthday}}" 
                            name="birthDay"
                            id="birthDay">
                        </div>
                    </div>
                    @csrf
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>
                </form>
            </div> <!-- card-body -->
        </div> <!-- card -->
    </div> <!-- col -->
</div> <!-- End row -->
@endsection

@section('script')
<script>
    
    

</script>
@endsection