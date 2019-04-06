
        <input id="reserve-buscador" type="input" value="" class="form-control" placeholder="Busca a tu médico">

        <ul class="media-list medic-list reserve-medic-ul">
            @foreach ($doctorres as $doctor)
            <li class="media reserve-li filter {{ $doctor->listoffice }}">
                <div class="media-left link-reserve-doctor">
                    <a href="javascript:;">
                    <img class="media-object" src="{{ $doctor->image }}" alt="...">
                    </a>
                </div>
                <div class="media-body ">
                    <a href="javascript:;" class="link-reserve-doctor" data-name="{{ $doctor->name." ".$doctor->lastname }}">
                            <label class="media-heading reserve-names">{{ $doctor->name." ".$doctor->lastname }}</label>
                        </a>
                    <p class="media-description">
                    </p>
                </div>
            </li>
            @endforeach
        </ul>
    
