<form action="" method="post" id="fonasa" enctype="multipart/form-data">
    <div class="row">
        <div class="col-8 text-left">
            <h2 class="mb-0">{{ __('Fonasa') }}</h2>
        </div>
        <div class="col-4 text-right">
            <button id="fonasa-btn-save" class="btn  btn-primary" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Guardando...') }}">{{ __('Guardar Cambios') }}</button>
        </div>
        <div class="col-12">
            <hr class="my-4">
        </div>
        <div class="col-8">
            <div class="form-group">
                <label for="fonasa-title">{{ __('Titulo') }}</label>
                <input id="fonasa-title" name="fonasa_title" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="fonasa-description">{{ __('Descripción') }}</label>
                <textarea id="fonasa-description" name="fonasa-description" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group ">
                <label for="image">{{ __('Imagen') }}</label>
                <div id="image-preview" style="border: #619DC9 3px dashed;">
                    <label for="image-upload" id="image-label"><img class="" src="{{ asset('back/img') }}/cloud-upload.png" width="60" height="60"/></label>
                    <input type="file" name="fonasa-image" id="fonasa-image" accept="image/png, image/jpeg" />
                </div>
            </div>
        </div>
    </div>
</form>
<div class="field_wrapper">
    <div class="field_row row">
        <div class="col-11">
            <div class="form-group form-group-sm">
                <label for="fonasa-subtitle">{{ __('Titulo') }}</label>
                <input id="fonasa-subtitle" name="fonasa_subtitle[]" class="form-control">
                <input id="fonasa-slug" name="fonasa_slug" class="form-control">
            </div>
            <div class="form-group form-group-sm">
                <textarea id="fonasa-subdescription" name="fonasa_subdescription[]" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-1">
            <div class="form-group">
                <label for="subadd">{{ __(' ') }}</label>
                <button id="subadd" class="btn btn-icon btn-2 btn-primary add_button" type="button">
                    <span class="btn-inner--icon">
                        <i class="ni ni-fat-add" style="font-size: 18px"></i>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>