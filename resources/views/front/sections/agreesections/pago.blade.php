<article class="item-aranceles tab-pane fade" id="nav-medios" role="tabpanel" aria-labelledby="nav-medios-tab">
    <div class="item-aranceles-content">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ isset($pago['name']) ? $pago['name'] : '' }}</h2>

                {!! isset($pago['description']) ? $pago['description'] : '' !!}

            </div>
            <div class="col-md-12">
                <ul class="list-medio-pago">
                    @if(!empty($pago['content'])) @foreach($pago['content'] as $key => $item)
                    <li class="list-medio-item">
                        <img src="{{ $item['img'] }}" class="img-responsive"/>
                    </li>
                    @endforeach @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="text-right mt-10 mb-10"><a href="#top" class="btn btn-primary btn-xs btn-gotop smooth">Ir arriba <i class="fa fa-arrow-up"></i></a></div>
    <div class="divider"></div>
</article>