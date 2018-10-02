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