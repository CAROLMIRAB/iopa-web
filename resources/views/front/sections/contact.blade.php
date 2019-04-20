@extends('front.iopa') 
@section('content')
<section class="section-contacto">
    <div class="container wow fadeIn" data-wow-delay=".1s">
      <div class="inner-section text-center">
        <h1 class="inner-title">
          Contacto
        </h1>
        <p>
            {!! isset($config[6]['pages-description']['content']['page-contact']) ? $config[6]['pages-description']['content']['page-contact'] : '' !!}

        </p>
      </div>
      <div class="row row-contacto">
        <div class="col-md-12">
          <div class="ui-select-box row">
            <div class="col-md-8 col-sm-12">
              <h3 class="pull-left mt-10">Solicitar una copia de su ficha clínica o receta médica.</h3>
            </div>
          
            <div class="col-md-4 col-sm-12">
            <p class="mt-10"><a href="{{ route('aboutus.request') }}" class="btn btn-theme04 btn-lg">Hacer solicitud</a></p>
            </div>
          </div>
          <div class="ui-select-box row">
              <div class="col-md-8 col-sm-12">
                <h3 class="pull-left mt-10">Solicitar presupuesto quirúrgico</h3>
              </div>
              <div class="col-md-4 col-sm-12">
              <p class="mt-10"><a href="{{ route('aboutus.request') }}" class="btn btn-theme04 btn-lg">Hacer solicitud</a></p>
              </div>
            </div>
            <div class="ui-select-box row">
                <div class="col-md-8 col-sm-12">
                  <h3 class="pull-left mt-10">Reservar hora para pabellón, consulta o exámenes.</h3>
                </div>

                <div class="col-md-4 col-sm-12">
                <p class="mt-10"><a href="{{ route('aboutus.request') }}" class="btn btn-theme04 btn-lg">Hacer solicitud</a></p>
                </div>
              </div>
              <div class="ui-select-box row">
                  <div class="col-md-8 col-sm-12">
                    <h3 class="pull-left mt-10">Información sobre promociones y/o convenios.</h3>
                  </div>
                  <div class="col-md-4 col-sm-12">
                  <p class="mt-10"><a href="{{ route('aboutus.request') }}" class="btn btn-theme04 btn-lg">Hacer solicitud</a></p>
                  </div>
                </div>
                <div class="ui-select-box row">
                    <div class="col-md-8 col-sm-12">
                      <h3 class="pull-left mt-10">Sugerencias y Reclamos.</h3>
                    </div>
                    <div class="col-md-4 col-sm-12">
                    <p class="mt-10"><a href="{{ route('aboutus.opinion') }}" class="btn btn-theme04 btn-lg">Hacer solicitud</a></p>
                    </div>
                  </div>
                <div class="ui-select-box row">
                    <div class="col-md-8 col-sm-12">
                      <h3 class="pull-left mt-10">Otras solicitudes.</h3>
                    </div>
                    <div class="col-md-4 col-sm-12">
                    <p class="mt-10"><a href="{{ route('aboutus.request') }}" class="btn btn-theme04 btn-lg">Hacer solicitud</a></p>
                    </div>
                  </div>
        </div>
      </div>
    </div>
  </section>
@endsection