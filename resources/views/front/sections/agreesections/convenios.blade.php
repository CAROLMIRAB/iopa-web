<article class="item-aranceles" id="convenios">
        <div class="item-aranceles-content">
          <div class="row">
            <div class="col-md-12">
              <h2>{{ isset($convenio['name']) ? $convenio['name'] : ''  }}</h2>

              <p>{!! isset($convenio['description']) ? $convenio['description'] : '' !!}</p>

            </div> 
            <div class="col-md-12">
              <ul class="list-convenios">
                  @if(!empty($convenio['content'])) 
                  @foreach($convenio['content'] as $key => $item)
              <li class="list-convenios-item" >
                  <img src="{{ $item['img'] }}" />
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