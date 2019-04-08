<div class="sys-popup" id="sysPopup">
    <div class="sys-popup-header">
        <div class="sys-popup-title --open-sys">Reserva <strong>tu Hora</strong></div>
        <div class="sys-popup-controls">
            <button class="sys-action --sys-close --open-sys"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="sys-popup-content" data-doctor="{{ route('reserve.doctors') }}" data-reserve="{{ route('reserve.reserve') }}" data-agenda="{{ route('reserve.agenda') }}">
        <div class="form-loader hide">
            <i class="fa fa-circle-o-notch text-primary fa-spin fa-3x"></i>
        </div>
        <div class="reserve-filter"> </div>
        <div class="reserve-content">
           
        </div>
    </div>
</div>