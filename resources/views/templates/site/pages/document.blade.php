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
                <div class="col-lg-4 col-md-12">
                    <h4 class=" font-weight-bold">Easy</h4>
                    @foreach ($easy as $ez)
                        <a href="document/{{$ez->slug}}" target="_blank">{{$ez->name}}</a> <br>
                    @endforeach
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-12">
                    <h4 class=" font-weight-bold">Medium</h4>
                    @foreach ($medium as $med)
                        <a href="document/{{$med->slug}}" target="_blank">{{$med->name}}</a> <br>
                    @endforeach
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-12">
                    <h4 class=" font-weight-bold">Hard</h4>
                    @foreach ($hard as $h)
                        <a href="document/{{$h->slug}}" target="_blank">{{$h->name}}</a> <br>
                    @endforeach
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </section>
        <!--/Section: Magazine v.1-->
    </main>
  <!--Main layout-->
@endsection
  

