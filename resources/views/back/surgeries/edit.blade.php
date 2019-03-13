@extends('back.theme') 
@section('content')
<form action="{{ route('surgery.edit') }}" method="post" id="surgery" enctype="multipart/form-data" class="row">
	<div class="col-xl-8 mb-5 mb-xl-0">
		<div class="card shadow">
			<div class="card-header bg-transparent">
				<div class="row align-items-center">
					<div class="col-8">
						<h6 class="text-uppercase text-muted ls-1 mb-1">Cirugías</h6>
						<h2 class="mb-0">{{ _('Editar Cirugía') }}</h2>
					</div>
					<div class="col-4 text-right">
						<button id="btn-save" class="btn btn-sm btn-primary" type="button" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Publicando...') }}">{{ __('Guardar Cambios') }}</button>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="form-group">
				<input size="65" type="text" name="slug" id="slug" value="{{ $surgery->slug }}" class="slug hidden" readonly data-route="{{ route('core.slug-create') }}">
					<div class="example-text">
					<span class="url-example"><strong> Url:</strong> 
						<a target="_blank" href="{{ $surgery->slug_url }}" data-slug="{{ route('surgery.viewallsurgeries') }}" id="slug-url">{{ $surgery->slug_url }}</a></span></div>
				</div>
				<div class="form-group">
					<label for="name">{{ __('Título') }}</label>
					<input type="text" name="name" id="name" value="{{ $surgery->name }}" class="form-control"
				data-slugit-target="#slug" > 
					<p class="invalid-feedback"></p> 
				</div>
				<div class="form-group">
					<label for="body">{{ __('Descripción') }}</label>
				<textarea id="description" name="description" class="form-control summernote">{{ $surgery->description }}</textarea>
				</div>
				<div class="form-group">
					<label for="body">{{ __('Preparación') }}</label>
					<textarea id="preparation" name="preparation" class="form-control summernote">{{ $surgery->preparation }}</textarea>
				</div>
				<div class="form-group">
					<label for="body">{{ __('Indicaciones') }}</label>
					<textarea id="indications" name="indications" class="form-control summernote">{{ $surgery->indications }}</textarea>
				</div>
				<div class="form-group">
					<label for="office">{{ __('Sucursales') }}</label>
					<select name="office[]" id="office" class="form-control" data-route="{{ route('office.find-office')}}" multiple="multiple">  
						@foreach ($officessurgery as $os)
							<option selected="selected" value="{{ $os->office_id }}">{{ $os->name }}</option>
						@endforeach
						@foreach ($offices as $item)
							<option value="{{ $item->id }}">{{ $item->name }}</option>
						@endforeach
					</select>
					<p class="invalid-feedback"></p> 

				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-4 mb-5 mb-xl-0">
		<div class="card shadow">
			<div class="card-body">
				<div class="form-group">
					<label for="status">{{ __('Estado') }}</label>
					<select id="status" name="status" class="form-control">
								<option value="PUBLISHED">Publicado</option>
								<option value="DRAFT">Borrador</option>
							</select>
				</div>
				<div class="form-group">
					<label for="image">{{ __('Imagen') }}</label>
					<div id="image-preview" style="border: #619DC9 3px dashed; background-image: url('{{ $surgery->image }}'); background-size: cover; background-position: center center; ">
						<label for="image-upload" id="image-label"><img class="" src="{{ asset('back/img') }}/cloud-upload.png" width="60" height="60"/></label>
						<input type="file" name="image" id="image" accept="image/png, image/jpeg" />
					</div>
				</div>

			</div>


		</div>
	</div>
	<input id="id_surgery" name="id_surgery" type="hidden" value="{{ $surgery->id }}">
	{{ csrf_field() }}

</form>
@endsection
 
@section('scripts')
<script>
	$.ajaxSetup({
		headers: {
    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	var image = "<img class='' src='{{ asset('back/img') }}/cloud-upload.png' width='60' height='60'/>";
	$(document).ready(function(){
	Surgery.slug();
	Surgery.editHTML();
	Surgery.imageUpload(image); 
	Surgery.editSurgery();
	Offices.selectOfficeEdit();
	});

</script>
@endsection