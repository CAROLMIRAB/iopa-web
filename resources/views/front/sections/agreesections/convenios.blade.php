<article class="item-aranceles tab-pane fade" id="nav-convenio" role="tabpanel" aria-labelledby="nav-convenio-tab">
        <div class="item-aranceles-content">
          <div class="row">
            <div class="col-md-12">
              <h2>{{ isset($convenio['name']) ? $convenio['name'] : ''  }}</h2>

              {!! isset($convenio['description']) ? $convenio['description'] : '' !!}

            </div> 
            <div class="col-md-12">
              <ul class="list-convenios">
                  @if(!empty($convenio['content'])) 
                  @foreach($convenio['content'] as $key => $item)
              <li class="list-convenios-item" >
                  <img src="{{ $item['img'] }}" class="img-responsive" />
              </li>
                  @endforeach 
              @endif
              </ul>
            </div>
          </div>
        </div>
        <div class="text-right mt-10 mb-10"><a href="#top" class="btn btn-primary btn-xs btn-gotop smooth">Ir arriba <i class="fa fa-arrow-up"></i></a></div>
        <div class="divider"></div>
      </article>