@extends('templates.site.layouts.index')

@section('homecontent')
    <!--Main layout-->
    <main class="mt-5 pt-5">
        <div class="container">
        <!--Section: Magazine v.1-->
        <section class="wow fadeIn">
            <!--Section heading-->
            <!--Grid row-->
            <div class="row text-left">
            <!--Grid column-->
                <div class="col-lg-9 col-md-12">
                    <div class="row">
                        <h2 class=" font-weight-bold ml-3">New Posts</h2>
                    </div>

                    <div class="row">
                        {{-- foreach --}}
                        @foreach ($newpost as $np)
                            
                            <div class="col-lg-6 col-md-12">
                                <div class="row mb-3" >
                                    <div class="col-md-3">
                
                                        <!--Image-->
                                        <div class="view overlay rounded z-depth-1">
                                        <img style="height: 60px !important;" 
                                        src="{{asset('documents/imagePost')}}/{{$np->image}}" 
                                        class="img-fluid" alt="Minor sample post image">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    </div>
                                    <!--Excerpt-->
                                    <div class="col-md-9">
                                        <a style="color: ;" href="post/{{$np->slug}}">
                                            <strong>{{$np->title}}</strong>
                                            
                                        </a>
                                        <span class="dark-grey-text">
                                            <strong></strong>
                                        </span>
                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-12 col-md-12 text-center">
                            <a href="#" class="btn btn-outline-info text-monospace">View All >></a>

                        </div>
                        {{-- foreach --}}
                    </div>

                    {{-- add here  --}}
                    <div class="row">
                        <h2 class=" font-weight-bold ml-3">New Documents</h2>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="row mb-3" >
                                @foreach ($newdocument as $nd)
                                    <div class="col-md-4">
                                        <span class="dark-grey-text">
                                            <strong></strong>
                                        </span> <br>
                                        <a style="color: ;" href="document/{{$nd->slug}}">
                                            <strong>{{$nd->name}}</strong>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 text-center">
                            <a href="#" class="btn btn-outline-info  text-monospace">View All >></a>
                        </div>
                    </div>
                </div>
                <!--Grid column-->

                <div class="col-lg-3 col-md-12">
                    {{-- <div class="row" style="display: block">
                        <h4 class=" font-weight-bold">Hot Post</h4>

                        <ul class="list-group list-group-flush">
                            @foreach ($hotpost as $k => $hp)
                                @if ($k == 0)
                                    @continue
                                @endif
                                <li class="list-group-item">
                                <a href="post/{{$hp->slug}}">{{$hp->title}}</a>
                                </li>
                                
                            @endforeach
                        </ul>
                    </div>
                    <div class="row">
                        <div class="mb-4 wow fadeIn">
                            <h4 class=" font-weight-bold">Top Document</h4>

                            <ul class="list-group list-group-flush">
                                @foreach ($hotpost as $k => $hp)
                                    @if ($k == 0)
                                        @continue
                                    @endif
                                    <li class="list-group-item">
                                    <a href="post/{{$hp->slug}}">{{$hp->title}}</a>
                                    </li>
                                    
                                @endforeach
                            </ul>
                        </div>
                    </div> --}}
                    <div class="row" style="display: block !important;">
                        <h4 class=" font-weight-bold">Topic</h4>
                        @foreach ($categories as $cate)
                            <a href="#">
                                <span class="badge badge-info">{{$cate->name}}</span>
                            </a>
                        @endforeach
                    </div>
                    <div class="row mt-4" style="display: block !important;">
                        <h4 class="font-weight-bold">Level</h4>
                        @foreach ($level as $l)
                            <a href="#">
                                <span class="badge badge-info">{{$l->name}}</span>
                            </a>
                        @endforeach

                    </div>
                    <div class="row mt-4" style="display: block !important;">
                        <h4 class="font-weight-bold">More Knowledge</h4>
                        <a href="https://www.elllo.org/" class="badge badge-info">Ello</a>
                        <a href="http://funeasyenglish.com/" class="badge badge-info">Fun Easy English</a>
                        <a href="http://learnenglish.britishcouncil.org/ar/" class="badge badge-info">Go4English</a>
                        <a href="https://lang-8.com/" class="badge badge-info">Lang-8</a>
                        <a href="https://lang-8.com/" class="badge badge-info">Lang-8</a>
                    </div>
                </div>
            </div>
            <!--Grid row-->
        </section>
        <!--/Section: Magazine v.1-->
    </main>
  <!--Main layout-->
@endsection
  

