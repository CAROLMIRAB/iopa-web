<div class="row row-medicos row-medicos-res">
    <div class="col-xs-12">
        <ul class="media-list medic-list">
            @foreach ($doctorres as $doctor)
            <li class="media filter {{ $doctor->listoffice }}">
                <div class="media-left">
                    <a href="javascript:void(0);">
                    <img class="media-object" src="{{ $doctor->image }}" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">{{ $doctor->name." ".$doctor->lastname }}</h4>
                    <p class="media-description">
                        <a class="show-details" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Ver detalles
                      </a>
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