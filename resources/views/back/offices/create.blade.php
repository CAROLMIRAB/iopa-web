@extends('back.theme') 
@section('content')
<form action="{{ route('office.store') }}" method="post" id="office" enctype="multipart/form-data" class="row">
	<div class="col-xl-8 mb-5 mb-xl-0">
		<div class="card shadow">
			<div class="card-header bg-transparent">
				<div class="row align-items-center">
					<div class="col-8">
						<h6 class="text-uppercase text-muted ls-1 mb-1">Sucursal</h6>
						<h2 class="mb-0">{{ _('Nueva Sucursal') }}</h2>
					</div>
					<div class="col-4 text-right">
						<button id="btn-save" class="btn btn-sm btn-primary" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Publicando...') }}">{{ __('Guardar Cambios') }}</button>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="form-group">
					<input size="65" type="text" name="slug" id="slug" class="slug hidden" readonly data-route="{{ route('core.slug-create') }}">
					<div class="example-text">
						<span class="url-example"><strong> Url:</strong> 
							<a href="" data-slug="{{ route('office.viewalloffices') }}" id="slug-url">{{ route('office.viewalloffices') }}/</a></span>
					</div>
				</div>
				<div class="form-group">
					<label for="name">{{ __('Nombre') }}</label>
					<input type="text" name="name" id="name" class="form-control" data-slugit-target="#slug">
					<p class="invalid-feedback"></p> 
				</div>
				<div class="form-group">
					<label for="map">{{ __('Mapa Incrustado') }}</label>
					<textarea id="map" name="map" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label for="phone">{{ __('Teléfono') }}</label>
					<input id="phone" name="phone" class="form-control" /> 
					<p class="invalid-feedback"></p> 
				</div>
				<div class="form-group">
					<label for="address">{{ __('Dirección') }}</label>
					<textarea id="address" name="address" class="form-control"></textarea>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-4 mb-5 mb-xl-0">
		<div class="card shadow">

			<div class="card-body">

				<div class="form-group">
					<label for="image">{{ __('Imagen') }}</label>
					<div id="image-preview" style="border: #619DC9 3px dashed;">
						<label for="image-upload" id="image-label"><img class="" src="{{ asset('back/img') }}/cloud-upload.png" width="60" height="60"/></label>
						<input type="file" name="image" id="image" accept="image/png, image/jpeg" />
						<input type="hidden" class="imgBase64" name="imgBase64">
					</div>
				</div>
			</div>
		</div>
	</div>
	{{ csrf_field() }}
</form>
@endsection
 
@section('scripts')

<script>
	var image = "<img class='' src='{{ asset('back/img') }}/cloud-upload.png' width='60' height='60'/>";

	$(document).ready(function(){
		Offices.slug();
		Offices.imageUpload(image); 
		Offices.eliminateMessages();
		Offices.createOffice();
	});

</script>
@endsection