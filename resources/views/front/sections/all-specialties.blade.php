@extends('front.iopa')

@section('content')
<section class="section-medicos">
    <div class="container wow fadeIn" data-wow-delay=".1s">
      <div class="inner-section text-center">
        <h3 class="inner-title">
          Especialidades
        </h3>
        <p>
          Consequat posuere viverra fringilla volutpat parturient sociosqu
          tincidunt potenti, quis gravida Semper.
        </p>
      </div>

      <div class="row row-especialidades">
          @foreach ($specialties as $specialty)
          <div class="col-sm-3">
            <div class="item-especialidad ">
              <a href="#!">
                <img src="./assets/img/home/papilas.jpg" alt="Fotos de Papilas">
                <h5>{{ $specialty->name }}</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <span class="ui-go">Ver más</span>
              </a>
            </div>
          </div>
          @endforeach
        </div>

    </div>
  </section>
@endsection