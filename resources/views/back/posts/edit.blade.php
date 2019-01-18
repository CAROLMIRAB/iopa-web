@extends('back.theme') 
@section('content')
<form action="{{ route('post.edit') }}" method="post" id="post" enctype="multipart/form-data" class="row">
    <div class="col-xl-8 mb-5 mb-xl-0">
        <div class="card shadow">
            <div class="card-header bg-transparent">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h6 class="text-uppercase text-muted ls-1 mb-1">Noticia</h6>
                        <h2 class="mb-0">{{ _('Editar Noticia') }}</h2>
                    </div>
                    <div class="col-4 text-right">
                        <button id="btn-save" class="btn btn-sm btn-primary" type="button" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Publicando...') }}">{{ __('Guardar Cambios') }}</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                <input type="text" name="slug" id="slug" value="{{ $post->slug }}" class="slug hidden" readonly data-route="{{ route('core.slug-create') }}">
                    <div class="example-text">
                        <span class="url-example"><strong> Url:</strong> 
                        <a href="{{ $post->slug_url }}" data-slug="{{ route('post.viewposts') }}" id="slug-url">{{ $post->slug_url }}</a></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">{{ __('Título') }}</label>
                    <input type="text" name="name" id="name" value="{{ $post->name }}" class="form-control" data-slugit-target="#slug">
                    <p class="invalid-feedback"></p>
                </div>

                <div class="form-group">
                    <label for="excerpt">{{ __('Extracto') }}</label>
                    <textarea id="excerpt" name="excerpt" value="{{ $post->excerpt }}" class="form-control">{{ $post->excerpt }}</textarea>
                    <p class="invalid-feedback"></p>
                </div>
                <div class="form-group">
                    <label for="body">{{ __('Cuerpo') }}</label>
                    <textarea id="body" name="body" class="form-control summernote">{!! $post->body !!}  </textarea>
                    <p class="invalid-feedback"></p>

                </div>
                <div class="form-group">
                    <label for="category_id">{{ __('Categoría') }}</label>
                    <select name="category_id" id="category_id" class="form-control"> 
                            @foreach ($categories as $cat)
                            {{$post->category_id .'-'. $cat->id}}
                                @if($post->category_id == $cat->id)
                                    <option value="{{ $cat->id }}" selected="selected"> {{ $cat->name }}</option>
                                @else
                                    <option value="{{ $cat->id }}"> {{ $cat->name }}</option>
                                @endif
							@endforeach
					</select>
                </div>
                <div class="form-group">
                    <label for="tags">{{ __('Etiquetas') }}</label>
                    <input type="text" id="tags" name="tags" value="{{ $post->tag }}" class="form-control">
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
                    <div id="image-preview" style="border: #619DC9 3px dashed; background-image: url('{{ $image }}'); background-size: cover; background-position: center center; ">
                        <label for="image-upload" id="image-label"><img class="" src="{{ asset('back/img') }}/cloud-upload.png" width="60" height="60"/></label>
                        <input type="file" name="image" id="image" accept="image/png, image/jpeg" />
                    </div>
                </div>
                {{ csrf_field() }}
                <input id="id_post" name="id_post" readonly hidden value="{{ $post->id }}" style="display: none">
            </div>
        </div>
    </div>
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
    Posts.editHTML();
    Posts.slug();
	Posts.tagsInput();		
	Posts.imageUpload(image); 
	Posts.eliminateMessages();
    Posts.editPost();
});

</script>
@endsection