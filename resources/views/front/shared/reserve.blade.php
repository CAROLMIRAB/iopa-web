<div class="sys-popup" id="sysPopup">
    <div class="sys-popup-header">
        <div class="sys-popup-title --open-sys">Reserva <strong>tu Hora</strong></div>
        <div class="sys-popup-controls">
            <button class="sys-action --sys-close --open-sys"><i class="fa fa-times"></i></button>
        </div>
    </div>
<div class="sys-popup-content"  data-doctor="{{ route('reserve.doctors') }}" data-reserve="{{ route('reserve.reserve') }}">
    <div class="reserve-content">
        <div class="ui-form contact-form rutform" style="height: calc(100% - 100px);">
            <div class="form-loader hide">
                <i class="fa fa-circle-o-notch text-primary fa-spin fa-3x"></i>
            </div>
            <div class="ui-contact-body">
                <div class="ui-fields">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="title-reserva" style="">
                                <h1>Reserva</h1>
                                <h4 style="">tu hora</h4>
                                <i class="fa fa-calendar calendar-icon" style="position: absolute; right: 3px; font-size: 6rem; top: -10px;"></i>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Ingresa tu rut">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg" id="sub-reserve" style="width: 100%">Ir a reservar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
</div>