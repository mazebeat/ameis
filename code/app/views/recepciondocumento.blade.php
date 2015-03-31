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
				RECEPCION DOCUMENTOS
				<span class="tools pull-right">
				</span>
			</div>
			<div class="panel-body">
				{{ Form::open(array('url' => 'busqueda', 'class' => 'form-inline')) }}
				<div class="form-group" style="width:180px;">
					<label for="finventario">N° Documento</label>
					<input type="text" class="form-control" placeholder="N° Documento" name="ndocumento">				
				</div>
				<div class="form-group" style="width:180px;">
					<label for="bodega">Tipo Documento</label>
					{{ Form::select('estado', array('' => '', 'Arica' => 'BOLETA', 'Puerto Octay' => 'FACTURA'), Session::get('estado', ''), array('class' => 'form-control', 'style' => 'width:180px;', 'placeholder' => 'N° Documento')) }}
				</div>
				<div class="form-group" style="width:180px;">
					<label for="codrapido">Proveedor</label>
					<input type="text" class="form-control" placeholder="Proveedor" name="proveedor">				
				</div>
				<div class="form-group" style="width:180px;">
					<label for="codrapido">OCC</label>
					<input type="text" class="form-control" placeholder="OCC" name="occ">				
				</div>
				<div class="form-group" style="width:180px;">
					<label for="codrapido">Fecha Recepción</label>
					<input type="text" class="form-control" placeholder="Fecha Recepcion" name="frecepcion">				
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
				<div class="form-group" style="width:180px;">
					<label for="producto">Producto</label>
					<input type="text" class="form-control" placeholder="Producto" name="producto">				
				</div>
				<div class="form-group" style="width:180px;">
					<label for="um">Cantidad</label>
					<input type="text" class="form-control" placeholder="Cantidad" name="cantidad">
				</div>
				<div class="form-group" style="width:180px;">
					<label for="um">U.M</label>
					{{ Form::select('estado', array('' => '', 'Arica' => 'UM2', 'Puerto Octay' => 'M3'), Session::get('estado', ''), array('class' => 'form-control', 'style' => 'width:180px;', 'placeholder' => 'N° Documento')) }}				
				</div>
				<div class="form-group" style="width:180px;">
					<label for="precio">Precio</label>
					<input type="text" class="form-control" placeholder="PRECIO" name="precio">				
				</div>
				<div class="form-group" style="margin-top: 21px;">
					<div class="btn-group">
					   <button id="btnagregar" type="submit" class="btn btn-primary" style="width:150px;">Agregar</button>
					</div>
				</div>
				<div class="form-group" style="margin-top: 21px;">
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

@if (isset($resultados))
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<span class="tools pull-right">
					<a id="btnExport" class="fa fa-download" href="javascript:;"></a>
				</span>
			</div>
			<div class="panel-body" style="vertical-align: middle;">
				<div id="resultados" class="table-responsive" style="vertical-align: middle;">
					<table class="table table-responsive">
						<thead>
							<tr style="" class="custom2">
								<th style="width:5%;vertical-align: middle">
									<span class="label label-default"
									style="padding-top: 8px">
									<input type="checkbox" class="check_todos" name="Todos" value=""
									idcorreo="">
								</span>
							</th>
							<th style="width:10%;">SKU</th>
							<th style="width:10%;">Producto</th>
							<th style="width:24%;">Entrada</th>
							<th style="width:21%;">Salida</th>
							<th style="width:10%;">Cantidad</th>
							<th style="width:10%;">Documento</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($resultados as $resultado)
						<tr class="custom1">
							<td class="custom3">
								{{ HTML::custom_checkbox($resultado->estado, $resultado->origencorreo, $resultado->idcorreo)  }}
							</td>
							<td style="width:10%;vertical-align: middle">777</td>
							<td style="width:10%;vertical-align: middle">Escalera</td>
							<td style="width:24%;vertical-align: middle">7</td>
							<td style="width:21%;vertical-align: middle">3</td>
							<td style="width:10%;vertical-align: middle">4</td>
							<td style="width:10%;vertical-align: middle">GDP-1</td>
						</tr>
					
				</div>
				@endforeach
			</tbody>
		</table>

	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-danger" style="margin-bottom: 6px;">
			<div class="panel-body">
				{{ Form::open(array('url' => 'busqueda', 'class' => 'form-inline')) }}
				<div class="form-group" style="width:200px;">
					<div class="btn-group">
					   <button id="btngenerar" type="submit" class="btn btn-primary" style="width:160px;">Generar</button>
					</div>
				</div>
				<div class="form-group" style="width:200px;">
					<div class="btn-group">
					   <button id="btneliminar" type="submit" class="btn btn-primary" style="width:160px;">Eliminar</button>
					</div>
				</div>
				<div class="form-group" style="width:200px;">
					<div class="btn-group">
					   <button id="btnimprimir" type="submit" class="btn btn-primary" style="width:160px;">Imprimir</button>
					</div>
				</div>
				<div class="form-group" style="width:276px;">

				</div>
				<div class="form-group" style="margin-top: 5px;">
					<div class="btn-group">
					   <button id="btnBuscar" type="submit" class="btn btn-primary" style="width:160px;">Buscar</button>
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
				<div class="form-group" style="width:290px;">

				</div>
				<div class="form-group" style="width:100px;">
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
{{ $resultados->links() }}
@endif
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


