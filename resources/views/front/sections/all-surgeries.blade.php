@extends('front.iopa') 
@section('content')
<section class="section-medicos">
  <div class="container wow fadeIn" data-wow-delay=".1s">
    <div class="inner-section text-center">
      <h3 class="inner-title">
        Cirugías
      </h3>
      <p>
          {!! isset($config[6]['pages-description']['content']['page-surgeries']) ? $config[6]['pages-description']['content']['page-surgeries'] : '' !!}
      </p>
    </div>

    <div class="row row-especialidades">
    @foreach ($surgeries as $surgery)
      <div class="col-sm-3 filter florida buin">
        <div class="item-especialidad">
        <a href="{{ $surgery->route }}">
              <img src="{{ $surgery->image }}" >
              <h5>{{ $surgery->name }}</h5>
              <span class="ui-go">Ver más</span>
            </a>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</section>
@endsection