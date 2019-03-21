<article class="item-aranceles" id="isapres">
        <div class="item-aranceles-content">

          <div class="row mt-20 mb-20">
            <div class="col-md-12">
              <h2>{{ isset($isapre['name']) ? $isapre['name'] : ''   }}</h2>
              <p>{!! isset($isapre['description']) ? $isapre['description'] : ''   !!}</p>

              <div class="table-responsive">
                  <table class="table align-items-center table-flush table-isapres" style="width: 100%">
                      <thead class="thead-light">
                          <tr>
                              <th scope="col">ISAPRES</th>
                              <th scope="col">GES</th>
                              <th scope="col">CUENTA CONOCIDA</th>
                              <th scope="col"></th>
                          </tr>
                      </thead>
                      <tbody>
                          @if(!empty($isapre['content'])) @foreach($isapre['content'] as $key => $item)
                          <tr>
                              @foreach ($item as $ky => $it)
                              <td width="35%" >
                                  <img src="{{ $it['image'] }}" width="100%">
                              </td>
                              <td width="30%" style="white-space: normal">
                                  <ul>
                                      @foreach($it['ges'] as $val)
                                      <li>{{ $val['name'] }}</li>
                                      @endforeach
                                  </ul>
                              </td> 
                              <td width="30%" style="white-space: normal">
                                  <ul>
                                      <strong>{{ $it['account']['title'] }}</strong> @foreach($it['account']['content'] as $vl)
                                      <li>{{ $vl['name'] }}</li>
                                      @endforeach
                                  </ul>
                              </td>
                              <td width="5%">
                                  <button class="btn btn-primary min-tr btn-sm" data-key="{{ $ky }}"><i class="ni ni-fat-delete" style="font-size: 18px"></i> </button>
                              </td>
                              @endforeach
                          </tr>
                          @endforeach @endif
                      </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
        <div class="text-right mt-10 mb-10"><a href="#top" class="btn btn-primary btn-xs btn-gotop smooth">Ir arriba <i class="fa fa-arrow-up"></i></a></div>
        <div class="divider"></div>
      </article>