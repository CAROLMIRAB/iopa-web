<div class="row">
        <div class="col-8 text-left">
            <h2 class="mb-0">{{ __('Contacto') }}</h2>
        </div>
        <div class="col-4 text-right">
            <button id="contact-btn-save" class="btn  btn-primary" type="button" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Guardando...') }}">{{ __('Guardar Cambios') }}</button>
        </div>
        <div class="col-12">
            <hr class="my-4">
        </div>
    </div>
    <form action="{{ route('core.save-contact') }}" method="post" id="contact_add" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12">
            <ul>
             @foreach ($offices as $item)
             <li class="contact_offices">
              {{ $item->name }}
             <ul class="ul-{{ $item->slug }}">
                 <li class="li-{{ $item->slug }}">
                    <label style="font-size: 12px">Correos Electronicos</label>
                    <div class="input-group input-group-sm mb-3">
                    <input type="text" class="form-control input-sm" name="{{ $item->slug }}[]" placeholder="" aria-label="" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                        <button class="btn btn-primary add-email" type="button" data-office="{{ $item->slug }}"><i class="ni ni-fat-add " style=""></i></button>
                        </div>
                    </div>
                 </li>
            </ul>
            </li>
             @endforeach
            </ul>
            </div>
        </div>
        <input type="hidden" name="slug" id="contact-slug" value="contact">
    </form>