<form action="{{ route('agreement.save-pago') }}" method="post" id="pago" enctype="multipart/form-data">
    <div class="row">
        <div class="col-8 text-left">
            <h2 class="mb-0">{{ __('Medios de Pago') }}</h2>
        </div>
        <div class="col-4 text-right">
            <button id="pago-btn-save" class="btn  btn-primary" type="button" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Guardando...') }}">{{ __('Guardar Cambios') }}</button>
        </div>
        <div class="col-12">
            <hr class="my-4">
        </div>
        <div class="col-8">
            <div class="form-group">
                <label for="pago-title">{{ __('Titulo') }}</label>
                <input id="pago-title" name="pago_title" class="form-control" value="{{ isset($pago['name']) ? $pago['name'] : ''  }}">
                <input id="pago-slug" name="pago_slug" value="pagos" class="hidden" type="hidden">
            </div>
            <div class="form-group">
                <label for="pago-description">{{ __('Descripción') }}</label>
                <textarea id="pago-description" name="pago_description" class="form-control">{{ isset($pago['description']) ? $pago['description'] : '' }}</textarea>
            </div>

        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="status">{{ __('Estado') }}</label>
                <select id="status" name="status" class="form-control">
                                        <option value="ACTIVE">Publicado</option>
                                        <option value="INACTIVE">No publicado</option>
                                    </select>
            </div>
            <div class="form-group ">
                <label for="image">{{ __('Imagen') }}</label>
                <div id="pago-image-preview" class="image-preview-class2 img-style" style="border: #619DC9 3px dashed; background: url('{{asset('uploads/images/'.$pago['image']) }}')">
                    <label for="image-upload" id="pago-image-label">
                            <i class="ni ni-cloud-download-95 i-img"></i></label>
                    <input type="file" name="image" id="pago-image" accept="image/png, image/jpeg" />
                    <input type="hidden" name="imageurl" value="{{ $pago['image'] }}">
                    <input type="hidden" class="imgBase64" name="imgBase64">
                </div>
                <a href="javascript:" class="removeImg" role="button" style="font-size: 10px">Remove imagen</a>
            </div>
        </div>
    </div>
</form>

<form action="{{ route('agreement.save-images') }}" method="post" id="pago_add" enctype="multipart/form-data" class="row">
    <div class="col-12">
        <hr class="my-4">
    </div>
    <div class="col-6">
        <h5>IMAGEN</h5>
        <div style="" id="pago-image-preview-sub" class="image-preview-class">
            <label for="image-upload" id="pago-image-label-sub">
                <i class='ni ni-cloud-download-95 i-img'></i></label>
            <input type="file" name="pago_image" id="pago-image-sub" class="pago-image" accept="image/png, image/jpeg" />
            <input type="hidden" class="imgBase64" name="imgBase64">
        </div>
    </div>
    <div class="col-6 text-right">
        <div class="form-group">
            <button type="button" id="btn-addpago" class="btn btn-primary" data-loading-text="<i class='fa fa-spinner'></i> {{ __('Agregando...') }}"> Agregar</button>
        </div>
    </div>
    <div class="col-12">
        <h2>Pagos</h2>
    </div>
    <div class="col-12">
        <ul class="sortable pago-sort">
            @if(!empty($pago['content'])) @foreach($pago['content'] as $key => $item)
            <li data-img="{{ $item['img'] }}">
                <div class="box-image nostatus">
                    <button type="button" class="btn btn-success btn-sm pull-right conv-delete">x</button>
                    <img src="{{ $item['img'] }}" width="100%">
                </div>
            </li>
            @endforeach @endif
        </ul>
    </div>
</form>