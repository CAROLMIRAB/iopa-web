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
        <div class="col-12">
            <div class="form-group">
                <label for="fonasa-title">{{ __('Titulo') }}</label>
                <input id="fonasa-title" name="fonasa-title" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="fonasa-description">{{ __('Descripción') }}</label>
                <textarea id="fonasa-description" name="fonasa-description" class="form-control"></textarea>
            </div>
        </div>
    </div>
    <div class="field_wrapper">
        <div class="field_row row">
            <div class="col-12">
                <table class="table align-items-center table-flush table-isapres" style="width: 100%">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ISAPRES</th>
                            <th scope="col">GES</th>
                            <th scope="col">CUENTA CONOCIDA</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="40%">
                                <div style="" id="isapre-image-preview" class="table-img-prev" class="">
                                    <label for="image-upload" id="isapre-image-label"><i class='ni ni-cloud-download-95'></i></label>
                                    <input type="file" name="isapre-image" id="isapre-image" class="isapre-image" accept="image/png, image/jpeg" />
                                </div>
                            </td>
                            <td width="25%">
                                <ul class="is-ges">
                                    <li><input type="text" name="isapre-ges[]" />
                                        <a   class="add-ges-inp">
                                                <i class="ni ni-fat-add " style="font-size: 22px"></i>
                                        </a>
                                    </li>
                                </ul>
                            </td>
                            <td width="25%">
                                <ul class="is-cu">
                                    <li><input type="text" name="isapre-cuenta[]" />
                                        <a class="add-cu-inp">
                                            <i class="ni ni-fat-add " style="font-size: 22px"></i>
                                        </a>
                                    </li>
                                </ul>
                            </td>
                            <td width="10%">
                                <button type="button" class="btn btn-icon btn-2 btn-primary add_tr">
                                    <i class="ni ni-fat-add" style="font-size: 18px"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</form>