<article class="item-aranceles tab-pane fade show active" id="nav-arancel" role="tabpanel" aria-labelledby="nav-arancel-tab">
    <div class="item-aranceles-content">
        <div class="row">
            <div class="col-md-6">
                <h2>{{ isset($arancel['name']) ? $arancel['name'] : '' }}</h2>

                {!! isset($arancel['description']) ? $arancel['description'] : '' !!}
                
                <div class="ui-download-box">
                    @if(!empty($arancel['content'])) @foreach ($arancel['content'] as $key => $item)
                    <tr>
                        @foreach ($item as $ky => $it)
                        <a href="{{ $it['route'] }}">
                                    <i class="fa fa-download ico-download"></i>
                                    <p class="title-download">{{ $it['title'] }}</p>
                                    <!--<p class="details-download">Actualizado 12 Enero, 2019</p>-->
                                </a> @endforeach @endforeach @endif
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('uploads/images/'.$arancel['image']) }}" class="img-responsive center-block" alt="">
            </div>
        </div>
    </div>
    <div class="text-right mt-10 mb-10"><a href="#top" class="btn btn-primary btn-xs btn-gotop smooth">Ir arriba <i class="fa fa-arrow-up"></i></a></div>
    <div class="divider"></div>
</article>