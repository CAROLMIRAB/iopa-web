<section class="section-partners pt-10 ">
    <div class="container wow fadeInUp">
        <div class="inner-section text-center">
            <h3 class="inner-title">Previsiones</h3>
            <p>Consequat posuere viverra fringilla volutpat parturient sociosqu tincidunt potenti, quis gravida Semper.</p>
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