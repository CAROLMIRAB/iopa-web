<article class="item-aranceles tab-pane fade active in" id="nav-fonasa" role="tabpanel" aria-labelledby="nav-fonasa-tab" >
    <div class="item-aranceles-content">
        <div class="row">
            <div class="col-md-6">
                <h2>{{ isset($fonasa['name']) ? $fonasa['name'] : '' }}</h2>

                {!! isset($fonasa['description']) ? $fonasa['description'] : '' !!}

                @if(!empty($fonasa['content'])) 
                @foreach ($fonasa['content'] as $key => $item)
                @foreach ($item as $ky => $it)
                <h3>{{ $it['subtitle'] }}</h3>
                <p>{!! $it['subdescription'] !!}</p>
                @endforeach
                @endforeach @endif
            </div>
            <div class="col-md-6">
                <img src="{{ asset('uploads/images/'.$fonasa['image']) }}" class="img-responsive center-block" alt="">
            </div>
        </div>
    </div>
    <div class="text-right mt-10 mb-10"><a href="#top" class="btn btn-primary btn-xs btn-gotop smooth">Ir arriba <i class="fa fa-arrow-up"></i></a></div>
    <div class="divider"></div>
</article>