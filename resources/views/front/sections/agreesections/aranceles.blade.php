<article class="item-aranceles" id="aranceles">
    <div class="item-aranceles-content">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ isset($arancel['name']) ? $arancel['name'] : ''  }}</h2>

                {!! isset($arancel['description']) ? $arancel['description'] : '' !!}
                <div class="ui-download-box">

                        @if(!empty($arancel['content']))
                         @foreach ($arancel['content'] as $key => $item)
                        
                        <tr>
                            @foreach ($item as $ky => $it)
                            <a href="{{ $it['route'] }}">
                                    <i class="fa fa-download ico-download"></i>
                                    <p class="title-download">{{ $it['title'] }}</p>
                                    <!--<p class="details-download">Actualizado 12 Enero, 2019</p>-->
                                </a>
                            @endforeach
                    
                        @endforeach @endif
                </div>

            </div>
        </div>
    </div>
    <div class="text-right mt-10 mb-10"><a href="#top" class="btn btn-primary btn-xs btn-gotop smooth">Ir arriba <i class="fa fa-arrow-up"></i></a></div>
    <div class="divider"></div>
</article>