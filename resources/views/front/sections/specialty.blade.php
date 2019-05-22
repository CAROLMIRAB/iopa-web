@extends('front.iopa') 
@section('content')
<section class="section-blog">
  <div class="container">
    <div class="row">

      <div class="col-md-10 col-md-offset-1">
        <div class="ui-blog-details">
          <figure class="ui-blog-cover">
            <img src="{{ $specialty->image }}" alt="Portada">
          </figure>
          <ul class="ui-breadcrum">
            <li>
              <a href="{{ route('home') }}">Inicio</a>
            </li>
            <li>
              <a href="{{ route('surgery.viewallspacialties') }}">Especialidades</a>
            </li>
            <li class="active">
              {{ $specialty->slug }}
            </li>
          </ul>

          <div class="ui-blog-body">


            <div class="ui-blog-meta">
              <h1 class="ui-blog-title">{{ $specialty->name }}</h1>
            </div>
            <div class="ui-blog-content">

              <h2>{{ $specialty->name }}</h2>

              <p>{!! $specialty->body !!}</p>
              
            </div>

            

          </div>
        </div>

      </div>

    </div>
  </div>
</section>
@endsection