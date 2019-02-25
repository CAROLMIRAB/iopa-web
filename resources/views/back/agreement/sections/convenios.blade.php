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
        <form action="{{ route('agreement.save-images') }}" method="post" id="convenios" class="row" enctype="multipart/form-data">
            <div class="col-6">
                <div style="" id="convenio-image-preview" class="image-preview-class">
                    <label for="image-upload" id="convenio-image-label">
                        <i class='ni ni-cloud-download-95 i-img'></i></label>
                    <input type="file" name="convenio_image" id="convenio-image" class="convenio-image" accept="image/png, image/jpeg" />
                </div>
            </div>
            <div class="col-6 text-right">
                <div class="form-group">
                    <button type="button" id="btn-addconvenio" class="btn btn-primary" data-loading-text="<i class='fa fa-spinner'></i> {{ __('Agregando...') }}"> Agregar</button>
                </div>
            </div>

            {{ csrf_field() }}
        </form>
    </div>
    <div class="col-12">
        <h2>Drag Boxes Around</h2>
        <ul class="clearfix" id="sortable">
            <li>
                <div class="box-image nostatus">
                    <h4>Project Title</h4>
                    <p>Here is a short description of a basic project</p>
                </div>
            </li>
            <li>
                <div class="box-image nostatus">
                    <h4>Project Title</h4>
                    <p>Here is a short description of a basic project</p>
                </div>
            </li>
            <li>
                <div class="box-image nostatus">
                    <h4>Project Title</h4>
                    <p>Here is a short description of a basic project</p>
                </div>
            </li>
        </ul>
    </div>
</div>