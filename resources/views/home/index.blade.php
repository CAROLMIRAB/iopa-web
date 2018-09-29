@extends('layouts.iopa')

@section('content')
    
@include('home.slider')

<div class="cta-group">
    <div>
        <div class="cta-icon phone"></div>
        Presupuestos
    </div>
    <div>
        <div class="cta-icon lab"></div>
        Exámenes y Cirugías
    </div>
    <div>
        <div class="cta-icon hands"></div>
        Aranceles y Convenios
    </div>
</div>

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

<section>
    <div class="ui-partners">
        <div class="section-title">
            <h3>CONVENIOS</h3>
        </div>
        <div class="container">
            <div class="ui-slick-carousel partners" id="slickPartners">
                <div>
                    <img src="{{ asset('/img/partners/partner01.jpg') }}" alt="">
                </div>
                <div>
                    <img src="{{ asset('/img/partners/partner04.jpg') }}" alt="">
                </div>
                <div>
                    <img src="{{ asset('/img/partners/partner02.jpg') }}" alt="">
                </div>
                <div>
                    <img src="{{ asset('/img/partners/partner03.jpg') }}" alt="">
                </div>
                <div>
                    <img src="{{ asset('/img/partners/partner04.jpg') }}" alt="">
                </div>
                <div>
                    <img src="{{ asset('/img/partners/partner01.jpg') }}" alt="">
                </div>
                <div>
                    <img src="{{ asset('/img/partners/partner03.jpg') }}" alt="">
                </div>
                <div>
                    <img src="{{ asset('/img/partners/partner01.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
	