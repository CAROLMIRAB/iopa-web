<form action="{{ route('core.save-pagesdescription') }}" method="post" id="pages_add" enctype="multipart/form-data">
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

    <div class="row">
        <div class="col-12">
            <input name="slug" id="pages-slug" type="hidden" value="pages-description">
            <div class="form-group">
                <label for="specialty-description">{{ __('Descripción Especialidad') }}</label>
                <textarea id="specialty-description" name="specialty_description" class="form-control">{{ isset($pagesdescription['content']['page-specialty']) ? $pagesdescription['content']['page-specialty'] : '' }}</textarea>
            </div>
            <div class="form-group">
                <label for="exams-description">{{ __('Descripción Examenes') }}</label>
                <textarea id="exams-description" name="exams_description" class="form-control">{{ isset($pagesdescription['content']['page-exams']) ? $pagesdescription['content']['page-exams'] : '' }}</textarea>
            </div>
            <div class="form-group">
                <label for="doctors-description">{{ __('Descripción Médicos') }}</label>
                <textarea id="doctors-description" name="doctors_description" class="form-control">{{ isset($pagesdescription['content']['page-doctors']) ? $pagesdescription['content']['page-doctors'] : '' }}</textarea>
            </div>
            <div class="form-group">
                <label for="surgeries-description">{{ __('Descripción Cirugías') }}</label>
                <textarea id="surgeries-description" name="surgeries_description" class="form-control">{{ isset($pagesdescription['content']['page-surgeries']) ? $pagesdescription['content']['page-surgeries'] : '' }}</textarea>
            </div>
            <div class="form-group">
                <label for="offices-description">{{ __('Descripción Sucursales') }}</label>
                <textarea id="offices-description" name="offices_description" class="form-control">{{ isset($pagesdescription['content']['page-offices']) ? $pagesdescription['content']['page-offices'] : '' }}</textarea>
            </div>
            <div class="form-group">
                <label for="query-description">{{ __('Descripción Consulta') }}</label>
                <textarea id="query-description" name="query_description" class="form-control">{{ isset($pagesdescription['content']['page-query']) ? $pagesdescription['content']['page-query'] : '' }}</textarea>
            </div>
            <div class="form-group">
                    <label for="query-description">{{ __('Descripción Contacto') }}</label>
                    <textarea id="contact_description" name="contact_description" class="form-control">{{ isset($pagesdescription['content']['page-query']) ? $pagesdescription['content']['page-query'] : '' }}</textarea>
                </div>
            <div class="form-group">
                    <label for="query-description">{{ __('Descripción Formulario Contacto Solicitudes') }}</label>
                    <textarea id="contacto_description" name="contacto_description" class="form-control">{{ isset($pagesdescription['content']['page-query']) ? $pagesdescription['content']['page-query'] : '' }}</textarea>
            </div>
            <div class="form-group">
                    <label for="query-description">{{ __('Descripción Formulario Contacto Reclamos') }}</label>
                    <textarea id="contactr_description" name="contactr_description" class="form-control">{{ isset($pagesdescription['content']['page-query']) ? $pagesdescription['content']['page-query'] : '' }}</textarea>
            </div>
            <div class="form-group">
                    <label for="blog-description">{{ __('Descripción Blog') }}</label>
                    <textarea id="blog-description" name="blog_description" class="form-control">{{ isset($pagesdescription['content']['page-blog']) ? $pagesdescription['content']['page-blog'] : '' }}</textarea>
            </div>
        
        </div>
    </div>
</form>