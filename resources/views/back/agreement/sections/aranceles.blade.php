<form action="{{ route('agreement.save-arancel') }}" method="post" id="arancel" enctype="multipart/form-data">
    <div class="row">
        <div class="col-8 text-left">
            <h2 class="mb-0">{{ __('Aranceles') }}</h2>
        </div>
        <div class="col-4 text-right">
            <button id="arancel-btn-save" class="btn  btn-primary" type="button" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Guardando...') }}">{{ __('Guardar Cambios') }}</button>
        </div>
        <div class="col-12">
            <hr class="my-4">
        </div>
        <div class="col-8">
            <div class="form-group">
                <label for="arancel-title">{{ __('Titulo') }}</label>
                <input id="arancel-title" name="arancel_title" class="form-control" value="{{ isset($arancel['name']) ? $arancel['name'] : ''  }}">
                <input id="arancel-slug" name="arancel_slug" value="arancels" class="hidden" type="hidden">
            </div>
            <div class="form-group">
                <label for="arancel-description">{{ __('Descripción') }}</label>
                <textarea id="arancel-description" name="arancel_description" class="form-control">{{ isset($arancel['description']) ? $arancel['description'] : '' }}</textarea>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group ">
                <label for="image">{{ __('Imagen') }}</label>
                <div id="arancel-image-preview" class="image-preview-class2" style="border: #619DC9 3px dashed;">
                    <label for="image-upload" id="arancel-image-label">
                            <i class="ni ni-cloud-download-95 i-img"></i></label>
                    <input type="file" name="image" id="arancel-image" accept="image/png, image/jpeg" />
                </div>
            </div>
        </div>
    </div>
</form>
<form action="" method="post" id="arancel_add" enctype="multipart/form-data" data-route="">
    <div class="field_row row">
        <div class="col-10">
            <div class="form-group form-group-sm">
                <label for="arancel-subtitle">{{ __('Titulo') }}</label>
                <input id="arancel-subtitle" name="arancel_subtitle" class="form-control">
                <input id="arancel-slug" name="arancel_slug" value="arancel" class="form-control hidden" type="hidden">
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <label for="subadd">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</label>
                <button id="btn-addarancel" class="btn btn-icon btn-2 btn-primary btn-sm" type="button" data-loading-text="<i class='fa fa-spinner' aria-hidden='true'></i>Agregando...">
                        <span class="btn-inner--icon">
                           Agregar
                        </span>
                    </button>
            </div>
        </div>
        <div class="col-12">
            <table class="table align-items-center table-flush table-arancel" style="width: 100%">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" width="20%">TITULO</th>
                        <th scope="col" width="75%">DESCRIPCIÓN</th>
                        <th scope="col" width="5%"></th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($arancel['content'])) @foreach ($arancel['content'] as $key => $item)
                    <tr>
                        @foreach ($item as $ky => $it)
                        <td width="20%">
                            {{ $it['subtitle'] }}
                        </td>
                        <td width="75%">
                            {{ $it['subdescription'] }}
                        </td>
                        <td width="5%">
                            <button class="btn btn-primary btn-sm min-tr-fon" data-key="{{ $ky }}"><i class="ni ni-fat-delete" style="font-size: 18px"></i> </button>
                        </td>
                        @endforeach
                    </tr>
                    @endforeach @endif
                </tbody>
            </table>
        </div>
    </div>
</form>