@extends('front.iopa') 
@section('content')
<section class="section-contacto">
    <div class="container wow fadeIn" data-wow-delay=".1s">
      <div class="inner-section text-center">
        <h1 class="inner-title">
          Contacto
        </h1>
        <p>
          Consequat posuere viverra fringilla volutpat parturient sociosqu
          tincidunt potenti, quis gravida Semper.
        </p>
      </div>
      <div class="row row-contacto">
        <div class="col-md-6">
          <div class="ui-select-box">
              <h3>Seleccione esta opción si necesita</h3>
              <div class="ui-box-description">
                 <p>Si necesita información general de nuestra clínica, reservar hora de Pabellón, Consulta o Exámenes, solicitar presupuesto, una copia de Ficha o Receta Médica, complete el formulario de Contacto y le responderémos a la brevedad.</p>
              </div>
              <p class="mt-40"><a href="/solicitudes.html" class="btn btn-theme04 btn-lg">Hacer solicitud</a></p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="ui-select-box">
            <h3>Seleccione esta opción si necesita</h3>
            <div class="ui-box-description">
              <p>Su opinión es muy importante para nosotros, por esto contamos con usted para mejorar la calidad de nuestro servicio. Lo invitamos a envíar sus comentarios a tráves del formulario de Felicitaciones, Sugerencias y Reclamos.</p>
            </div>
            <p class="mt-40"><a href="/opinion.html" class="btn btn-theme04 btn-lg">Dar su opinión</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection