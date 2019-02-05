@extends('front.layouts.iopa') 
@section('content')
    @include('front.home.slider')


<section class="section-boxes wow fadeIn">
    <div class="container">
        <div class="row row-boxes blue">
            <div class="col-sm-3 uno">
                <div class="ui-box reserva">
                    <a href="#!">
                        <img src="{{ asset('img/home/icon/reservar.png') }}" alt=" Aranceles">
                        <h4>RESERVAR</h4>
                    </a>
                </div>
            </div>
            <div class="col-sm-3 dos">
                <div class="ui-box uno">
                    <a href="#!">
                        <img src="{{ asset('img/home/icon/examenes.png') }}" alt="Exámenes">
                        <h4>EXÁMENES</h4>
                    </a>
                </div>
            </div>
            <div class="col-sm-3 tres">
                <div class="ui-box dos">
                    <a href="#!">
                        <img src="{{ asset('img/home/icon/cirugias.png') }}" alt="Cirugías">
                        <h4>CIRUGÍAS</h4>
                    </a>
                </div>
            </div>
            <div class="col-sm-3 cuatro">
                <div class="ui-box tres">
                    <a href="#!">
                        <img src="{{ asset('img/home/icon/sucursales.png') }}" alt="Sucursales">
                        <h4>SUCURSALES</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="clearfix"></div>
    @include('front.home.posts')
    @include('front.home.specialties')
    @include('front.home.partners')
@endsection