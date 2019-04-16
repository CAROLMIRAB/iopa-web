<div class="row">
    <div class="col-8 text-left">
        <h2 class="mb-0">{{ __('Sobre Nosotros') }}</h2>
    </div>
    <div class="col-4 text-right">
        <button id="aboutus-btn-save" class="btn  btn-primary" type="button" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Guardando...') }}">{{ __('Guardar Cambios') }}</button>
    </div>
    <div class="col-12">
        <hr class="my-4">
    </div>
</div>
<form action="{{ route('core.save-aboutus') }}" method="post" id="aboutus_add" enctype="multipart/form-data">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="aboutus-description">{{ __('Descripción') }}</label>
                <textarea id="aboutus-description" name="aboutus_description" class="form-control">{{ isset($aboutus['content']['description']) ? $aboutus['content']['description'] : '' }}</textarea>
            </div>

        </div>
    </div>
    <input type="hidden" name="slug" id="aboutus-slug" value="aboutus">
</form>