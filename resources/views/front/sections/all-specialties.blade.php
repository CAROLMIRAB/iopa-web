@extends('front.iopa') 
@section('content')
<section class="section-medicos">
  <div class="container wow fadeIn" data-wow-delay=".1s">
    <div class="inner-section text-center">
      <h3 class="inner-title">
        Especialidades
      </h3>
      <p>
          {!! isset($config[6]['pages-description']['content']['page-specialty']) ? $config[6]['pages-description']['content']['page-specialty'] : '' !!}
      </p>
    </div>

    <div class="row row-especialidades">
      @foreach ($specialties as $specialty)
      <div class="col-sm-3">
        <div class="item-especialidad ">
          <a href="{{ $specialty->route }}">
            <img src="{{ $specialty->image }}" alt="">
            <h5>{{ $specialty->name }}</h5>
            <p class="truncate">{{ $specialty->body }}</p>
          <span class="ui-go"><a href="{{ $specialty->route }}">Ver más</a></span>
          </a>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</section>
@endsection