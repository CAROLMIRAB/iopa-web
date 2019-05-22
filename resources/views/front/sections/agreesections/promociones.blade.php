<article class="tab-pane fade item-aranceles" id="nav-promos" id="nav-promos" role="tabpanel" aria-labelledby="nav-promos-tab">
    <div class="item-aranceles-content">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ isset($promo['name']) ? $promo['name'] : ''  }}</h2>
            </div>
            <div class="col-md-6">
                {!! isset($promo['description']) ? $promo['description'] : '' !!}
            </div>
            <div class="col-md-6">
                    <img src="{{ asset('uploads/images/'.$promo['image']) }}" class="img-responsive center-block mb-20" alt="">
            </div>
        </div>
    </div>
    <div class="text-right mt-10 mb-10"><a href="#top" class="btn btn-primary btn-xs btn-gotop smooth">Ir arriba <i class="fa fa-arrow-up"></i></a></div>
    <div class="divider"></div>
</article>