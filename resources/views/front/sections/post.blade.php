@extends('front.iopa') 
@section('content')
<section class="section-blog">
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div class="ui-blog-details">
                    <figure class="ui-blog-cover">
                        <img src="{{ $post->image }}" alt="Portada">
                    </figure>
                    <ul class="ui-breadcrum">
                        <li>
                        <a href="{{ route('home') }}">Inicio</a>
                        </li>
                        <li>
                            <a href="{{ route('post.viewallposts') }}">Noticias</a>
                        </li>
                        <li class="active">
                            {{ $post->name }}
                        </li>
                    </ul>

                    <div class="ui-blog-body">


                        <div class="ui-blog-meta">
                            <h1 class="ui-blog-title">{{ $post->name }}</h1>
                            <div class="ui-meta-data">
                                <span class="ui-meta-date"><i class="fa fa-clock-o"></i> {{ $post->created }}</span>
                            </div>
                        </div>
                        <div class="ui-blog-content">

                            {!! $post->body !!}

                        </div>

                        <ul class="ui-blog-tags">
                            @foreach ($post->tagsl as $item)
                            <li>
                                <a href="#">{{ $item }}</a>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                </div>

            </div>

            <div class="col-md-4">
                <aside class="sidebar">
                    <div class="side-widged">
                        <h5 class="widged-title">Noticias Recientes</h5>
                        <ul class="media-list blog-list">
                            @if(isset($recents))
                                @foreach ($recents as $item)
                                    <li class="media blog-preview blog-recent">
                                        <div class="media-left">
                                        <a href="{{ $item->route }}">
                                        <img src="{{ $item->image }}" style="width: 50px; height: auto;" alt="...">
                                        </a>
                                        </div>
                                        <div class="media-body">
                                        <h4 class="media-heading"><a href="{{ $item->route }}">{{ $item->name }}</a></h4>
                                        <div class="post-preview-meta">
                                        <span class="meta-date"> <i class="fa fa-clock-o"></i> {{ $item->created }}</span>
                                        </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>

                    <!--<div class="side-widged">
                        <h5 class="widged-title">Categorías</h5>
                        <div class="list-group list-categories">
                            <a href="#" class="list-group-item">
                          <span class="badge">14</span> Novedades</a>
                            <a href="#" class="list-group-item">
                          <span class="badge">5</span> Generales</a>
                            <a href="#" class="list-group-item">
                          <span class="badge">2</span> Anuncios Oficiales</a>
                            <a href="#" class="list-group-item">
                          <span class="badge">9</span> Salud e Higiene</a>
                        </div>
                    </div>-->
                    <div class="side-widged text-center">
                        <a href="javascript:;" class="btn btn-theme04 --open-sys">
                      RESERVA TU HORA</a>
                    </div>
                </aside>
            </div>

        </div>

    </div>
</section>

@endsection