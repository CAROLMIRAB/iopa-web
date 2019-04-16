@extends('front.iopa') 
@section('content')
<section class="section-nosotros">
    <div class="container wow fadeIn" data-wow-delay=".1s">
        <div class="inner-section text-center">
            <h1 class="inner-title">
                Nosotros
            </h1>
            <p>
                {!! isset($config[6]['pages-description']['content']['page-aboutus']) ? $config[6]['pages-description']['content']['page-aboutus'] : '' !!} 
            </p>
        </div>

        <div class="row row-nosotros row-timeline mt-40">
            <div class="col-md-12">
                <img src="./assets/img/logo-iopa.png" class="img-responsive center-block" alt="">
            </div>
            <div class="col-md-12">
                {!! isset($config[8]['aboutus']['content']['description']) ? $config[8]['aboutus']['content']['description'] : '' !!}
            </div>

        </div>

    </div>
</section>
@endsection