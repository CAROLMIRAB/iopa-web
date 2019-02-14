<form action="" method="post" id="isapre" enctype="multipart/form-data">
    <div class="row">
        <div class="col-8 text-left">
            <h2 class="mb-0">{{ __('Isapres') }}</h2>
        </div>
        <div class="col-4 text-right">
            <button id="isapre-btn-save" class="btn  btn-primary" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Guardando...') }}">{{ __('Guardar Cambios') }}</button>
        </div>
        <div class="col-12">
            <hr class="my-4">
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="isapre-title">{{ __('Titulo') }}</label>
                <input id="isapre-title" name="isapre-title" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="isapre-description">{{ __('Descripción') }}</label>
                <textarea id="isapre-description" name="isapre-description" class="form-control"></textarea>
            </div>
        </div>
    </div>
    <div class="">
        <div class="row">
            <div class="col-4">
                <div style="" id="isapre-image-preview" class="table-img-prev" class="">
                    <label for="image-upload" id="isapre-image-label"><i class='ni ni-cloud-download-95'></i></label>
                    <input type="file" name="isapre-image" id="isapre-image" class="isapre-image" accept="image/png, image/jpeg" />
                </div>
            </div>
            <div class="col-4">
                <ul class="is-ges">
                    <li><input type="text" name="isapre-ges[]" />
                        <a class="add-ges-inp">
                            <i class="ni ni-fat-add " style="font-size: 22px"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-4">
                <ul class="is-cu">
                    <li><input type="text" name="isapre-cuenta[]" />
                        <a class="add-cu-inp">
                            <i class="ni ni-fat-add " style="font-size: 22px"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-12 text-center">
                <div class="form-group">
                    <button type="button" class="btn btn-primary"> Agregar</button>
                </div>
            </div>
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

                            </td>
                            <td width="30%">

                            </td>
                            <td width="30%">

                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</form>