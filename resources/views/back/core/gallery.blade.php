<div class="modal fade" id="modal-gallery" tabindex="-1" role="dialog" aria-labelledby="modal-gallery" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-" role="document" style="min-width: 50%; width: 80%;">
        <div class="modal-content ">
                <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-gallery"></h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                    </div>
                <div class="col-xl-12">
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-text" role="tablist">
                                <li class="nav-item active">
                                    <a class="nav-link mb-sm-3 mb-md-0 show tab-select-images-gallery" id="tabs-text-1-tab" data-toggle="tab" href="#tabs-text-1" role="tab" aria-controls="tabs-text-1"
                                        aria-selected="false" >{{ __('SELECCIONAR IMAGEN') }}</a>
                                </li>
    
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 tab-add-images-gallery" id="tabs-text-2-tab" data-toggle="tab" href="#tabs-text-2" role="tab" aria-controls="tabs-text-2"
                                        aria-selected="true" >{{ __('SUBIR IMAGENES') }}</a>
                                </li>
                               
                            </ul>
                        </div>
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active in" id="tabs-text-1" role="tabpanel" aria-labelledby="tabs-text-1-tab" >
                                        <div class="col-12">
                                            <ul class="sortable ui-sortable images-gallery" data-route="{{ route('core.gallery-images') }}">
                                              
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tabs-text-2" role="tabpanel" aria-labelledby="tabs-text-2-tab">
                                            <form class="form-horizontal dropzone dz-clickable" action="{{ route('core.upload-image64') }}" class="dropzone" id="gallery-dropzone" enctype="multipart/form-data" style="border: #619DC9 3px dashed;">
                                                <input id="id_base64_data" name="base64" type="hidden">
                                                <div class="dz-default dz-message"><span>Arrastra tus imágenes aquí</span></div>
                                                <div class="dz-filename"><span data-dz-name class="badge badge-success"></span></div>
                                                {{ csrf_field() }}
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
               
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-primary" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="btn-select-gallery" class="btn btn-primary" value="Aceptar" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Cargando Imagen..."> Seleccionar</button>

                </div>
        </div>
    </div>
</div>