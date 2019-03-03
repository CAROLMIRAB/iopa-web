@extends('front.iopa') 
@section('content')
<section class="section-medicos">
    <div class="container wow fadeIn" data-wow-delay=".1s">
        <div class="inner-section text-center">
            <h3 class="inner-title">
                Sucursales
            </h3>
            <p>
                Consequat posuere viverra fringilla volutpat parturient sociosqu tincidunt potenti, quis gravida Semper.
            </p>
        </div>


        <div class="row row-sucursales-items">
            @foreach ($offices as $office)
            <div class="col-md-4">
                <div class="preview-box">
                    <div class="box-header text-center">
                        <h3>{{ $office->name }}</h3>
                        
                    </div>
                    <div class="box-body">
                        <img src="assets/img/googlemap-icon.png" class="sucursal-google" alt="">
                        <img src="{{ $office->photo }}" class="sucursal-cover" alt="">
                    </div>
                    <div class="box-footer">
                        <button data-toggle="modal" data-target="#modalSucursal" class="btn btn-theme02 btn-block btn-lg" type="button">
                    VER DETALLES
                  </button>
                    </div>
                </div>
            </div>
            @endforeach

        </div>


    </div>
</section>

<div class="modal fade modal-sucursal" id="modalSucursal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 col-sm-6 col-xs-12">
                        <div id="map">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="modal-details">
                            <h2 class="s-region">
                                <li class="fa fa-map-marker text-theme04"></li> Providencia</h2>
                            <p class="s-addres">Av. Los Leones 391.</p>
                            <div class="ui-divider"></div>
                            <p>Lláma al teléfono</p>
                            <p class="modal-phone"><img src="./assets/img/ico-support-04.png" alt=""> 228760900</p>

                            <div class="ui-divider"></div>
                            <a href="#!" class="btn btn-theme04  modal-cta">
                        <img src="./assets/img/home/icon/reservar.png" alt="">
                      RESERVA TU HORA</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection