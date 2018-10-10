@extends('back.theme') 
@section('content')
<div class="col-xl-12 mb-5 mb-xl-0">
	<div class="card shadow">
		<div class="card-header bg-transparent">
			<div class="row align-items-center">
				<div class="col">
					<h6 class="text-uppercase text-muted ls-1 mb-1">Post</h6>
				<h2 class="mb-0">{{ _('Agregar Nuevo Post') }}</h2>
				</div>
			</div>
		</div>
		<div class="card-body">
			<form action="{{ route('posts.store') }}" method="post" id="" enctype="multipart/form-data">
				
				<div class="form-group">
					<label for="name">{{ __('Título') }}</label>
					<input type="text" name="name" id="name" class="form-control">

				</div>
				<div class="form-group">
					<label for="slug">{{ __('URL Amigable') }}</label>
					<input type="text" name="slug" id="slug" class="form-control">
				</div>
				<div class="form-group">
					<label for="image">{{ __('Imagen') }}</label>
					<input type="file" name="image" id="image" class="form-control" accept="image/png, image/jpeg">
				</div>

				<div class="form-group">
					<label for="excerpt">{{ __('Extracto') }}</label>
					<textarea id="excerpt" name="excerpt" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label for="body">{{ __('Cuerpo') }}</label>
					<textarea id="body" name="body" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label for="status">{{ __('Estado') }}</label>
					<label><input type="radio" id="status" name="status" class="form-control"> Publicado</label>
					<label><input type="radio" id="status" name="status" class="form-control"> Borrador</label>
				</div>
				<div class="form-group">
						<label for="category_id">{{ __('Categorías') }}</label>
						<select name="category_id" id="category_id" class="form-control"> 
							
						</select>
					</div>
				<div class="form-group">
					<label for="tags">{{ __('Etiquetas') }}</label>
					<input type="text" id="tags" name="tags" class="form-control">
				</div>
				<div class="form-group">
					<button id="save" class="btn btn-sm btn-primary" type="submit">{{ __('Guardar') }}</button>
				</div>

			</form>
		</div>
	</div>
</div>
@endsection
 
@section('scripts')
<script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('vendor/summernote/summernote.min.js') }}"></script>
<script>
	$(document).ready(function(){
	    $("#name, #slug").stringToSlug({
	        callback: function(text){
	            $('#slug').val(text);
	        }
	    });
	    CKEDITOR.config.height = 400;
		CKEDITOR.config.width  = 'auto';
		CKEDITOR.replace('body');

		 $('#summernote').summernote();
	});

</script>
@endsection