@extends('front.iopa') 
@section('content')
<section class="section-blog">
    <div class="container wow fadeIn" data-wow-delay=".1s">
        <div class="inner-section text-center">
            <h3 class="inner-title">
               OTROS SERVICIOS
            </h3>
        </div>
    </div>
    <div class="container">
        <div class="row row-blog">
            <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">

                <ul class="media-list blog-list">
                    @foreach ($posts as $post)
                    <li class="media blog-preview">
                        <div class="media-left">
                            <a href="{{ route('post.viewservice', $post->slug) }}">
                    @if($post->file)
                        <img src="{{ $post->file }}" class="media-object">
                    @endif
                  </a>
                        </div>
                        <div class="media-body">
                            <div class="post-tags">
                                    @foreach ($post->tagsl as $item)
                                    <span class="post-tag">{{ $item }}</span>
                                    @endforeach
                            </div>
                            <h4 class="media-heading"><a href="{{ route('post.viewservice', $post->slug) }}">{{ $post->name }}</a></h4>
                            <div class="post-preview-meta">
                                <span class="meta-date"> <i class="fa fa-clock-o"></i> {{ $post->created }}</span>
                            </div>
                            <div class="post-preview-extract">
                                {!! $post->excerpt !!}
                            </div>
                            <a href="{{ route('post.viewservice', $post->slug) }}" class="btn btn-primary btn-more">Leer más</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <hr> {{ $posts->render() }}

            </div>
        </div>
    </div>
</section>



@endsection