<div class="row">
        <div class="col-8 text-left">
            <h2 class="mb-0">{{ __('Contacto') }}</h2>
        </div>
        <div class="col-4 text-right">
            <button id="contact-btn-save" class="btn  btn-primary" type="button" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Guardando...') }}">{{ __('Guardar Cambios') }}</button>
        </div>
        <div class="col-12">
            <hr class="my-4">
        </div>
    </div>
    <form action="{{ route('core.save-contact') }}" method="post" id="contact_add" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="contact-description">{{ __('Descripción') }}</label>

                    <textarea id="contact-description" name="contact_description" class="form-control">{{ isset($contact['content']['description']) ? $contact['content']['description'] : '' }}</textarea>
                </div>
    
            </div>
        </div>
        <input type="hidden" name="slug" id="contact-slug" value="contact">
    </form>