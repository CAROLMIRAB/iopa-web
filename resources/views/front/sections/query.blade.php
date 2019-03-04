@extends('front.iopa') 
@section('content')
<section class="section-consultas">
    <div class="container wow fadeIn" data-wow-delay=".1s">
        <div class="inner-section text-center">
            <h3 class="inner-title">
                Consulta
            </h3>
            <p>
                Consequat posuere viverra fringilla volutpat parturient sociosqu tincidunt potenti, quis gravida Semper.
            </p>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div id="carousel-consultas" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-consultas" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-consultas" data-slide-to="1"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="http://placehold.it/1920x800" alt="..." />
                            <div class="carousel-caption">
                                Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dolor sit amet consectetur adipiscing elit ut aliquam
                                purus. Sociis natoque penatibus et magnis dis parturient montes nascetur. Diam vel quam elementum
                                pulvinar etiam non.
                            </div>
                        </div>
                        <div class="item">
                            <img src="http://placehold.it/1920x800" alt="..." />
                            <div class="carousel-caption">
                                Diam vel quam elementum pulvinar etiam non.
                            </div>
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-consultas" role="button" data-slide="prev">
              <span
                class="glyphicon glyphicon-chevron-left"
                aria-hidden="true"
              ><i class="fa fa-chevron-left"></i>
            </span>
              <span class="sr-only">Previous</span>
            </a>
                    <a class="right carousel-control" href="#carousel-consultas" role="button" data-slide="next">
              <span
                class="glyphicon glyphicon-chevron-right"
                aria-hidden="true"
              >
              <i class="fa fa-chevron-right"></i>
            </span>
              <span class="sr-only">Next</span>
            </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection