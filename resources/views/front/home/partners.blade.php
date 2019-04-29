<section class="section-partners pt-10 ">
    <div class="container wow fadeInUp">
        <div class="inner-section text-center">
            <h3 class="inner-title">Previsiones</h3>
            <p>{!! isset($config[6]['pages-description']['content']['page-prevision']) ? $config[6]['pages-description']['content']['page-prevision'] : '' !!}</p>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ul class="partners-caousel">
                        @if(isset($config[13]['covenio']['content']))
                        @foreach($convenio['content'] as $key => $item)
                    <li>
                        <img src="{{ $item['img'] }}" alt="">
                    </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</section>