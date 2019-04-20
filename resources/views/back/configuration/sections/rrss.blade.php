<form action="{{ route('core.save-rrss') }}" method="post" id="rrss_add" enctype="multipart/form-data">
<div class="row">
    <div class="col-8 text-left">
        <h2 class="mb-0">{{ __('Redes Sociales') }}</h2>
    </div>
    <div class="col-4 text-right">
        <button id="rrss-btn-save" class="btn  btn-primary" type="button" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Guardando...') }}">{{ __('Guardar Cambios') }}</button>
    </div>
    <div class="col-12">
        <hr class="my-4">
    </div>
</div>

    <div class="row">
        <div class="col-12">
            <input name="slug" id="rrss-slug" type="hidden" value="rrss">
            <div class="form-group">
                    <label for="callcenter">{{ __('Call Center') }}</label>
                    <input id="callcenter" name="callcenter" class="form-control" value="{{ isset($rrss['content']['callcenter']) ? $rrss['content']['callcenter'] : '' }}">
            </div>
            <div class="form-group">
                    <label for="whatsapp">{{ __('Whatsapp') }}</label>
                    <input id="whatsapp" name="whatsapp" class="form-control" value="{{ isset($rrss['content']['whatsapp']) ? $rrss['content']['whatsapp'] : '' }}">
            </div>
            <div class="form-group">
                <label for="facebook">{{ __('Facebook') }}</label>
                <input id="facebook" name="facebook" class="form-control" value="{{ isset($rrss['content']['facebook']) ? $rrss['content']['facebook'] : '' }}">
            </div>
            <div class="form-group">
                    <label for="youtube">{{ __('Youtube') }}</label>
                    <input id="youtube" name="youtube" class="form-control" value="{{ isset($rrss['content']['youtube']) ? $rrss['content']['youtube'] : '' }}">
            </div>
            <div class="form-group">
                    <label for="instagram">{{ __('Instagram') }}</label>
                    <input id="instagram" name="instagram" class="form-control" value="{{ isset($rrss['content']['instagram']) ? $rrss['content']['instagram'] : '' }}">
            </div>        
        </div>
    </div>
</form>