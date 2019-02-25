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
    <form action="{{ route('agreement.save-images') }}" method="post"  id="my-awesome-dropzone" class="dropzone needsclick dz-clickable" enctype="multipart/form-data">
            {{ csrf_field() }}
        </form>
    </div>
    <div class="col-12">
        <form action="{{ route('agreement.save-images') }}" method="post"  id="my-awesome-dropzone" class="dropzone needsclick dz-clickable" enctype="multipart/form-data">
                {{ csrf_field() }}
            </form>
        </div>
</div>

