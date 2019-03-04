@extends('front.iopa') 
@section('content')
<section class="section-medicos">
  <div class="container wow fadeIn" data-wow-delay=".1s">
    <div class="inner-section text-center">
      <h3 class="inner-title">
        Exámenes
      </h3>
      <p>
        Consequat posuere viverra fringilla volutpat parturient sociosqu tincidunt potenti, quis gravida Semper.
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

    
    <div class="row row-especialidades">
      @foreach ($exams as $item)
      <div class="col-sm-3 filter {{ $item->listoffice }}">
        <div class="item-especialidad">
        <a href="{{ $item->route}}">
          <img src="{{ $item->file }}" alt="">
          <h5>{{ $item->name }}</h5>
              <span class="ui-go">Ver más</span>
            </a>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</section>
@endsection