<div class="row row-medicos row-medicos-res">
    <div class="col-xs-12">
            <input id="reserve-buscador" type="input" value="" class="form-control" placeholder="Busca a tu médico">
    </div>
            <div class="col-xs-12">
        <ul class="media-list medic-list reserve-medic-ul">
            @foreach ($doctorres as $doctor)
            <li class="media reserve-li filter {{ $doctor->listoffice }}">
                <div class="media-left">
                    <a href="javascript:void(0);">
                    <img class="media-object" src="{{ $doctor->image }}" alt="...">
                    </a>
                </div>
                <div class="media-body ">
                    <label class="media-heading reserve-names">{{ $doctor->name." ".$doctor->lastname }}</label>
                    <p class="media-description">
                    </p>
                </div>
                <div class="collapse doc-details" id="collapseExample">
                    <div class="well">
                        {!! $doctor->excerpt !!}
                        <div class="mt-20"></div>
                        <a href="#" class="btn btn-theme04">Reserva tu hora</a>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>

</div>