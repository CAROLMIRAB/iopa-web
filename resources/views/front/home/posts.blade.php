@foreach ($posts as $post)
<div class="col-sm-4">
        <div class="ui-post-preview">
            <figure>
                <a href="#!">
                    <img src="{{ $post->file }}" alt="">
                </a>
            </figure>
            <div class="ui-preview-content">
                <a href="#!" class="ui-preview-title">
                        {{ $post->name }}
                </a>
                <p>
                        {{ $post->excerpt }}
                </p>
            </div>
        <a href="{{ route('post', $post->slug) }}" class="btn ui-more">Ver +</a>
        </div>
    </div>
@endforeach
    <!--<div class="col-sm-4">
            <div class="ui-post-preview">
                <figure>
                    <a href="#!">
                        <img src="{{ asset('/img/post-preview02.jpg') }}" alt="">
                    </a>
                </figure>
                <div class="ui-preview-content">
                    <a href="#!" class="ui-preview-title">
                        Mírame a los ojos y cuéntame
                    </a>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Lorem ipsum dolor sit amet consectetur, adipisicing
                        eli.
                    </p>
                </div>
                <a href="#!" class="btn ui-more">Ver +</a>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="ui-post-preview">
                <figure>
                    <a href="#!">
                        <img src="{{ asset('/img/post-preview03.jpg') }}" alt="">
                    </a>
                </figure>
                <div class="ui-preview-content">
                    <a href="#!" class="ui-preview-title">
                        Ver mejor día a día
                    </a>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Lorem ipsum dolor sit amet consectetur, adipisicing
                        eli.
                    </p>
                </div>
                <a href="#!" class="btn ui-more">Ver +</a>
            </div>
        </div>    -->