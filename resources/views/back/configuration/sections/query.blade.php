<div class="row">
    <div class="col-8 text-left">
        <h2 class="mb-0">{{ __('Consulta') }}</h2>
    </div>
    <div class="col-4 text-right">
        <button id="query-btn-save" class="btn  btn-primary" type="button" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Guardando...') }}">{{ __('Guardar Cambios') }}</button>
    </div>
    <div class="col-12">
        <hr class="my-4">
    </div>
    <div class="col-12">
        <hr class="my-4">
    </div>
</div>
<form action="{{ route('agreement.save-images') }}" method="post" id="query_add" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <div style="" id="query-image-preview" class="image-preview-class">
                    <label for="image-upload" id="query-image-label">
                        <i class='ni ni-cloud-download-95 i-img'></i></label>
                    <input type="file" name="image" id="query-image" class="query-image" accept="image/png, image/jpeg" />
                    <input type="hidden" class="imgBase64" name="imgBase64">
                </div>
            </div>

        </div>
        <div class="col-6 text-right">
            <div class="form-group">
                <button type="button" id="btn-addquery" class="btn btn-primary" data-loading-text="<i class='fa fa-spinner'></i> {{ __('Agregando...') }}"> Agregar</button>
            </div>
        </div>
        <div class="col-12">
            <h2>Slides Agregados</h2>
        </div>
        <div class="col-12">
            <ul id="sortable" class="sortable conv-sort">
                @if(!empty($query['content'])) @foreach($query['content'] as $key => $item)
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