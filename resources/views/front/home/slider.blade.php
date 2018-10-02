<section>
    <div id="carousel-example-generic" class="carousel slide ui-slider" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <!--	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
         <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li> -->
        </ol>

        <div class="carousel-inner" role="listbox">
           
            <div class="item ui-slide active">
                <img src="{{ asset('/img/slider/slide01.jpg') }}" alt="...">
                
                <div class="carousel-caption">
                    <h2>30 AÑOS DE EXITOSA EXPERIENCIA</h2>
                    <p>En prevención, diagnóstico y tratamiento de enfermedades oculares.</p>
                </div>
            </div>

            <div class="item ui-slide">
                <img src="{{ asset('/img/slider/slide02.jpg') }}" alt="...">
                <div class="carousel-caption">
                    <h2>ESPECIALISTAS <br>DE PRIMER NIVEL</h2>
                    <p>Que entregan una atención de excelencia.</p>
                </div>
            </div>

            <div class="item ui-slide">
                <img src="{{ asset('/img/slider/slide03.jpg') }}" alt="...">
                <div class="carousel-caption">
                    <h2>PIONEROS EN CIRUGÍA <br>OFTALMOLÓGICA <br>AMBULATORIA</h2>
                    <p>Ambulatoría y tratamientos con tecnología de última generación.</p>
                </div>
            </div>
            
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