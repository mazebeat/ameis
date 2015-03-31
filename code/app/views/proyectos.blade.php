@extends('layouts.master')

@section('title')
	Proyectos
@endsection

@section('page_title')
	Proyectos
@endsection

@section('breadcrumb')
	@parent
	<li class="active">PROYECTOS</li>
@endsection

@section('content')
	<div class="row">
				<div class="panel-heading">
					Proyectos
				<span class="tools pull-right">

				</span>
				</div>
				<div class="panel-body">
					<span class="label label-success"><label for="cot">Datos Cliente</label></span>
					{{ Form::open(array('url' => 'busqueda', 'class' => 'form-inline')) }}
					<div class="form-group" style="width:180px;">
						<label for="nct">N° CT</label>
						{{ Form::text('')  }}
						<iFORMnput type="text" class="form-control" placeholder="Nº CT" name="nct" autofocus>
					</div>
					<div class="form-group" style="width:180px;">
						<label for="pro">N° PROY</label> <input type="text" class="form-control" placeholder="Nº PROY" name="nproy" autofocus>
					</div>
					<div class="form-group" style="width:180px;">
						<label for="rut">RUT</label> <input type="text" class="form-control" placeholder="RUT" name="rut" autofocus>
					</div>
					<div class="form-group" style="width:180px;">
						<label for="cliente">CLIENTE</label> <input type="text" class="form-control" placeholder="CLIENTE" name="cliente" autofocus>
					</div>
					<div class="form-group" style="width:180px;">
						<label for="fecha">FECHA</label> <input type="text" class="form-control" placeholder="FECHA" name="fecha" autofocus>
					</div>
					<div class="form-group" style="width:180px;">
						<label for="vigencia">VIGENCIA</label> <input type="text" class="form-control" placeholder="VIGENCIA" name="vigencia" autofocus>
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
					<div class="form-group" style="width:250px;">
						<label for="direccion">DIRECCION</label> <input type="text" class="form-control" placeholder="DIRECCION" name="direccion">
					</div>
					<div class="form-group" style="margin-top: 21px;">
						<div class="btn-group">
							<button id="btnBuscar" type="submit" class="btn btn-primary">.....</button>
						</div>
					</div>
					<div class="form-group" style="width:300px;">
						<label for="comuna">COMUNA</label>
						{{ Form::select('estado', array('' => '', 'Arica' => 'Puerto Williams', 'Sin Asignar' => 'Sin Asignar'), Session::get('estado', ''), array('class' => 'form-control', 'style' => 'width:300px;')) }}
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
					<div class="form-group" style="width:900px;">
						<label for="nombreproyecto">Nombre Proyecto</label> <input type="text" class="form-control" placeholder="Nombre Proyecto" name="nproyecto" style="width:900px;">
					</div>
				</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<div class="row" style="margin-bottom:10px">
		<div class="col-md-12">
			<div class="panel panel-danger" style="margin-bottom: 6px;">
				<div class="panel-body">
					{{ Form::open(array('url' => 'busqueda', 'class' => 'form-inline')) }}
					<div class="form-group" style="width:200px;">
						<label for="descripcion">Descripcion Especificaciones</label> <input type="text" class="form-control" placeholder="Descripcion" name="descripcion" autofocus>
					</div>
					<div class="form-group" style="width:200px;">
						<label for="um">U.N.</label> <input type="text" class="form-control" placeholder="U.N" name="un" autofocus>
					</div>
					<div class="form-group" style="width:200px;">
						<label for="cantidad">Cant</label> <input type="text" class="form-control" placeholder="Cant" name="cantidad" autofocus>
					</div>
					<div class="form-group" style="width:200px;">
						<label for="total">Total</label> <input type="text" class="form-control" placeholder="Total" name="total" autofocus>
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
					<div class="form-group" style="margin-top: 5px;">
						<div class="btn-group">
							<button id="btnCargaarchivo" type="submit" class="btn btn-primary">Carga Archivo</button>
						</div>
					</div>
					<div class="form-group" style="width:500px;">
						<input type="text" class="form-control" placeholder="Carga Archivo" name="carga" style="width:500px;">
					</div>
					<div class="form-group" style="margin-top: 5px;">
						<div class="btn-group">
							<button id="btnAgregar" type="submit" class="btn btn-primary">Agregar</button>
						</div>
					</div>
					<div class="form-group" style="margin-top: 5px;">
						<div class="btn-group">
							<button id="btnLimpiar" type="submit" class="btn btn-primary">Limpiar</button>
						</div>
					</div>
					<div class="form-group" style="margin-top: 5px;">
						<div class="btn-group">
							<button id="btnEliminar" type="submit" class="btn btn-primary">Eliminar</button>
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

	@if (isset($resultados))
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-danger">
					<div class="panel-body" style="vertical-align: middle;">
						<div id="resultados" class="table-responsive" style="vertical-align: middle;">
							<table class="table table-responsive">
								<thead>
								<tr style="" class="custom2">
									<th style="width:5%;vertical-align: middle">
									<span class="label label-default" style="padding-top: 8px">
									<input type="checkbox" class="check_todos" name="Todos" value="" idcorreo="">
								</span>
									</th>
									<th style="width:10%;">Nº Linea</th>
									<th style="width:40%;">ESPECIFICACIONES</th>
									<th style="width:14%;">UNID.</th>
									<th style="width:11%;">CANT.</th>
									<th style="width:10%;">UNITARIO</th>
									<th style="width:20%;">TOTAL</th>
								</tr>
								</thead>
								<tbody>
								@foreach ($resultados as $resultado)
									<tr class="custom1">
										<td class="custom3">
											{{ HTML::custom_checkbox($resultado->estado, $resultado->origencorreo, $resultado->idcorreo)  }}
										</td>
										<td style="width:10%;vertical-align: middle">2</td>
										<td style="width:40%;vertical-align: middle">Provisiones Tabiques</td>
										<td style="width:14%;vertical-align: middle">M2</td>
										<td style="width:11%;vertical-align: middle">7</td>
										<td style="width:10%;vertical-align: middle">62.000</td>
										<td style="width:20%;vertical-align: middle">434.000</td>

									</tr>
								@endforeach
								</tbody>
							</table>
						</div>
						<table class="table table-responsive">
							<thead>
							<tr style="" class="custom2">
								<th style="width:20%;"></th>
								<th style="width:20%;"></th>
								<th style="width:11%;">VALOR</th>
								<th style="width:10%;">TOTAL NETO</th>
								<th style="width:10%;">I.V.A</th>
							</tr>
							</thead>
							<tbody>
							@foreach ($resultados as $resultado)
								<tr class="custom1">
									<td style="width:20%;vertical-align: middle"></td>
									<td style="width:20%;vertical-align: middle"></td>
									<td style="width:11%;vertical-align: middle">434.000</td>
									<td style="width:10%;vertical-align: middle">358.677</td>
									<td style="width:10%;vertical-align: middle">75.323</td>
									</td>
								</tr>
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
								<div class="form-group" style="width:180px;">
									<div class="btn-group">
										<button id="btnGenerar" type="submit" class="btn btn-primary" style="width:165px;"> Generar</button>
									</div>
								</div>
								<div class="form-group" style="width:180px;">
									<div class="btn-group">
										<button id="btnEliminar" type="submit" class="btn btn-primary" style="width:165px;"> Eliminar</button>
									</div>
								</div>
								<div class="form-group" style="width:545px;">
									<div class="btn-group">
										<button id="btnAgregar" type="submit" class="btn btn-primary" style="width:165px;"> Imprimir</button>
									</div>
								</div>
								<div class="form-group" style="margin-top: 5px;">
									<div class="btn-group">
										<button id="btnCerrar" type="submit" class="btn btn-primary" style="width:165px;">Salir</button>
									</div>
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
		{{ $resultados->links() }}
	@endif
@endsection



