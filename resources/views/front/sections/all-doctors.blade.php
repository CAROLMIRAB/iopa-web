@extends('front.iopa')

@section('content')
<section class="section-medicos">
    <div class="container wow fadeIn" data-wow-delay=".1s">
      <div class="inner-section text-center">
        <h3 class="inner-title">
          Nuestros Médicos
        </h3>
        <p>
          Consequat posuere viverra fringilla volutpat parturient sociosqu
          tincidunt potenti, quis gravida Semper.
        </p>
      </div>

      <div class="row row-filters">
          <div class="col-md-12">
              <div align="center">
                  <button class="btn btn-theme02 filter-all border filter-button" data-filter="all"><div class="btn-sucursal">Ver todos</div>Nuestros médicos</button>
              @foreach($offices as $office)
              <button class="btn btn-theme02 border filter-button" data-filter="{{ $office->slug }}"><div class="btn-sucursal">Tus médicos en</div> {{ $office->name }}</button>
							@endforeach
              </div>
          </div>
      </div>

      <div class="row row-medicos-mobile">
        <div class="col-xs-12">
            <ul class="media-list mobile-medic-list">
              @foreach ($doctors as $doctor)
            <li class="media filter {{ $doctor->listoffice }}">
                  <div class="media-left">
                    <a href="javascript:void(0);">
                    <img class="media-object" src="{{ $doctor->image }}" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">{{ $doctor->name." ".$doctor->lastname }}</h4>
                    <p class="media-description">
                      <a class="show-details" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Ver detalles
                      </a>
                    </p>
                  </div>
                  <div class="collapse doc-details" id="collapseExample">
                    <div class="well">
                        {!! $doctor->excerpt !!}
                        <div class="mt-20"></div>
                        <a href="#" class="btn btn-theme04">Reserva tu hora</a>
                    </div>
                  </div>
                </li>
                @endforeach
            </ul>
        </div>

      </div>

      <div class="row row-medicos row-rotating-cards" id="team">
        <!-- Team member -->
        @foreach ($doctors as $doctor)
        <div class="col-xs-12 col-sm-4 col-md-3 filter {{ $doctor->listoffice }}">
          <div
            class="image-flip"
            ontouchstart="this.classList.toggle('click');">
            <div class="mainflip">
              <div class="frontside">
                <div class="card">
                  <div class="card-body text-center">
                    <p>
                      <img
                        class=" img-fluid "
                        src="{{ $doctor->image }}"
                        alt="card image"
                      />
                    </p>
                    <h4 class="card-title">{{ $doctor->name." ".$doctor->lastname }}</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text truncate" >
                      {!! $doctor->excerpt !!}
                    </p>
                  </div>
                </div>
              </div>
              <div class="backside">
                <div class="card">
                  <div class="card-body text-center mt-4">
                    <h4 class="card-title">{{ $doctor->name." ".$doctor->lastname }}</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text">
                        {!! $doctor->excerpt !!}
                    </p>
                    <p>
                      <a href="#!" class="btn btn-theme04">
                        RESERVA TU HORA</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <!-- ./Team member -->
      </div>
      <!-- end -->
    </div>
  </section>
@endsection