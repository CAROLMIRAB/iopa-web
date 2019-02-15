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
                <input id="isapre_slug" name="slug" class="form-control hidden" value="isapres" type="hidden">
                <label for="isapre-title">{{ __('Titulo') }}</label>
                <input id="isapre_title" name="isapre_title" class="form-control">
            </div>
            <div class="form-group">
                <label for="isapre-description">{{ __('Descripción') }}</label>
                <textarea id="isapre_description" name="isapre_description" class="form-control"></textarea>
            </div>
        </div>
    </div>
</form>


<form action="{{ route('agreement.save-ges') }}" method="post" id="isapre_add" enctype="multipart/form-data" class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="isapre-title">{{ __('Titulo') }}</label>
            <input id="isapre-accounttitle input-sm" name="account_title" class="form-control">
        </div>
    </div>
    <div class="col-4">
        <div style="" id="isapre-image-preview" class="table-img-prev" class="">
            <label for="image-upload" id="isapre-image-label"><i class='ni ni-cloud-download-95'></i></label>
            <input type="file" name="isapre_image" id="isapre-image" class="isapre-image" accept="image/png, image/jpeg" />
        </div>
    </div>
    <div class="col-4">
        <ul class="is-ges">
            <li>
                <div class="input-group input-group-sm mb-3">
                    <input type="text" class="form-control input-sm" name="isapreges[]" placeholder="" aria-label="" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary add-ges-inp" type="button"><i class="ni ni-fat-add " style=""></i></button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="col-4">
        <ul class="is-cu">
            <li>
                <div class="input-group input-group-sm mb-3">
                    <input type="text" class="form-control " name="isaprecuenta[]" placeholder="" aria-label="" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary add-cu-inp" type="button"><i class="ni ni-fat-add " style=""></i></button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="col-12 text-center">
        <div class="form-group">
            <button type="button" id="btn-addisapre" class="btn btn-primary"> Agregar</button>
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
    {{ csrf_field() }}
</form>