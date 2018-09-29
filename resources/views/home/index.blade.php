@extends('layouts.iopa')

@section('content')
    
@include('home.slider')


<div class="cta-group">
    <div class="cta-group-item">
        <div class="cta-content">
            <div class="cta-icon phone"></div>
            Presupuestos
        </div>
    </div>
    <div class="cta-group-item">
        <div class="cta-content">
            <div class="cta-icon lab"></div>
            Exámenes y Cirugías
        </div>
    </div>
    <div class="cta-group-item">
        <div class="cta-content">
            <div class="cta-icon hands"></div>
            Aranceles y Convenios
        </div>
    </div>
</div>

<div class="clearfix"></div>

<section>
    <div class="section-title">
        <h3>ENTRADAS DE BLOG</h3>
    </div>
    <div class="container">
        <div class="ui-top-posts">
            <div class="row">        
            
                @include('home.posts')

            </div>
        </div>
    </div>
</section>

<section>
    <div class="ui-specialities">
        <div class="section-title">
            <h3>ESPECIALIDADES</h3>
        </div>
        <div class="container">
            <div class="col-sm-4">
                <div class="ui-spec-item">
                    <figure>
                        <img src="{{ asset('/img/specialities-exam.jpg') }}" alt="">
                    </figure>
                    <a href="#!" class="btn btn-theme02">Exámenes</a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ui-spec-item">
                    <figure>
                        <img src="{{ asset('/img/specialities-cirug.jpg') }}" alt="">
                    </figure>
                    <a href="#!" class="btn btn-theme02">Cirugías</a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ui-spec-item">
                    <figure>
                        <img src="{{ asset('/img/specialities-consulta.jpg') }}" alt="">
                    </figure>
                    <a href="#!" class="btn btn-theme02">Consultas</a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- @include('home.partners') --}}

@endsection
	