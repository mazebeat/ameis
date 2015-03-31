@extends('layouts.master')

@section('content')
	<style type="text/css" media="screen">
		table {
			table-layout: fixed;
			white-space: normal;
		}
	</style>

	@if($errors->has())
		<div class="alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span
						class="sr-only">Close</span></button>
			@foreach ($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif


	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-danger">
				<div class="panel-heading">
					Crear nuevo usuario
				<span class="tools pull-right">
					<a class="fa fa-chevron-down" href="javascript:;"></a>
				</span>
				</div>
				<div class="panel-body">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevousuario"
					        style="margin-top: 21px;">Crear
					</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="nuevousuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	     aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span
								aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Correo original</h4>
				</div>
				<div class="modal-body">
					{{ Form::open(array('url' => 'crear', 'class' => 'form-inline')) }}
					<div class="form-group" style="width:200px;">
						<label for="Usuario">Usuario</label>
						<input name="username" type="text" class="form-control">
					</div>
					<div class="form-group" style="width:200px;">
						<label for="Contraseña">Contraseña</label>
						<input name="password" type="password" class="form-control">
					</div>
					<div class="form-group" style="width:200px;">
						<label for="nombrecompleto">Nombre Completo</label>
						<input name="nombrecompleto" type="text" class="form-control">
					</div>
					<div class="form-group" style="width:200px;">
						<label for="rut">Rut</label>
						<input name="rut" type="text" class="form-control">
					</div>
					<div class="form-group" style="width:200px;">
						<label for="typeuser">Tipo Usuario</label>
						<select name="typeuser" class="form-control">
							<option value=""></option>
							<option value="AD">Administrador</option>
							<option value="PU">Publico</option>
						</select>
					</div>
					<button type="submit" class="btn btn-primary" style="margin-top: 21px;">Crear</button>
					{{ Form::close() }}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
					<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
				</div>
			</div>
		</div>
	</div>

	@if (isset($creausuario))
		<div class="alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span
						class="sr-only">Close</span></button>
			<p>{{ $creausuario }}</p>
		</div>
	@endif

	<div class="row">
		<div class="col-md-12">
			@if (isset($usuarios))
				<div class="panel panel-danger">
					<div class="panel-heading">
						Usuarios del Sistema
				<span class="tools pull-right">
					<a class="fa fa-chevron-down" href="javascript:;"></a>
				</span>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-responsive">
								<thead>
								<tr>
									<th style="width:15%;">Usuario</th>
									<th style="width:35%;">Nombre Completo</th>
									<th style="width:15%;">Rut</th>
									<th style="width:15%;">Tipo Usuario</th>
									<th style="width:10%;"></th>
									<th style="width:10%;"></th>
								</tr>
								</thead>
								<tbody>
								@foreach ($usuarios as $usuario)
									<tr>
										<td style="width:15%;">{{ $usuario->username }}</td>
										<td style="width:35%;">{{ $usuario->nombrecompleto }}</td>
										<td style="width:15%;">{{ $usuario->rut }}</td>
										<td style="width:15%;">{{ $usuario->typeuser }}</td>
										<td style="width:10%;">
											<a class="btn btn-primary"
											   href="{{ URL::to('modificaUsuario', array('idusuariocorreo' => $usuario->idusuariocorreo))	 }}">Modificar</a>
										</td>
										<td style="width:10%;">
											<a class="btn btn-primary"
											   href="{{ URL::to('eliminar', array('idusuariocorreo' => $usuario->idusuariocorreo)) }}">Eliminar</a>
										</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
		</div>
	</div>

	@endif

@endsection
