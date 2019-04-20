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


    <div class="row row-especialidades">

      <div class="col-xl-12">
        <table id="table-exams" class="table-flush datatable-exams hover table-striped datatable" role="grid" data-route="{{ route('exam.allexams') }}">
          <thead class="thead-light">
            <tr>
              <th class="sorting" width="15%">{{ __('Examen') }}</th>
              <th class="sorting" width="10%">{{ __('Código') }}</th>
              <th class="sorting" width="10%">{{ __('Donde Hacerlo') }}</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>

  </div>
</section>
@endsection