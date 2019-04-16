<div class="row">
    <div class="col-8 text-left">
        <h2 class="mb-0">{{ __('Popup') }}</h2>
    </div>
    <div class="col-4 text-right">
        <button id="popup-btn-save" class="btn  btn-primary" type="button" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Guardando...') }}">{{ __('Guardar Cambios') }}</button>
    </div>
    <div class="col-12">
        <hr class="my-4">
    </div>
</div>
<form action="{{ route('core.save-popup') }}" method="post" id="popup_add" enctype="multipart/form-data">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="status">{{ __('Estado') }}</label>
                <select id="popup-status" name="status" class="form-control">
                     <option value="PUBLISHED" {{ (isset($popup['content']['status'])) ? ($popup['content']['status'] == 'PUBLISHED') ? 'selected' : ''  : '' }} >Publicado</option>
                     <option value="DRAFT" {{ (isset($popup['content']['status'])) ? ($popup['content']['status'] == 'DRAFT') ? 'selected' : '' : '' }} >No Publicado</option>
                </select>
            </div>
            <div class="form-group">
                <label for="popup-description">{{ __('Descripción') }}</label>
                <textarea id="popup-description" name="popup_description" class="form-control">{{ isset($popup['content']['description']) ? $popup['content']['description'] : '' }}</textarea>
            </div>

        </div>
    </div>
    <input type="hidden" name="slug" id="popup-slug" value="popup">
</form>