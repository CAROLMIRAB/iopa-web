@extends('front.iopa') 
@section('content')
<section class="section-blog">
    <div class="container">
        <div class="row">

            <div class="col-md-10 col-md-offset-1">
                <div class="ui-blog-details">
                    <figure class="ui-blog-cover">
                        <img src="{{ $exam->file }}" alt="Portada">
                    </figure>
                    <ul class="ui-breadcrum">
                        <li>
                            <a href="{{ route('home') }}">Inicio</a>
                        </li>
                        <li>
                            <a href="{{ route('exam.viewallexams') }}">Exámenes</a>
                        </li>
                        <li class="active">
                            {{ $exam->slug }}
                        </li>
                    </ul>

                    <div class="ui-blog-body">


                        <div class="ui-blog-meta">
                            <h1 class="ui-blog-title">{{ $exam->name }}</h1>
                        </div>
                        <div class="ui-blog-content">

                            <h2>{{ $exam->name }}</h2>

                            <p>{!! $exam->description !!}</p>

                            <h2>PREPARACIÓN</h2>

                            <p>{!! $exam->preparation!!}</p>

                            <h2>INDICACIONES</h2>

                            <p>{!! $exam->indications !!}</p>
                        </div>

                        <ul class="ui-blog-tags">
                            Puedes hacerte este examen en: 
                            @foreach ($exam->exam_office as $item)
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
</section>
@endsection