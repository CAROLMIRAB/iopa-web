@extends('back.theme') 
@section('content')
<form action="{{ route('office.edit') }}" method="post" id="office" enctype="multipart/form-data" class="row">
	<div class="col-xl-8 mb-5 mb-xl-0">
		<div class="card shadow">
			<div class="card-header bg-transparent">
				<div class="row align-items-center">
					<div class="col-8">
						<h6 class="text-uppercase text-muted ls-1 mb-1">Sucursal</h6>
						<h2 class="mb-0">{{ _('Editar Sucursal') }}</h2>
					</div>
					<div class="col-4 text-right">
						<button id="btn-save" class="btn btn-sm btn-primary" type="button" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Publicando...') }}">{{ __('Guardar Cambios') }}</button>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="form-group">
				<input size="65" type="text" value="{{ $office->slug }}" name="slug" id="slug" class="slug hidden" readonly data-route="{{ route('core.slug-create') }}">
					<div class="example-text">
						<span class="url-example"><strong> Url:</strong> 
									<a href="{{ $office->slug_url }}" data-slug="{{ route('office.viewalloffices') }}" id="slug-url">{{ $office->slug_url }}</a></span>
					</div>
				</div>
				<div class="form-group">
					<label for="name">{{ __('Nombre') }}</label>
				<input type="text" name="name" id="name" value="{{ $office->name }}" class="form-control" data-slugit-target="#slug">
					<p class="invalid-feedback"></p> 
				</div>
				<div class="form-group">
					<label for="map">{{ __('Mapa Incrustado') }}</label>
					<textarea id="map" name="map" class="form-control">{{ $office->map }}</textarea>
				</div>
				<div class="form-group">
					<label for="phone">{{ __('Teléfono') }}</label>
					<input id="phone" name="phone" class="form-control" value="{{ $office->phone }}"/> 
					<p class="invalid-feedback"></p> 
				</div>
				<div class="form-group">
					<label for="address">{{ __('Dirección') }}</label>
					<textarea id="address" name="address" class="form-control" >{{ $office->address }}</textarea>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-4 mb-5 mb-xl-0">
		<div class="card shadow">

			<div class="card-body">

					<div class="form-group">
							<label for="image">{{ __('Imagen') }}</label>
							<div data-toggle="modal" data-target="#modal-gallery" id="image-preview" style="background: url('{{ $office->image }}'); background-size: cover; background-position: center center; ">
									<label for="image-upload" id="image-label"><img class="" src="{{ asset('back/img/cloud-upload.png') }}" width="60" height="60"/></label>
							</div>
							<input type="hidden" id="imgBase64" class="imgBase64" name="imgBase64">
					</div>
			</div>
		</div>
    </div>
<input id="id_office" name="id_office" value="{{ $office->id }}" type="hidden" readonly>
    {{ csrf_field() }}
</form>
@endsection
 
@section('scripts')

<script>
	var image = "<img class='' src='{{ asset('back/img/cloud-upload.png') }}' width='60' height='60'/>";

	$(document).ready(function(){
		Offices.imageUpload(image); 
        Offices.eliminateMessages();
        Offices.editOffice();
	});

</script>
@endsection