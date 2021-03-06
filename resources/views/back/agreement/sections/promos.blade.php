<form action="{{ route('agreement.save-promo') }}" method="post" id="promo" enctype="multipart/form-data">
    <div class="row">
        <div class="col-8 text-left">
            <h2 class="mb-0">{{ __('Promociones, Campañas o Descuentos') }}</h2>
        </div>
        <div class="col-4 text-right">
            <button id="promo-btn-save" class="btn  btn-primary" type="button" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Guardando...') }}">{{ __('Guardar Cambios') }}</button>
        </div>
        <div class="col-12">
            <hr class="my-4">
        </div>
        <div class="col-8">
            <div class="form-group">
                <label for="promo-title">{{ __('Titulo') }}</label>
                <input id="promo-title" name="promo_title" class="form-control" value="{{ isset($promo['name']) ? $promo['name'] : ''  }}">
                <input id="promo-slug" name="slug" value="promociones" class="hidden" type="hidden">
            </div>
            <div class="form-group">
                <label for="promo-description">{{ __('Descripción') }}</label>
                <textarea id="promo-description" name="promo_description" class="form-control">{{ isset($promo['description']) ? $promo['description'] : '' }}</textarea>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="status">{{ __('Estado') }}</label>
                <select id="promo-status" name="status" class="form-control">
                                        <option value="ACTIVE">Publicado</option>
                                        <option value="INACTIVE">No publicado</option>
                                    </select>
            </div>
            <div class="form-group ">
                <label for="image">{{ __('Imagen') }}</label>
                <div id="promo-image-preview" class="image-preview-class2 img-style" style="border: #619DC9 3px dashed; background: url('{{asset('uploads/images/'.$promo['image']) }}'); background-size: cover; background-position: center center;">
                    <label for="image-upload" id="promo-image-label">
                            <i class="ni ni-cloud-download-95 i-img"></i></label>
                    <input type="file" name="image" id="promo-image" accept="image/png, image/jpeg" />
                    <input type="hidden" name="imageurl" value="{{ $promo['image'] }}">
                    <input type="hidden" class="imgBase64" name="imgBase64">
                </div>
                <a href="javascript:" class="removeImg" role="button" style="font-size: 10px">Remove imagen</a>
            </div>
        </div>
    </div>
</form>