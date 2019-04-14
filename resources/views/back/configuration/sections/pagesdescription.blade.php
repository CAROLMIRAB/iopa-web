<div class="row">
    <div class="col-8 text-left">
        <h2 class="mb-0">{{ __('Extracto Páginas') }}</h2>
    </div>
    <div class="col-4 text-right">
        <button id="pages-btn-save" class="btn  btn-primary" type="button" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Guardando...') }}">{{ __('Guardar Cambios') }}</button>
    </div>
    <div class="col-12">
        <hr class="my-4">
    </div>
</div>
<form action="{{ route('agreement.save-images') }}" method="post" id="pages_add" enctype="multipart/form-data">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="specialty-description">{{ __('Descripción Especialidad') }}</label>
                <textarea id="specialty-description" name="specialty_description" class="form-control">{{ isset($aboutus['description']) ? $aboutus['description'] : '' }}</textarea>
            </div>
       
            <div class="form-group">
                <label for="exams-description">{{ __('Descripción Examenes') }}</label>
                <textarea id="exams-description" name="exams_description" class="form-control">{{ isset($aboutus['description']) ? $aboutus['description'] : '' }}</textarea>
            </div>
            <div class="form-group">
                <label for="doctors-description">{{ __('Descripción Médicos') }}</label>
                <textarea id="doctors-description" name="doctors_description" class="form-control">{{ isset($aboutus['description']) ? $aboutus['description'] : '' }}</textarea>
            </div>
            <div class="form-group">
                <label for="surgeries-description">{{ __('Descripción Cirugías') }}</label>
                <textarea id="surgeries-description" name="surgeries_description" class="form-control">{{ isset($aboutus['description']) ? $aboutus['description'] : '' }}</textarea>
            </div>
            <div class="form-group">
                <label for="offices-description">{{ __('Descripción Cirugías') }}</label>
                <textarea id="offices-description" name="offices_description" class="form-control">{{ isset($aboutus['description']) ? $aboutus['description'] : '' }}</textarea>
            </div>
            <div class="form-group">
                <label for="offices-description">{{ __('Descripción Consulta') }}</label>
                <textarea id="offices-description" name="offices_description" class="form-control">{{ isset($aboutus['description']) ? $aboutus['description'] : '' }}</textarea>
            </div>
        </div>
    </div>
</form>