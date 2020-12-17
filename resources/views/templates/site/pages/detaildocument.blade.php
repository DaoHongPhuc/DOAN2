@extends('templates.site.layouts.index')

@section('homecontent')

<main class="mt-5 pt-5">
    <div class="container">
        @php
        if(!empty($data)){
            foreach ($data as $v) {
                $slug = $v->slug;
                $name = $v->name;
                $content = $v->content;
                $view = $v->view;
                $user = \App\User::find($v->user_id);
                $user_id = $v->user_id;
                $category = \App\Categories::find($v->category_id)->name;
                $updated_at = $v->updated_at;
                $created_at = $v->created_at;
            }
        }
    @endphp
        <!--Section: Post-->
        <section class="mt-4">
            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-8 mb-4">

                    

                    <div class="card mb-4 wow fadeIn">

                        <div class="card-header font-weight-bold">
                            <span>About author</span>
                            <span class="pull-right">
                                <a href="">
                                    <i class="fab fa-facebook-f mr-2"></i>
                                </a>
                                <a href="">
                                    <i class="fab fa-twitter mr-2"></i>
                                </a>
                                <a href="">
                                    <i class="fab fa-instagram mr-2"></i>
                                </a>
                                <a href="">
                                    <i class="fab fa-linkedin-in mr-2"></i>
                                </a>
                            </span>
                        </div>

                        <!--Card content-->
                        <div class="card-body">

                            <div class="media d-block d-md-flex mt-3">
                                <img class="d-flex mb-3 mx-auto z-depth-1" src="https://mdbootstrap.com/img/Photos/Avatars/img (30).jpg" alt="Generic placeholder image"
                                    style="width: 100px;">
                                <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                    <h5 class="mt-0 font-weight-bold">{{$user->name}}<small> - <a href="">{{'@'.$user->name}}</a></small></h5>
                                    
                                    <div class="" style="cursor: pointer">
                                        <span class="badge btn-secondary">
                                            @if ($user->level == 1)
                                                {{'Adminitristor'}}
                                            @else
                                                {{'Member'}}
                                                
                                            @endif
                                        </span>
                                        <br>

                                        <span class="badge btn-info">
                                            <i class="fas fa-envelope"></i> Email: {{$user->email}} 
                                        </span>

                                        <br>
                                        <span id="parentAddContact">
                                            
                                        </span>
                                        

                                        <span class="badge btn-danger">
                                            <i class="far fa-heart"></i> Following    
                                        </span>  

                                        <span class="badge btn-warning">
                                            <i class="far fa-flag"></i> Report    
                                        </span>  
                                    </div>
                                                                    
                                </div>
                            </div>

                        </div>

                    </div>

                    <!--Card-->
                    <div class="card mb-4 wow fadeIn">

                        <!--Card content-->
                        <div class="card-body">

                            <p class="h5 my-4" style="text-decoration: underline">{{$name}}</p>
                            <p class="my-4">
                                @php
                                    echo html_entity_decode($content);
                                @endphp
                                
                            </p>

                        </div>

                    </div>
                    <!--/.Card-->

                    

                    <!--Comments-->
                    <div class="card card-comments mb-3 wow fadeIn">
                        <div class="card-header font-weight-bold">3 comments</div>
                        <div class="card-body">

                            <div class="media d-block d-md-flex mt-4">
                                <img class="d-flex mb-3 mx-auto " src="https://mdbootstrap.com/img/Photos/Avatars/img (20).jpg" alt="Generic placeholder image">
                                <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                    <h5 class="mt-0 font-weight-bold">Miley Steward
                                        <a href="" class="pull-right">
                                            <i class="fas fa-reply"></i>
                                        </a>
                                    </h5>
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                    cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </div>
                            </div>
                            <div class="media d-block d-md-flex mt-3">
                                <img class="d-flex mb-3 mx-auto " src="https://mdbootstrap.com/img/Photos/Avatars/img (30).jpg" alt="Generic placeholder image">
                                <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                    <h5 class="mt-0 font-weight-bold">Caroline Horwitz
                                        <a href="" class="pull-right">
                                            <i class="fas fa-reply"></i>
                                        </a>
                                    </h5>
                                    At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti
                                    quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,
                                    similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum
                                    fuga.
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--/.Comments-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 mb-4">

                    <!--Card : Dynamic content wrapper-->
                    <div class="card mb-4 text-center wow fadeIn">

                        <div class="card-header">Do you want to get informed about new articles?</div>

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Default form login -->
                            <form>

                                <!-- Default input email -->
                                <label for="defaultFormEmailEx" class="grey-text">Your email</label>
                                <input type="email" id="defaultFormLoginEmailEx" class="form-control">

                                <br>

                                <!-- Default input password -->
                                <label for="defaultFormNameEx" class="grey-text">Your name</label>
                                <input type="text" id="defaultFormNameEx" class="form-control">

                                <div class="text-center mt-4">
                                    <button class="btn btn-info btn-md" type="submit">Sign up</button>
                                </div>
                            </form>
                            <!-- Default form login -->

                        </div>

                    </div>
                    <!--/.Card : Dynamic content wrapper-->

                    <!--/.Card-->
                    <div class="card mb-4 wow fadeIn">

                        <div class="card-header">More from Author</div>

                        <!--Card content-->
                        <div class="card-body">

                            <ul class="list-unstyled">
                                @foreach ($morefromauthor as $mfa)
                                    <li class="media my-2">
                                    
                                        <div class="media-body">
                                        <a href="post/{{$mfa->slug}}">
                                                <h6 class="mt-0 mb-1 font-weight-bold">{{$mfa->name}}</h6>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                    <!--/.Card-->
                <input type="hidden" id="getUserId" value="{{$user_id}}">
                    
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </section>
        <!--Section: Post-->
    </div>
</main>
@endsection

@section('homescript')
    <script>
        $(document).ready(function () {
            checkContact()
        });

        function checkContact(){
            contactid = $("#getUserId").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "get",
                url: "{{route('checkContact')}}",
                data: {
                    contactid: contactid
                },
                dataType: "json",
                success: function (d) {
                    if(d.status){
                        $("#parentAddContact").html('<span class="badge btn-primary" data-id="{{$user->id}}"><i class="far fa-comments" ></i> Contacted</span>')
                    }else{
                        $("#parentAddContact").html('<span class="badge btn-primary" data-id="{{$user->id}}" onCLick="addContact()" id="addContact"><i class="far fa-comments" ></i> Add Contact</span>')
                    }
                }
            });
        }

        function addContact(){
            contactid = $("#addContact").data('id');
            Swal.fire({
                title: 'Confirm',
                text: "Are you sure add this author to contact ?" ,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((confirm) => {
                    if (confirm.value) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "post",
                            url: "{{route('addContact')}}",
                            data: {
                                data: contactid
                            },
                            dataType: "json",
                            success: function (d) {
                                if (d.status) {
                                    Swal.fire('Successful !', '', 'success');

                                }else{
                                    Swal.fire('Error !', '', 'error');                 
                                }
                                init();
                            }
                        });
                    }else{
                        Swal.fire('Cancel !', '', 'error');
                    }
            });
        }
    </script>
@endsection