<section class="section-sucursales ">
    <div class="container wow slideInUp" data-wow-delay=".1s" style="overflow: hidden;">
        <div class="row row-sucursales">
            <div class="inner-section text-center mt-40">
                <h3 class="inner-title">
                    LO VISTE PRIMERO
                </h3>
                <p>Consequat posuere viverra fringilla volutpat parturient sociosqu tincidunt potenti, quis gravida Semper.</p>
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
                        <div class="post-preview">
                            <a href="#!">
                                <figure>

                                    <img src="{{ asset('uploads/images/').$posts[0]->file }}" alt="">
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
                    </div>
                    <div class="col-sm-6">
                        <ul class="media-list preview-list">
                            <li class="media">
                                <div class="media-left">
                                    <a href="{{ $posts[1]->slug }}">
                                            <img class="media-object" src="{{ asset('img/post-preview02.jpg') }}" alt="...">
										</a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="{{ $posts[1]->route }}"> {{ $posts[1]->name }}</a>
                                    </h4>
                                    <p>{{ $posts[1]->created }}</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-left">
                                    <a href="#">
                                    <img class="media-object" src="{{ $posts[2]->file }}" alt="...">
										</a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="{{ $posts[2]->route }}"> {{ $posts[2]->name }}</a>
                                    </h4>
                                    <p>{{ $posts[2]->created }}</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-left">
                                    <a href="{{ $posts[3]->route }}">
                                        <img class="media-object" src="{{ $posts[3]->file }}" alt="...">
                                            </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="{{ $posts[3]->route }}"> {{ $posts[3]->name }}</a>
                                    </h4>
                                    <p>{{ $posts[3]->created }}</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-left">
                                    <a href="#">
                                            <img class="media-object" src="{{ $posts[4]->file }}" alt="...">
                                                </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="{{ $posts[4]->route }}"> {{ $posts[4]->name }}</a>
                                    </h4>
                                    <p>{{ $posts[4]->created }}</p>
                                </div>
                            </li>
                            <li>
                                <a href="#!" class="btn btn-theme04 btn-lg btn-block mt-20">Ir al blog</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>