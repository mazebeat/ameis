@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-danger" style="margin-bottom: 6px;">
			<div class="panel-heading">
				MANTENEDOR CARGOS
				<span class="tools pull-right">
				</span>
			</div>
			<div class="panel-body">
				{{ Form::open(array('url' => 'busqueda', 'class' => 'form-inline')) }}
				<div class="form-group" style="width:180px;">
					<label for="codcargo">Codigo Cargo</label>
					<input type="text" class="form-control" placeholder="Codigo Cargo" name="codcargo">
				</div>
				<div class="form-group" style="margin-top: 21px;">
					<div class="btn-group">
					   <button id="btnBuscar" type="submit" class="btn btn-primary">.....</button>
					</div>
				</div>
				<div class="form-group" style="width:480px;">
					<label for="nomcargo">Nombre Cargo</label>
					<input type="text" class="form-control" placeholder="Nombre Cargo" name="nomcarg" style="width:480px;">
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
				<div class="form-group" style="width:580px;">
				</div>
				<div class="form-group" style="margin-top: 21px;">
					<div class="btn-group">
					   <button id="btnGenerar" type="submit" class="btn btn-primary" style="width:155px;">Generar</button>
					</div>
				</div>
				<div class="form-group" style="margin-top: 21px;">
					<div class="btn-group">
					   <button id="btnModificar" type="submit" class="btn btn-primary" style="width:155px;">Modificar</button>
					</div>
				</div>
				<div class="form-group" style="margin-top: 21px;">
					<div class="btn-group">
					   <button id="btnEliminar" type="submit" class="btn btn-primary" style="width:155px;">Eliminar</button>
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


@endsection