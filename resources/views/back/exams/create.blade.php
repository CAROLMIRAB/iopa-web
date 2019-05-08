@extends('back.theme') 
@section('content')
<form action="{{ route('exam.store') }}" method="post" id="exam" enctype="multipart/form-data" class="row">
	<div class="col-xl-8 mb-5 mb-xl-0">
		<div class="card shadow">
			<div class="card-header bg-transparent">
				<div class="row align-items-center">
					<div class="col-8">
						<h6 class="text-uppercase text-muted ls-1 mb-1">Exámenes</h6>
						<h2 class="mb-0">{{ _('Nueva Examen') }}</h2>
					</div>
					<div class="col-4 text-right">
						<button id="btn-save" class="btn btn-sm btn-primary" type="button" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Publicando...') }}">{{ __('Guardar Cambios') }}</button>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="form-group">
					<input size="65" type="text" name="slug" id="slug" class="slug hidden" readonly data-route="{{ route('core.slug-create') }}">
					<div class="example-text">
						<span class="url-example"><strong> Url:</strong> 
									<a href="" data-slug="{{ route('exam.viewallexams') }}" id="slug-url">{{ route('exam.viewallexams') }}/</a></span>
					</div>
				</div>
				<div class="form-group">
					<label for="name">{{ __('Título') }}</label>
					<input type="text" name="name" id="name" class="form-control" 
					 data-slugit-target="#slug"> 
					<p class="invalid-feedback"></p> 
				</div>

				<div class="form-group">
					<label for="name">{{ __('Código') }}</label>
					<input type="text" name="code" id="code" class="form-control"> 
					
				</div>
				<div class="form-group">
					<label for="body">{{ __('Descripción') }}</label>
					<textarea id="description" name="description" class="form-control summernote"></textarea>
				</div>
				<div class="form-group">
					<label for="body">{{ __('Preparación') }}</label>
					<textarea id="preparation" name="preparation" class="form-control summernote"></textarea>
				</div>
				<div class="form-group">
					<label for="body">{{ __('Indicaciones') }}</label>
					<textarea id="indications" name="indications" class="form-control summernote"></textarea>
				</div>
				<div class="form-group">
					<label for="office">{{ __('Sucursales') }}</label>
					<select name="office[]" id="office" class="form-control" data-route="{{ route('office.find-office')}}" > 				
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
	$.ajaxSetup({
		headers: {
    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	var image = "<img class='' src='{{ asset('back/img') }}/cloud-upload.png' width='60' height='60'/>";
	$(document).ready(function(){
	Exams.slug();
	Exams.editHTML();
	Exams.createExam();
	Exams.imageUpload(image); 
	Offices.selectOffice();
	});

</script>
@endsection