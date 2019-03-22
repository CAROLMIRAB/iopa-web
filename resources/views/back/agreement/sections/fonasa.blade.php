<form action="{{ route('agreement.save-fonasa') }}" method="post" id="fonasa" enctype="multipart/form-data">
    <div class="row">
        <div class="col-8 text-left">
            <h2 class="mb-0">{{ __('Fonasa') }}</h2>
        </div>
        <div class="col-4 text-right">
            <button id="fonasa-btn-save" class="btn  btn-primary" type="button" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Guardando...') }}">{{ __('Guardar Cambios') }}</button>
        </div>
        <div class="col-12">
            <hr class="my-4">
        </div>
        <div class="col-8">
            <div class="form-group">
                <label for="fonasa-title">{{ __('Titulo') }}</label>
                <input id="fonasa-title" name="fonasa_title" class="form-control" value="{{ isset($fonasa['name']) ? $fonasa['name'] : ''  }}">
                <input name="slug" value="fonasa" class="form-control hidden" type="hidden">
            </div>
            <div class="form-group">
                <label for="fonasa-description">{{ __('Descripción') }}</label>
                <textarea id="fonasa-description" name="fonasa_description" class="form-control">{{ isset($fonasa['description']) ? $fonasa['description'] : '' }}</textarea>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="status">{{ __('Estado') }}</label>
                <select id="status" name="status" class="form-control">
                                        <option value="ACTIVE">Publicado</option>
                                        <option value="INACTIVE">No publicado</option>
                                    </select>
            </div>
            <div class="form-group ">
                <label for="image">{{ __('Imagen') }}</label>
                <div id="image-preview" class="img-style" style="border: #619DC9 3px dashed;  background: url('{{asset('uploads/images/'.$fonasa['image']) }}'); background-size: cover; background-position: center center;">
                    <label for="image-upload" id="image-label">
                        <i class="ni ni-cloud-download-95 i-img"></i></label>
                    <input type="file" name="image" id="fonasa-image" accept="image/png, image/jpeg" />
                    <input type="hidden" name="imageurl" value="{{ $fonasa['image'] }}">
                    <input type="hidden" class="imgBase64" name="imgBase64">
                </div>
                <a href="javascript:" class="removeImg" role="button" style="font-size: 10px">Remove imagen</a>
            </div>
        </div>
    </div>
</form>

<form action="{{ route('agreement.save-subfonasa') }}" method="post" id="fonasa_add" enctype="multipart/form-data" data-route="{{ route('agreement.min-fonasa') }}">
    <div class="field_row row">
        <div class="col-12">
            <hr class="my-4">
        </div>
        <div class="col-10">
            <div class="form-group form-group-sm">
                <label for="fonasa-subtitle">{{ __('Titulo') }}</label>
                <input id="fonasa-subtitle" name="fonasa_subtitle" class="form-control">
                <input id="fonasa-slug" name="fonasa_slug" value="fonasa" class="form-control hidden" type="hidden">
            </div>
            <div class="form-group form-group-sm">
                <textarea id="fonasa-subdescription" name="fonasa_subdescription" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <label for="subadd">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</label>
                <button id="btn-addfonasa" class="btn btn-icon btn-2 btn-primary btn-sm" type="button" data-loading-text="<i class='fa fa-spinner' aria-hidden='true'></i>Agregando...">
                    <span class="btn-inner--icon">
                       Agregar
                    </span>
                </button>
            </div>
        </div>
        <div class="col-12">
            <table class="table align-items-center table-flush table-fonasa" style="width: 100%">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" width="20%">TITULO</th>
                        <th scope="col" width="75%">DESCRIPCIÓN</th>
                        <th scope="col" width="5%"></th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($fonasa['content'])) @foreach ($fonasa['content'] as $key => $item)
                    <tr>
                        @foreach ($item as $ky => $it)
                        <td width="20%">
                            {{ $it['subtitle'] }}
                        </td>
                        <td width="75%" style="white-space: normal">
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