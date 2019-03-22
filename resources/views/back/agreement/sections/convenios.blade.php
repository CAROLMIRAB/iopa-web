<form action="{{ route('agreement.save-convenio') }}" method="post" id="convenio" enctype="multipart/form-data">
    <div class="row">
        <div class="col-8 text-left">
            <h2 class="mb-0">{{ __('Convenios') }}</h2>
        </div>
        <div class="col-4 text-right">
            <button id="convenio-btn-save" class="btn  btn-primary" type="button" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Guardando...') }}">{{ __('Guardar Cambios') }}</button>
        </div>
        <div class="col-12">
            <hr class="my-4">
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="convenio-title">{{ __('Titulo') }}</label>
                <input id="convenio-title" name="convenio_title" class="form-control" value="{{ isset($convenio['name']) ? $convenio['name'] : ''  }}">
                <input id="convenio-slug" name="convenio_slug" value="convenios" class="hidden" type="hidden">
            </div>
            <div class="form-group">
                <label for="convenio-description">{{ __('Descripción') }}</label>
                <textarea id="convenio-description" name="convenio_description" class="form-control">{{ isset($convenio['description']) ? $convenio['description'] : '' }}</textarea>
            </div>
        </div>
    </div>
</form>

<form action="{{ route('agreement.save-images') }}" method="post" id="convenio_add" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <div style="" id="convenio-image-preview" class="image-preview-class">
                    <label for="image-upload" id="convenio-image-label">
                        <i class='ni ni-cloud-download-95 i-img'></i></label>
                    <input type="file" name="image" id="convenio-image" class="convenio-image" accept="image/png, image/jpeg" />
                    <input type="hidden" class="imgBase64" name="imgBase64">
                </div>
            </div>
            <div class="form-group">
                <label for="status">{{ __('Estado') }}</label>
                <select id="status" name="status" class="form-control">
                                <option value="ACTIVE">Publicado</option>
                                <option value="INACTIVE">No publicado</option>
                            </select>
            </div>
        </div>
        <div class="col-6 text-right">
            <div class="form-group">
                <button type="button" id="btn-addconvenio" class="btn btn-primary" data-loading-text="<i class='fa fa-spinner'></i> {{ __('Agregando...') }}"> Agregar</button>
            </div>
        </div>
        <div class="col-12">
            <h2>Logos Convenios</h2>
        </div>
        <div class="col-12">
            <ul class="clearfix" id="sortable">
                @if(!empty($convenio['content'])) @foreach($convenio['content'] as $key => $item)
                <li data-img="{{ $item['img'] }}">
                    <div class="box-image nostatus">
                        <button type="button" class="btn btn-success btn-sm pull-right conv-delete">x</button>
                        <img src="{{ $item['img'] }}" width="100%">
                    </div>
                </li>
                @endforeach @endif
            </ul>
        </div>
    </div>
</form>