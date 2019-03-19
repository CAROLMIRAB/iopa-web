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
                        <img src="{{ $office->img }}" class="sucursal-cover" alt="">
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
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d106523.03619374221!2d-70.7492336917453!3d-33.453347660405186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662d0069af23abb%3A0x879d59f409ed4897!2sSantiago%2C+Santiago+Metropolitan+Region!5e0!3m2!1sen!2scl!4v1553002379985" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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