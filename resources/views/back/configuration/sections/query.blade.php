<div class="row">
        <div class="col-6 text-left">
            <h2 class="mb-0">{{ __('Consulta') }}</h2>
        </div>
        <div class="col-3 pull-right">
                <button data-toggle="modal" data-target="#modal-addquery" id="btnmodalquery" class="btn  btn-success  pull-right">Agregar Imagen</button>
            </div>
        <div class="col-3 text-right">
            <button id="query-btn-save" class="btn  btn-primary " type="button" data-url="{{ route('core.save-queries') }}" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Guardando...') }}">{{ __('Guardar Cambios') }}</button>
        </div>
        <div class="col-12">
            <hr class="my-4">
        </div>
        
        <div class="col-12">
            <h2>Imagenes Agregadas</h2>
        </div>
        <div class="col-12">
            <ul id="sortable" class="sortable sortable-query conv-sort">
                @if(!empty($query['content'])) @foreach($query['content'] as $key => $item)
                <li data-img="{{ $item['img'] }}" data-desc="{{ $item['description'] }}" data-title="{{ $item['title'] }}" data-check="{{ $item['active'] }}"  style="background: url('{{ $item['img'] }}'); ">
                    <div class="box-image nostatus">
                        <button type="button" class="btn btn-success btn-sm pull-right query-delete">x</button>
                        <label class="checkcontent pull-right">
                                <input type="checkbox" class="check-query btn" {{  $item['active'] == 'active' ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                        </label>
                        <div class="box-text">
                            <h3>{{ $item['title'] }}</h3>
                            <p>{{ $item['description'] }}</p>
                        </div>
                    </div>
                </li>
                @endforeach @endif
            </ul>
        </div>
    </div>
    
    
    <div class="modal fade" id="modal-addquery" tabindex="-1" role="dialog" aria-labelledby="modal-addquery" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-" role="document">
            <div class="modal-content ">
    
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification"></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                </div>
    
                <div class="modal-body">
    
                    <form action="{{ route('core.add-query') }}" method="post" id="query_add" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <div id="query-image-preview" class="image-preview-class">
                                        <label for="image-upload" id="query-image-label">
                                            <i class='ni ni-cloud-download-95 i-img'></i></label>
                                        <input type="file" name="image" id="query-image" class="convenio-image" accept="image/png, image/jpeg" />
                                        <input type="hidden" class="imgBase64" name="imgBase64">
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Título</label>
                                    <input type="text" name="query_title" id="query-title" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Extracto</label>
                                    <textarea class="form-control" name="query_description" id="query-description"></textarea>
                                </div>
                            </div>
                            <div class="col-2 text-right">
    
                            </div>
    
                        </div>
    
                        <div class="modal-footer">
                            <button type="button" class="btn  btn-primary" data-dismiss="modal">Cerrar</button>
    
                            <button type="button" id="btn-addquery" class="btn btn-primary" data-loading-text="<i class='fa fa-spinner'></i> {{ __('Agregando...') }}"> Agregar</button>
    
    
                        </div>
                        <input type="hidden" name="slug" id="query-slug" value="query">
                    </form>
                </div>
            </div>
        </div>
    </div>