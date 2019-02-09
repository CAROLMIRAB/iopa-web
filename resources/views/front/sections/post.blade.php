@extends('front.iopa')

@section('content')
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <h1>  {{ $post->name }}</h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Categoría
                    <a href="">{{ $post->category }}</a>
                    </div>
                    <div class="panel-body">
                        @if($post->file)
                            <img src="{{ $post->file }}" class="img-responsive">
                        @endif
                        
                        {{ $post->excerpt }}
                    </div>
                    <hr>
                    {!! $post->body !!}
                    <hr>
                    Etiquetas
                    <?php $user = json_decode($post->tags) ?>
                    @foreach ($user as $item)
                    <a href="">{{ $item }}</a>
                    @endforeach
               
                </div>
        
    </div>
</div>    
@endsection