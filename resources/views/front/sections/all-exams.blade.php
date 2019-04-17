@extends('front.iopa') 
@section('content')
<section class="section-medicos">
  <div class="container wow fadeIn" data-wow-delay=".1s">
    <div class="inner-section text-center">
      <h3 class="inner-title">
        Exámenes
      </h3>
      <p>
        {!! isset($config[6]['pages-description']['content']['page-exams']) ? $config[6]['pages-description']['content']['page-exams']
        : '' !!}
      </p>
    </div>

    <div class="row row-filters">
      <div class="col-md-12">
        <div align="center">
          <button class="btn btn-theme02 filter-all border filter-button" data-filter="all"><div class="btn-sucursal">Ver todos</div>Nuestros médicos</button>          @foreach($offices as $office)
          <button class="btn btn-theme02 border filter-button" data-filter="{{ $office->slug }}"><div class="btn-sucursal">Tus médicos en</div> {{ $office->name }}</button>          @endforeach
        </div>
      </div>
    </div>


    <div class="row row-especialidades">

      <div class="col-xl-12">
        <table id="table-exams" class="table-flush datatable-exams hover" role="grid" data-route="{{ route('exam.all-exams') }}"
          data-route-status="{{ route('exam.change-status') }}">
          <thead class="thead-light">
            <tr>
              <th class="sorting" width="10%">{{ __('Código') }}</th>
              <th class="sorting" width="15%">{{ __('Examen') }}</th>
              <th class="sorting" width="10%">{{ __('Donde Hacerlo') }}</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>

  </div>
</section>
@endsection