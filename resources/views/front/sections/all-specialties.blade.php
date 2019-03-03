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
          <div class="col-sm-3">
            <div class="item-especialidad ">
              <a href="#!">
                <img src="./assets/img/home/papilas.jpg" alt="Fotos de Papilas">
                <h5>Fotos de Papilas</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <span class="ui-go">Ver más</span>
              </a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="item-especialidad " data-wow-delay=".3s">
              <a href="#!">
                <img src="./assets/img/home/diloscopia.jpg" alt="Diploscopia">
                <h5>Diploscopia</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <span class="ui-go">Ver más</span>
              </a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="item-especialidad " data-wow-delay=".6s">
              <a href="#!">
                <img src="./assets/img/home/radiografia.jpg" alt="Radiografía">
                <h5>Radiografía</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <span class="ui-go">Ver más</span>
              </a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="item-especialidad" data-wow-delay=".9s">
              <a href="#!">
                <img src="./assets/img/home/nuestros.jpg" alt="Médicos">
                <h5>Nuestros Médicos</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <span class="ui-go">Ver más</span>
              </a>
            </div>
          </div>
        </div>

    </div>
  </section>
@endsection