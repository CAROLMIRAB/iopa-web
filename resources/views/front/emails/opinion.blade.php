<p>Motivo: {{ $form->motivo }} </p>
<p>¿Cómo prefiere recibir la respuesta?: {{ $form->respuesta }} </p>
<p>Nombre: {{ $form->name }} </p>
<p>Apellido: {{ $form->lastname }} </p>
<p>RUT: {{ $form->rut }} </p>
<p>Teléfono: {{ $form->phone }} </p>
<p>Correo: {{ $form->email }} </p>
<p>Residencia: {{ $form->residencia }} </p>
<p>Región: {{ $form->region }} </p>
<p>Comuna: {{ $form->comuna }} </p>
<p>Sucursal: {{ $form->office }} </p>
<p>Área: {{ $form->area }} </p>
<p>Describa los hechos</p>
<p>{!! $form->hechos !!}</p>
<br>
<p>Peticiones concretas:</p>
<br>
<p>{!! $form->comentarios  !!} </p>
