<section>
	<div id="carousel-example-generic" class="carousel ui-carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators hide">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
				@if(isset($config[5]['slides']['content']))
				<?php $i = 1; ?> @foreach ($config[5]['slides']['content'] as $key => $item) @if($item['active'] == 'active')
			<div class="item {{ ($i == 1) ? 'active' : '' }}">
				<img src="{{ $item['img'] }}" alt="Slider 01">
				<div class="carousel-layer">
					<div class="carousel-caption">
						<h3>{{ $item['title'] }}</h3>
						<p>{{ $item['description'] }}</p>
					</div>
				</div>
			</div><?php $i++; ?> @endif @endforeach @else
			<div class="item active">
				<img src="{{ asset('img/slider/slider-03.jpg') }}" alt="Slider 01">
				<div class="carousel-layer">
					<div class="carousel-caption">
						<h3>30 AÑOS DE EXITOSA <br>EXPERIECIA</h3>
						<p>En prevención, diagnóstico y tratamiento <br> de enfermedades oculares.</p>
					</div>
				</div>
			</div>
			@endif
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>

	</div>
</section>

@if(isset($config[4]['popup']) )
@if($config[4]['popup']['content']['status'] == 'PUBLISHED')
<div class="modal fade modal-sucursal" id="popup-principal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				{!! $config[4]['popup']['content']['description'] !!}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
@endif
@endif