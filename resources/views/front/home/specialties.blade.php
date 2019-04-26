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
        @if(isset($footerspecialties) && !is_null($footerspecialties))
        @foreach($footerspecialties as $item)
          <div class="col-sm-3">
            <div class="item-especialidad ">
              <a href="#!">
                <img src="./assets/img/home/papilas.jpg" alt="Fotos de Papilas">
                <h5>{{ $item->name }}</h5>
              <p class="truncate">{{ $item->body }}</p>
                <span class="ui-go">Ver más</span>
              </a>
            </div>
          </div>
          @endforeach
          @endif

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