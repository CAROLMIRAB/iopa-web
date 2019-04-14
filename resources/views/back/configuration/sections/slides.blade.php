<div class="row">
    <div class="col-8 text-left">
        <h2 class="mb-0">{{ __('Slides') }}</h2>
    </div>
    <div class="col-4 text-right">
    <button id="slide-btn-save" class="btn  btn-primary " type="button" data-url="{{ route('core.save-slides') }}" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Guardando...') }}">{{ __('Guardar Cambios') }}</button>
    </div>
    <div class="col-12">
        <hr class="my-4">
    </div>
    <div class="col-12 pull-right">
        <button data-toggle="modal" data-target="#modal-addslide" id="btnmodalslide"  class="btn  btn-success  pull-right">Agregar Slides</button>
    </div>
    <div class="col-12">
        <h2>Slides Agregados</h2>
    </div>
    <div class="col-12">
        <ul id="sortable" class="sortable sortable-slide conv-sort">
            @if(!empty($slide['content'])) 
            @foreach($slide['content'] as $key => $item)
        <li data-img="{{ $item['img'] }}" data-desc="{{ $item['description'] }}" style="background: url('{{ $item['img'] }}') ">
                <div class="box-image nostatus">
                    <button type="button" class="btn btn-success btn-sm pull-right slide-delete">x</button>
                    <div class="box-text">{{ $item['description'] }}</div>
                </div>
            </li>
            @endforeach @endif
        </ul>
    </div>
</div>


<div class="modal fade" id="modal-addslide" tabindex="-1" role="dialog" aria-labelledby="modal-addslide" aria-hidden="true">
	<div class="modal-dialog  modal-dialog-centered modal-" role="document">
		<div class="modal-content ">

			<div class="modal-header">
				<h6 class="modal-title" id="modal-title-notification"></h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
			</div>

			<div class="modal-body">

                <form action="{{ route('core.save-images') }}" method="post" id="slide_add" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div  id="slide-image-preview" class="image-preview-class">
                                    <label for="image-upload" id="slide-image-label">
                                        <i class='ni ni-cloud-download-95 i-img'></i></label>
                                    <input type="file" name="image" id="slide-image" class="convenio-image" accept="image/png, image/jpeg" />
                                    <input type="hidden" class="imgBase64" name="imgBase64">
                                    <input type="hidden" name="slide_slug" id="slide-slug" value="slides">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" name="slide_description" id="slide-description"></textarea>
                        </div>
                        <div class="col-2 text-right">
                          
                        </div>
                        
                    </div>

				<div class="modal-footer">
					<button type="button" class="btn  btn-primary" data-dismiss="modal">Cerrar</button>
                   
                        <button type="button" id="btn-addslide" class="btn btn-primary" data-loading-text="<i class='fa fa-spinner'></i> {{ __('Agregando...') }}"> Agregar</button>
                

				</div>
            </form>
			</div>
		</div>
	</div>
</div>