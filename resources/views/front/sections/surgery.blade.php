@extends('front.iopa') 
@section('content')
<section class="section-blog">
  <div class="container">
    <div class="row">

      <div class="col-md-10 col-md-offset-1">
        <div class="ui-blog-details">
          <figure class="ui-blog-cover">
            <img src="{{ $surgery->image }}" alt="Portada">
          </figure>
          <ul class="ui-breadcrum">
            <li>
              <a href="{{ route('home') }}">Inicio</a>
            </li>
            <li>
              <a href="{{ route('surgery.viewallsurgeries') }}">Cirugías</a>
            </li>
            <li class="active">
              {{ $surgery->slug }}
            </li>
          </ul>

          <div class="ui-blog-body">


            <div class="ui-blog-meta">
              <h1 class="ui-blog-title">{{ $surgery->name }}</h1>
            </div>
            <div class="ui-blog-content">

              <h2>{{ $surgery->name }}</h2>

              <p>{!! $surgery->description !!}</p>
              
              @if(!is_null($surgery->preparation))
              <h2>PREPARACIÓN</h2>
              <p>{!! $surgery->preparation!!}</p>
              @endif

              @if(!is_null($surgery->indications))
              <h2>INDICACIONES</h2>
              <p>{!! $surgery->indications !!}</p>
              @endif
            </div>

            <ul class="ui-blog-tags">
              Puedes hacerte esta cirugía en:
              @foreach ($surgery->surgery_office as $item)
                            <li>
                                {{ $item->name }}
                            </li>
               @endforeach
              
            </ul>

          </div>
        </div>

      </div>

    </div>
  </div>
</section>
@endsection