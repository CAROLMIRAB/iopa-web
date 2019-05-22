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
              <img src="{{ asset('uploads/images/'. $item->file) }}" alt="Fotos de Papilas">
                <h5>{{ $item->name }}</h5>
              <p class="truncate">{{ $item->body }}</p>
                <span class="ui-go">Ver más</span>
              </a>
            </div>
          </div>
          @endforeach
          @endif
        </div>
    </div>
  </section>