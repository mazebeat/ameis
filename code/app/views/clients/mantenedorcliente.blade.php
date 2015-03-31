@extends('layouts.master')

@section('text-style')
<style type="text/css" media="screen">
table {
	table-layout: fixed;
	white-space: normal;
}

.custom1 {
	border-top-width: 3px;
	border-top-style: double;
	vertical-align: middle;
	border-top-color: rgb(217, 83, 79);
}

.custom2 {
	border-top-width: 3px;
	border-top-style: solid;
	border-top-color: rgb(217, 83, 79);
}

.custom3 {
	width: 5%;
	vertical-align: middle
}
</style>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-danger" style="margin-bottom: 6px;">
			<div class="panel-heading">
				MANTENEDOR CLIENTES
				<span class="tools pull-right">
				</span>
			</div>
			<div class="panel-body">
				{{ Form::open(array('url' => 'busqueda', 'class' => 'form-inline')) }}
				<div class="form-group" style="width:180px;">
					<label for="rut">Rut</label>
					<input type="text" class="form-control" placeholder="RUT" name="nombre">
				</div>
				<div class="form-group" style="margin-top: 21px;">
					<div class="btn-group">
					   <button id="btnBuscar" type="submit" class="btn btn-primary">.....</button>
					</div>
				</div>
				<div class="form-group" style="width:380px;">
					<label for="nombres">Nombres</label>
					<input type="text" class="form-control" placeholder="Nombres" name="nombres" style="width:380px;">
				</div>
				<div class="form-group" style="width:380px;">
					<label for="clasificacion">Apellidos</label>
					<input type="text" class="form-control" placeholder="Apellidos" name="apellidos" style="width:380px;">
				</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-danger" style="margin-bottom: 6px;">
			<div class="panel-body">
				{{ Form::open(array('url' => 'busqueda', 'class' => 'form-inline')) }}
				<div class="form-group" style="width:540px;">
					<label for="dircomercial">Direccion Comercial</label>
					<input type="text" class="form-control" placeholder="Direccion Comercial" name="dircomercial" style="width:540px;">
				</div>
				<div class="form-group" style="width:230px;">
					<label for="ciudad">Ciudad</label>
					<select class="form-control" style="width:230px;">
					 @foreach ($comunas as $comuna)
					  <option value="{{ $comuna->ciudad }}">{{ $comuna->ciudad }}</option>
					  @endforeach
					</select>	
				</div>
				<div class="form-group" style="width:230px;">
					<label for="comdespacho">Comuna</label>
					<select class="form-control" style="width:230px;">
					 @foreach ($comunas as $comuna)
					  <option value="{{ $comuna->nombre }}">{{ $comuna->nombre }}</option>
					  @endforeach
					</select>
				</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-danger" style="margin-bottom: 6px;">
			<div class="panel-body">
				{{ Form::open(array('url' => 'busqueda', 'class' => 'form-inline')) }}
				<div class="form-group" style="width:540px;">
					<label for="dirdespacho">Direccion Despacho</label>
					<input type="text" class="form-control" placeholder="Direccion Comercial" name="dircomercial" style="width:540px;">
				</div>
				<div class="form-group" style="width:230px;">
					<label for="ciudespacho">Ciudad</label>
					<select class="form-control" style="width:230px;">
					 @foreach ($comunas as $comuna)
					  <option value="{{ $comuna->ciudad }}">{{ $comuna->ciudad }}</option>
					  @endforeach
					</select>				
			   </div>
				<div class="form-group" style="width:230px;">
					<label for="comdespacho">Comuna</label>
					<select class="form-control" style="width:230px;">
					 @foreach ($comunas as $comuna)
					  <option value="{{ $comuna->nombre }}">{{ $comuna->nombre }}</option>
					  @endforeach
					</select>
				</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-danger" style="margin-bottom: 6px;">
			<div class="panel-body">
				{{ Form::open(array('url' => 'busqueda', 'class' => 'form-inline')) }}
				<div class="form-group" style="width:540px;">
					<label for="razonsocial">Razon Social</label>
					<input type="text" class="form-control" placeholder="Razon Social" name="razonsocial" style="width:540px;">
				</div>
				<div class="form-group" style="width:200px;">
					<label for="telefono">Telefono</label>
					<input type="text" class="form-control" placeholder="Telefono" name="telefono" style="width:200px;">
				</div>
				<div class="form-group" style="margin-top: 21px;">
					<div class="btn-group">
					   <button id="btnGenerar" type="submit" class="btn btn-primary" style="width:105px;">Generar</button>
					</div>
				</div>
				<div class="form-group" style="margin-top: 21px;">
					<div class="btn-group">
					   <button id="btnEliminar" type="submit" class="btn btn-primary" style="width:105px;">Eliminar</button>
					</div>
				</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

<div class="clearfix"></div>

@if (isset($mensaje))
<div class="alert alert-warning alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert">
		<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
	</button>
	<p>{{ $mensaje }}</p>
</div>
@endif

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-danger" style="margin-bottom: 6px;">
			<div class="panel-body">
				{{ Form::open(array('url' => 'busqueda', 'class' => 'form-inline')) }}
				<div class="form-group" style="width:200px;">
				</div>
				<div class="form-group" style="width:200px;">
				</div>
				<div class="form-group" style="width:200px;">
				</div>
				<div class="form-group" style="width:290px;">
				</div>
				<div class="form-group" style="margin-top: 5px;">
					<div class="btn-group">
					   <button id="btnSalir" type="submit" class="btn btn-primary" style="width:165px;">Salir</button>
					</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-danger" style="margin-bottom: 6px;">
			<div class="panel-body">
				{{ Form::open(array('url' => 'busqueda', 'class' => 'form-inline')) }}
				<div class="form-group" style="width:200px;">

				</div>
				<div class="form-group" style="width:200px;">

				</div>
				<div class="form-group" style="width:200px;">

				</div>
				<div class="form-group" style="width:300px;">

				</div>
				<div class="form-group" style="width:200px;">
					<div class="btn-group">
					   <button id="btnVolver" type="submit" class="btn btn-primary">Volver Menu Principal</button>
					</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

</div>
</div>
</div>
</div>

@endsection

@section('file-script')
{{ HTML::script('js/kayalshri/tableExport.js') }}
{{ HTML::script('js/kayalshri/jquery.base64.js') }}
@endsection

@section('text-script')
<script type="text/javascript">

var listaCorreosCheck = [];
var listaIdCorreosCheck = [];

$(".check_todos").click(function (event) {

	if ($(this).is(":checked")) {
		$(".ck:checkbox:not(:checked)").attr("checked", "checked");

		$('.ck').each(function () {
			var correo = $(this).val();
			var idcorreo = $(this).attr('idcorreo');

			listaCorreosCheck.push(correo);
			listaIdCorreosCheck.push(idcorreo);
			listaCorreosCheck = jQuery.unique(listaCorreosCheck);
			listaIdCorreosCheck = jQuery.unique(listaIdCorreosCheck);

// console.log(listaCorreosCheck);
// console.log(listaIdCorreosCheck);
});

	} else {
		$(".ck:checkbox:checked").removeAttr("checked");
		listaCorreosCheck = [];
		listaIdCorreosCheck = [];
	}
});


$(".ck").click(function (event) {

	if ($(this).is(":checked")) {
		var correo = $(this).val();
		var idcorreo = $(this).attr('idcorreo');

		listaCorreosCheck.push(correo);
		listaIdCorreosCheck.push(idcorreo);
		listaCorreosCheck = jQuery.unique(listaCorreosCheck);
		listaIdCorreosCheck = jQuery.unique(listaIdCorreosCheck);

// console.log(listaCorreosCheck);
// console.log(listaIdCorreosCheck);


} else {
	listaCorreosCheck = jQuery.grep(listaCorreosCheck, function (value) {
		return value != correo;
	});

	listaIdCorreosCheck = jQuery.grep(listaIdCorreosCheck, function (value) {
		return value != idcorreo;
	});
}
});

$('.selectBox').on('change', function (event) {
	var idcorreo = $(this).attr('idcorreo');
	var origencorreo = $(this).attr('origencorreo');
	var valor = $(this).val();
	var esteModal = $(this).parents('.modal').attr('id');

	$(this).val(0);

	if (valor == 1) {
		$('#myModalUser').modal('hide');
		$('#' + esteModal).modal('hide');
		$('#myModalResponder').find('.idcorreo').val(idcorreo);
		$('#myModalResponder').find('.origencorreo').val(origencorreo);
		$('#myModalResponder').modal('show');
	}

	if (valor == 2) {
		$('#myModalResponder').modal('hide');
		$('#' + esteModal).modal('hide');
		$('#myModalUser').find('.idcorreo').val(idcorreo);
		$('#myModalUser').modal('show');
	}

	event.preventDefault();
});

$('#responderTodos').click(function () {
	if (listaIdCorreosCheck != '' && listaCorreosCheck != '') {
		$('#myModalResponder').find('.idcorreo').val(listaIdCorreosCheck);
		$('#myModalResponder').find('.origencorreo').val(listaCorreosCheck);
		$('#myModalResponder').modal('show');
		$('#myModalUser').modal('hide');
	}
});

$('#reasignarTodos').click(function () {
	if (listaIdCorreosCheck != '' && listaCorreosCheck != '') {
		console.log(listaIdCorreosCheck);
		$('#myModalUser').find('.idcorreo').val(listaIdCorreosCheck);
		$('#myModalUser').modal('show');
		$('#myModalResponder').modal('hide');
	}
});

</script>
@endsection


