@extends('front.iopa') 
@section('content')

<section class="section-contacto">
    <div class="container wow fadeIn" data-wow-delay=".1s">
        <div class="inner-section text-center">
            <h1 class="inner-title">
                Solicitudes
            </h1>
            <p>
                Si necesita información general de nuestra clínica, reservar hora de Pabellón, Consulta o Exámenes, solicitar presupuesto,
                una copia de Ficha o Receta Médica, complete el formulario de Contacto y le responderémos a la brevedad.
            </p>
        </div>


        <div class="row mt-40">
            <div class="col-md-4">
                <div class="ui-box-contact">
                    <h4>Complete el siguiente formulario si necesita:</h4>
                    <ul>
                        <li>Solicitar una copia de su ficha clínica o receta médica.</li>
                        <li> Solicitar presupuesto quirúrgico</li>
                        <li>Reservar hora para pabellón, consulta o exámenes.</li>
                        <li>Información sobre promociones y/o convenios.</li>
                        <li>Otras solicitudes.</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="ui-form contact-form">
                    <div class="form-loader hide">
                        <i class="fa fa-circle-o-notch text-primary fa-spin fa-3x"></i>
                    </div>
                    <div class="ui-contact-body">
                        <h4>Datos personales</h4>
                        <div class="ui-fields">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="name">Nombre</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="apellido">Apellido</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="rut">RUT</label>
                                        <input type="text" placeholder="11.111.111-0" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="telefono">Teléfono</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="correo">Correo</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="prevision">Previsión</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <h4>Datos de consulta</h4>
                        <div class="ui-fields">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="comuna">Comuna</label>
                                        <select name="" id="" class="form-control">
                        <option value="">Selecciona una opción</option>
                      </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="sucursales">Sucursal</label>
                                        <select name="" id="" class="form-control">
                        <option value="">Selecciona una opción</option>
                      </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="motivo">Motivo</label>
                                        <select name="" id="" class="form-control">
                          <option value="">Selecciona una opción</option>
                              <option value="Copia ficha clínica o receta médica">Historial Clínico Completo.</option>
                              <option value="Copia ficha clínica o receta médica">Registros Clínicos Consultas Médicas.</option>
                              <option value="Copia ficha clínica o receta médica">Certificado Médico o Informe Médico.</option>
                              <option value="Copia ficha clínica o receta médica">Copia de Protocolo Operatorio.</option>
                              <option value="Copia ficha clínica o receta médica">Copia de Epicrisis o Alta Operatoria.</option>
                              <option value="Solicitud de presupuesto quirúrgico">Solicitud de presupuesto quirúrgico</option>
                              <option value="Reserva Pabellón">Reserva Pabellón</option>
                              <option value="Reserva hora consulta">Reserva hora consulta</option>
                              <option value="Reserva hora exámenes">Reserva hora exámenes</option>
                              <option value="Promociones y convenios">Promociones y convenios</option>
                              <option value="Otros">Otros</option>
                              </select>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="ui-label" for="comentario">Comentario</label>
                                        <textarea class="form-control" id="" cols="3" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ui-fields">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-success hide" id="sendSuccess">
                                        ¡Mensaje enviado correctamente!
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-muted"> (*) Son campos obligatorios que nos facilitarán responder su consulta o solicitud</p>
                                </div>
                                <div class="col-sm-4 text-right">
                                    <button type="submit" class="btn btn-primary btn-lg" id="submit">Enviar mensaje</button>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
@endsection