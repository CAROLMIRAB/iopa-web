<div class="row">
    <div class="col-6 text-left">
        <h2 class="mb-0">{{ __('Home') }}</h2>
    </div>
    <div class="col-3 pull-right">
        </div>
    <div class="col-3 text-right">
        <button id="home-btn-save" class="btn btn-primary " type="button" data-url="{{ route('core.save-home') }}" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Guardando...') }}">{{ __('Guardar Cambios') }}</button>
    </div>
    <div class="col-12">
        <hr class="my-4">
    </div>
    
    <div class="col-12">
        <form action="{{ route('core.save-home') }}" method="post" id="politicas_add" enctype="multipart/form-data" data-route="{{ route('core.min-politicas') }}">

            <div class="form-group">
                    <label for="specialty">{{ __('Especialidades') }}</label>
                    <select name="specialty[]" id="specialty" class="form-control" data-route="{{ route('specialty.find-specialties')}}"> 				
                            </select>
                    <p class="invalid-feedback specialty-error"></p>
            </div>
        </form>
    </div>
    <div class="col-md-12">
        <form action="{{ route('core.save-subpoliticas') }}" method="post" id="politicas_add" enctype="multipart/form-data" data-route="{{ route('core.min-politicas') }}">
            <div class="field_row row">
                <div class="col-12">
                        <div style="height: 30px"> </div>
                        <h2 class="mb-0">{{ __('Politicas y Reglamento') }}</h2>
                    <hr class="my-4">
                </div>
                <div class="col-12">
                  
                    <div class="form-group form-group-sm">
                        <label for="politicas-subtitle">{{ __('Archivo') }}</label>
                        <input id="politicas-archive" name="archive" class="form-control" type="file" accept="application/pdf">
                    </div>
                    <label for="politicas-subtitle">{{ __('Titulo de descarga') }}</label>
                    <div class="input-group input-group-sm mb-3">
                        <input id="politicas-subtitle" name="politicas_subtitle" class="form-control">
                        <div class="input-group-append">
                                <button id="btn-addpoliticas" class="btn btn-icon btn-2 btn-primary btn-sm" type="button" data-loading-text="<i class='fa fa-spinner' aria-hidden='true'></i>Agregando...">
                                    <span class="btn-inner--icon">
                                       Agregar
                                    </span>
                                </button>
                                </div>
                        <input id="politicas-slug" name="politicas_slug" value="politicas" class="form-control hidden" type="hidden">
                    </div>
                </div>
               
                <div class="col-12">
                    <table class="table align-items-center table-flush table-politicas" style="width: 100%">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" width="25%">ARCHIVO</th>
                                <th scope="col" width="70%">TITULO DE DESCARGA</th>
                                <th scope="col" width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($home['content'])) @foreach ($home['content'] as $key => $item)
                            <tr>
                                @foreach ($item as $ky => $it)
                                <td width="20%">
                                    <a href="{{ $it['route'] }}"> {{ $it['pdf'] }}</a>
                                </td>
                                <td width="75%">
                                    {{ $it['title'] }}
                                </td>
                                <td width="5%">
                                    <button class="btn btn-primary btn-sm min-pol-tr" data-key="{{ $ky }}"><i class="ni ni-fat-delete" style="font-size: 18px"></i> </button>
                                </td>
                                @endforeach
                            </tr>
                            @endforeach @endif
        
        
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
   
</div>


