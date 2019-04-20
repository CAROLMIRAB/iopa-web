<section class="section-sucursales ">
    <div class="container wow slideInUp" data-wow-delay=".1s" style="overflow: hidden;">
        <div class="row row-sucursales">
            <div class="inner-section text-center mt-40">
                <h3 class="inner-title">
                    LO VISTE PRIMERO
                </h3>
                <p>        {!! isset($config[6]['pages-description']['content']['page-blog']) ? $config[6]['pages-description']['content']['page-blog']: '' !!}
                    </p>
            </div>
        </div>
    </div>
</section>

<section class="section-posts">
    <div class="section-post-overlay"></div>
    <div class="section-padding">
        <div class="container mt-40 ">
            <div class="recent-entries mb-40 wow fadeIn">
                <div class="row mb-40">
                    <div class="col-sm-6">
                        @if(isset($posts[0]))
                        <div class="post-preview">
                            <a href="{{ $posts[0]->route  }}">
                                <figure>

                                    <img src="{{ $posts[0]->image }}" alt="">
                                    <div class="post-title">
                                        <h3>{{ $posts[0]->name }}</h3>
                                    </div>
                                </figure>
                                <div class="meta-date">
                                    {{ $posts[0]->created }}
                                </div>
                                <div class="post-extract text-left">
                                    {{ $posts[0]->excerpt }}[...]
                                </div>
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <ul class="media-list preview-list">
                            @if(isset($posts[1]))
                            <li class="media">
                                <div class="media-left">
                                    <a href="{{ $posts[1]->slug }}">
                                            <img class="media-object" src="{{ $posts[1]->image }}" alt="...">
										</a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="{{ $posts[1]->route }}"> {{ $posts[1]->name }}</a>
                                    </h4>
                                    <p>{{ $posts[1]->created }}</p>
                                </div>
                            </li>
                            @endif
                            @if(isset($posts[2]))
                            <li class="media">
                                <div class="media-left">
                                    <a href="{{ $posts[2]->route }}">
                                    <img class="media-object" src="{{ $posts[2]->image }}" alt="...">
										</a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="{{ $posts[2]->route }}"> {{ $posts[2]->name }}</a>
                                    </h4>
                                    <p>{{ $posts[2]->created }}</p>
                                </div>
                            </li>
                            @endif
                            @if(isset($posts[3]))
                            <li class="media">
                                <div class="media-left">
                                    <a href="{{ $posts[3]->route }}">
                                        <img class="media-object" src="{{ $posts[3]->image }}" alt="...">
                                            </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="{{ $posts[3]->route }}"> {{ $posts[3]->name }}</a>
                                    </h4>
                                    <p>{{ $posts[3]->created }}</p>
                                </div>
                            </li>
                            @endif
                            @if(isset($posts[4]))
                            <li class="media">
                                <div class="media-left">
                                    <a href="{{ $posts[4]->route }}">
                                            <img class="media-object" src="{{ $posts[4]->image }}" alt="...">
                                                </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="{{ $posts[4]->route }}"> {{ $posts[4]->name }}</a>
                                    </h4>
                                    <p>{{ $posts[4]->created }}</p>
                                </div>
                            </li>
                            @endif
                            <li>
                                <a href="{{ route('post.viewallposts') }}" class="btn btn-theme04 btn-lg btn-block mt-20">Ir al blog</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>