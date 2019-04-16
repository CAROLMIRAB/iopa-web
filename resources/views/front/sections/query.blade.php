@extends('front.iopa') 
@section('content')
<section class="section-consultas">
    <div class="container wow fadeIn" data-wow-delay=".1s">
        <div class="inner-section text-center">
            <h3 class="inner-title">
                Consulta
            </h3>
            <p>
                {!! isset($config[6]['pages-description']['content']['page-query']) ? $config[6]['pages-description']['content']['page-query']
                : '' !!}
            </p>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div id="carousel-consultas" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        @if(isset($config[9]['query']['content']))
                        <?php $i = 1; ?> @foreach ($config[9]['query']['content'] as $key => $item) @if($item['active'] == 'active')
                        <li data-target="#carousel-consultas" data-slide-to="0" class="{{ ($i == 1) ? 'active' : '' }}"></li>
                        <?php $i++; ?> @endif @endforeach @endif
                    </ol>

                    <!-- Wrapper for slides -->

                    <div class="carousel-inner" role="listbox">

                        @if(isset($config[9]['query']['content']))
                        <?php $i = 1; ?> @foreach ($config[9]['query']['content'] as $key => $item) @if($item['active'] == 'active')
                        <div class="item {{ ($i == 1) ? 'active' : '' }}">
                            <img src="{{ $item['img'] }}" alt="..." class="center" />
                            <div class="carousel-caption">
                                {!! $item['description'] !!}
                            </div>
                        </div>
                        <?php $i++; ?> @endif @endforeach @endif

                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-consultas" role="button" data-slide="prev">
              <span
                class="glyphicon glyphicon-chevron-left"
                aria-hidden="true"
              ><i class="fa fa-chevron-left"></i>
            </span>
              <span class="sr-only">Previous</span>
            </a>
                    <a class="right carousel-control" href="#carousel-consultas" role="button" data-slide="next">
              <span
                class="glyphicon glyphicon-chevron-right"
                aria-hidden="true"
              >
              <i class="fa fa-chevron-right"></i>
            </span>
              <span class="sr-only">Next</span>
            </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection