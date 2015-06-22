@extends('layouts.master')

@section('title')
	Cotizaciones
@endsection

@section('breadcrumb')
	@parent
	<li><a href="#" class="active">Cotizaciones</a></li>
@endsection

@section('page-title')
	<i class="icon-custom-left"></i>
	<h3><span class="semi-bold">Cotización</span></h3>
@endsection

@section('content')
	<div ng-controller="CotizacionesController">
		{{--BEGIN FORM --}}
		<form name="cotizForm" novalidate ng-submit="cotizForm.$valid && saveCotizacion(cotizForm)" class="css-form" id="form-condensed" class="form-no-horizontal-spacing">

			{{-- BEGIN MAIN DATA --}}
			<div class="row">
				<div class="col-md-12">
					<div class="row form-row">
						<div class="col-md-3 pull-right">
							<h5 class="pull-right">
								<span class="semi-bold">Fecha Creación: </span><span ng-model="cotizacion.fecha" ng-init="cotizacion.fecha = '{{ Carbon::now()->toDateString() }}'">{{ Carbon::now()->toDateString() }}</span>
							</h5>
						</div>
						<div class="col-md-3">
							<div class="input-group">
								<input name="form3Cotiz" id="form3Cotiz" type="number" stringToNumber class="form-control" placeholder="N° Cotización" ng-model="cotizacion.numero" ng-disabled="disableCoti" ng-change="isNew()">
								<span class="input-group-addon primary" ng-click="searchCotizacion()">
									<span class="arrow"></span>
									<i class="fa fa-ellipsis-h" ng-if="!loads.cotizacion.numero"></i>
									<i class="fa fa-circle-o-notch fa-spin" ng-if="loads.cotizacion.numero"></i>
								</span>
							</div>
						</div>

					</div>
				</div>
			</div>
			{{-- END MAIN DATA --}}

			{{-- BEGIN CLIENTE --}}
			<div class="grid simple vertical green">
				<div class="grid-title no-border">
					<h4>Información <span class="semi-bold">Cliente</span></h4>
					<button class="btn btn-link pull-right" ng-click="clean('client')">Limpiar<i class="fa fa-eraser"></i></button>
				</div>
				<div class="grid-body no-border">

					{{-- BEGIN GRID BODY --}}
					<div class="row">
						<div class="col-md-12">
							<div class="row form-row">
								<div class="col-md-3">
									<label for="">RUT</label>

									<div class="input-group">
										<input name="form3Rut" id="form3Rut" type="text" class="form-control" placeholder="" ng-model="cliente.rut" minlength="8" maxlength="10" required ng-disabled="disableCli" ng-change="isNew()">

										{{--<span class="input-group-addon primary" sglclick="searchClienteRut()" ng-dblclick="modalCliente()" ng-click-options="{preventDoubleClick: true}">--}}
										<span class="input-group-addon primary" ng-click="modalCliente()" ng-click-options="{preventDoubleClick: true}">
											<span class="arrow"></span>
											<i class="fa fa-ellipsis-h" ng-if="!loads.cliente.rutname"></i>
											<i class="fa fa-circle-o-notch fa-spin" ng-if="loads.cliente.rutname"></i>
										</span>
									</div>

									<div ng-messages="cotizForm.form3Rut.$error" role="alert">
										<span class="help-inline text-error" ng-message="required">Requerido</span> <span class="help-inline text-error" ng-message="minlength">Min. 8 digitos</span>
										<span class="help-inline text-error" ng-message="maxlength">Min. 10 digitos</span>
									</div>
									<span class="help-inline text-error" ng-if="errors.cliente.rut">[[ errors.cliente.rut ]]</span>
								</div>

								<div class="col-md-4">
									<label for="">Nombre</label>

									<input name="form3FirstName" id="form3FirstName" type="text" class="form-control" placeholder="" ng-model="cliente.nombre" required ng-disabled="disableCli" ng-change="isNew()">

									<div ng-messages="cotizForm.form3FirstName.$error" role="alert">
										<span class="help-inline text-error" ng-message="required">Requerido</span>
									</div>
									<span class="help-inline text-error" ng-if="errors.cliente.nombre">[[ errors.cliente.nombre ]]</span>
								</div>

								<div class="col-md-5">
									<label for="">Dirección</label>

									<div class="input-group">
										<input name="form3Address" id="form3Address" type="text" class="form-control" placeholder="" ng-model="cliente.direccion" required ng-disabled="disableCli" ng-change="isNew()">
										<span class="input-group-addon primary">
											<span class="arrow"></span>
											<i class="fa fa-ellipsis-h"></i>
										</span>
									</div>
									<div ng-messages="cotizForm.form3Address.$error" role="alert">
										<span class="help-inline text-error" ng-message="required">Requerido</span>
									</div>
									<span class="help-inline text-error" ng-if="errors.cliente.direccion">[[ errors.cliente.direccion ]]</span>
								</div>
							</div>
							<div class="row form-row">

								<div class="col-md-6">
									<label for="">Ciudad</label>
									{{ Form::select('ciudades', $ciudades, Input::old('ciudades'), array('select', 'class' => 'form-control select', 'data-ng-model' => 'cliente.ciudad', 'ng-change' => 'changeCiudades(cliente.ciudad)', 'select-selection' => 'cliente.comuna', 'required', 'disabled')) }}
									<div ng-messages="cotizForm.ciudades.$error" role="alert">
										<span class="help-inline text-error" ng-message="required">Requerido</span>
									</div>
									<span class="help-inline text-error" ng-if="errors.cliente.ciudad">[[ errors.cliente.ciudad ]]</span>
								</div>

								<div class="col-md-6">
									<label for="">Comuna</label>
									{{ Form::select2('comunas', $comunas, Input::old('comunas'), array('select', 'class' => 'form-control select', 'data-ng-model' => 'cliente.comuna', 'ng-options' =>'c.Id_Comuna as c.Descripcion for c in comunas', 'select-selection' => 'cliente.comuna', 'disabled')) }}
									<div ng-messages="cotizForm.comunas.$error" role="alert">
										<span class="help-inline text-error" ng-message="required">Requerido</span>
									</div>
									<span class="help-inline text-error" ng-if="errors.cliente.comuna">[[ errors.cliente.comuna ]]</span>
								</div>
							</div>
						</div>
					</div>
					{{-- END GRID BODY --}}
				</div>
			</div>
			{{-- END CLIENTE --}}

			{{-- BEGIN PROJECT --}}
			<div class="grid simple vertical blue">
				<div class="grid-title no-border">
					<h4>Información <span class="semi-bold">Proyecto</span></h4>
					<button class="btn btn-link pull-right" ng-click="clean('proyect')">Limpiar<i class="fa fa-eraser"></i></button>
				</div>
				<div class="grid-body no-border">
					{{-- BEGIN GRID BODY --}}
					<div class="row">
						<div class="col-md-12">
							<div class="row form-row">
								<div class="col-md-8">
									<label for="formProyecto">Nombre Proyecto</label>

									<input type="text" class="form-control" placeholder="" name="formProyecto" ng-model="proyecto.nombre" required>
								</div>
								<div class="col-md-2">
									<label for="formVigencia">Vigencia</label>

									<input type="number" min="0" max="30" ng-pattern="integerval" name="formVigencia2" id="formVigencia2" class="form-control" ng-model="proyecto.vigencia" ng-change="changeVigencia()" step="1" required>
									<span class="help-inline text-error" ng-show="cotizForm.formVigencia2.$error.number">Solo números</span>
									<span class="help-inline text-error" ng-show="cotizForm.formVigencia2.$error.max">Máximo 30 días</span>
								</div>
								<div class="col-md-2">
									<label for="formVencimiento">Fecha Vencimiento</label>

									<input type="text" class="form-control" placeholder="Fecha Vencimiento" name="formVencimiento" id="formVencimiento" now="{{ Carbon::now()->toDateString() }}" readonly ng-model="proyecto.fechaVencimiento" required>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- END PROJECT --}}

			{{-- BEGIN SERVICES --}}
			<div id="services-grid" class="grid simple vertical blue">
				<div class="grid-title no-border">
					<h4>Información <span class="semi-bold">Servicio</span></h4>
					<button class="btn btn-link pull-right" ng-click="clean('service')">Limpiar<i class="fa fa-eraser"></i></button>
				</div>
				<div class="grid-body no-border">
					<div class="row form-row">
						<div class="col-md-2">
							<label for="formTipoServicio">Tipo Servicio</label>

							{{ Form::select2('formTipoServicios', $tservicios, Input::old('formTipoServicios'), array('id' => 'formTipoServicio', 'class' => 'select22 form-control', 'style' => 'width:100%', 'ng-model' => 'servicio.Id_TipoServicio', 'ng-change' => 'changeServicio()')) }}
						</div>
						<div class="col-md-2">
							<label for="formServicio">Servicio</label>

							<div class="input-group">
								<input name="form3Servicio" id="form3Servicio" type="text" class="form-control" placeholder="" ng-model="servicio.Descripcion_Servicio">
							<span class="input-group-addon primary" data-toggle="modal" data-target="#modalServicio">
								<span class="arrow"></span>
								<i class="fa fa-ellipsis-h"></i>
							</span>
							</div>
						</div>
						<div class="col-md-2">
							<label for="formPrecio">Precio</label>

							<input type="text" class="form-control auto" data-a-sep="," data-a-dec="." placeholder="$" name="formPrecio" value="0" readonly ng-model="servicio.Precio">
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="formUnidad">U.M</label>
								{{--<input type="text" class="form-control" name="formUnidad" id="formUnidad" value="{{ Input::old('formUnidad') }}" readonly ng-model="servicio.UnidadMedida">--}}
								{{--{{ Form::select2('formUnidad', $unidades, Input::old('formUnidad'), array('id' => 'formUnidad', 'class' => 'select2 form-control', 'style' => 'width:100%', 'ng-model' => 'servicio.UnidadMedida')) }}--}}
								{{ Form::select2('formUnidad', $unidades, Input::old('formUnidad'), array('select', 'class' => 'form-control select', 'data-ng-model' => 'servicio.UnidadMedida', 'ng-options' =>'u.UnidadMedida as u.UnidadMedida for u in unidades', 'select-selection' => 'servicio.UnidadMedida')) }}
								{{--<p>selected item is : [[ servicio.UnidadMedida ]]</p>--}}
								{{--<select class="form-control select" data-ng-model="servicio.UnidadMedida" select-selection="servicio.UnidadMedida">--}}
								{{--<option ng-repeat="u in unidades" value="[[ u.Descripcion ]]">[[u.Descripcion ]]</option>--}}
								{{--</select>--}}
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="formCantidad">Cantidad</label>

								<input type="number" class="form-control" placeholder="" name="formCantidad" value="" ng-model="servicio.Cantidad" min="0" ng-change="changeCantidad()">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="formTotal">Total</label>

								<input type="text" class="form-control auto" data-a-sep="," data-a-dec="." placeholder="$" name="formTotal" value="0" readonly ng-model="servicio.Total">
							</div>
						</div>
					</div>
					<div class="row form-row">
						<div class="col-md-12">
							<label for="formDescripcion">Descripción</label>

							<textarea id="formDescripcion" name="formDescripcion" placeholder="..." class="form-control" rows="3" ng-model="servicio.Observaciones"></textarea>
						</div>
					</div>
					<div class="form-actions">
						<div class="pull-left"></div>
						<div class="pull-right">
							<button type="button" class="btn btn-link btn-cons" ng-click="clean('service')" ng-if="modifiDet">Cancelar</button>
							<button type="button" class="btn [[ btnAdd[2] ]] btn-cons btnAdd" ng-click="addService()" ng-disabled="servicio.UnidadMedida == null || servicio.Total == 0 || servicio.cantidad <= 0">
								<i class="fa [[ btnAdd[0] ]]"></i>&nbsp;[[ btnAdd[1] ]]
							</button>
						</div>
					</div>
				</div>
			</div>
			{{-- END SERVICES --}}

			{{-- BEGIN DETAIL --}}
			<div class="grid simple horizontal red" ng-if="detalle.length > 0">
				<div class="grid-title no-border">
					<h4>Detalle <span class="semi-bold">Proyecto</span></h4>
					<button class="btn btn-link pull-right" ng-click="clean('detail')">Limpiar<i class="fa fa-eraser"></i></button>
				</div>
				<div class="grid-body no-border">
					<div class="row">
						<div class="col-md-12">
							{{-- BEGIN GRID BODY --}}
							<div class="table-responsive">

								{{-- BEGIN TABLE --}}
								<table class="table table-bordered no-more-tables">
									<thead>
									<tr>
										<th style="width:1%">
											<div class="checkbox check-default">
												<input id="checkboxMain" type="checkbox" value="1" class="checkall"> <label for="checkboxMain"></label>
											</div>
										</th>
										<th class="text-center" style="width:15%; vertical-align:middle;">Tipo Servicio</th>
										<th class="text-center" style="width:22%; vertical-align:middle;">Servicio</th>
										<th class="text-center" style="width:10%; vertical-align:middle;">Precio</th>
										<th class="text-center" style="width:6%;  vertical-align:middle;">Unidad</th>
										<th class="text-center" style="width:6%;  vertical-align:middle;">Cantidad</th>
										<th class="text-center" style="width:6%;  vertical-align:middle;">Total</th>
										<th class="text-center" style="width:2%;  vertical-align:middle;">Descrip.</th>
										<th class="text-center" style="width:10%;  vertical-align:middle;"></th>
									</tr>
									</thead>
									<tbody>

									{{-- BEGIN RESULT LOOP --}}
									<tr ng-repeat="d in detalle">
										<td>
											<div class="checkbox check-default">
												<input id="checkbox_[[ $index ]]" type="checkbox" value="1"> <label for="checkbox_[[ $index ]]"></label>
											</div>
										</td>
										<td class="text-center">[[ d.Nombre_TipoServicio ]]</td>
										<td class="text-center">[[ d.Descripcion_Servicio ]]</td>
										<td class="text-center">[[ d.Precio | currency ]]</td>
										<td class="text-center">[[ d.UnidadMedida ]]</td>
										<td class="text-center">[[ d.Cantidad ]]</td>
										<td class="text-center">[[ d.Total | currency ]]</td>
										<td class="text-center">
											<a class="btn btn-info btn-sm btn-small" data-toggle="modal" data-target="#tableDetalle_[[ $index ]]"><i class="fa fa-outdent"></i></a>

											{{-- BEGIN OBSERVACIONES MODAL --}}
											<div class="modal fade" id="tableDetalle_[[ $index ]]" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">

													{{-- BEGIN MODAL-CONTENT --}}
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															<br> <i class="fa fa-outdent fa-7x"></i>
															<h4 id="myModalLabel" class="semi-bold">Descripción del Servicio.</h4>

															<p class="no-margin">[[ d.Descripcion_Servicio ]]</p><br>
														</div>
														<div class="modal-body">
															<p>[[ d.Observaciones ]]</p>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
														</div>
													</div>
												</div>
											</div>
											{{-- END OBSERVACIONES MODAL --}}
										</td>
										<td class="text-center clearfix">
											<a class="btn btn-warning btn-sm btn-small pull-left" ng-click="editDetalleItem(d)"><i class="fa fa-pencil"></i></a>
											<a class="btn btn-danger btn-sm btn-small pull-right" ng-click="removeDetalleItem(d)"><i class="fa fa-trash-o"></i></a>
										</td>
									</tr>
									{{-- END RESULT LOOP --}}

									</tbody>
								</table>
								{{-- END TABLE --}}
							</div>
						</div>
					</div>

				</div>
			</div>
			{{-- END DETAIL --}}

			<div class="grid simple transparent no-padding no-margin" ng-if="detalleTotal.total != 0">
				<div class="grid-body">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-4  pull-right">
							<table class="table no-more-tables">
								<tbody>
								<tr>
									<td class="text-left">Subtotal</td>
									<td class="text-right semi-bold"><span>[[ detalleTotal.subtotal | currency ]]</span></td>
								</tr>
								<tr>
									<td class="text-left">IVA</td>
									<td class="text-right semi-bold"><span>[[ detalleTotal.iva | currency ]]</span></td>
								</tr>
								<tr>
									<td class="text-left">Total</td>
									<td class="text-right semi-bold"><span>[[ detalleTotal.total | currency ]]</span></td>
								</tr>
								</tbody>
							</table>
							{{-- END GRID BODY --}}
						</div>
					</div>
				</div>
			</div>

			{{-- BEGIN ACTION BUTTONS --}}
			<div class="form-actions">
				<div class="pull-left">
					{{--<button class="btn btn-warning  btn-cons" type="submit"><i class="fa fa-upload"></i> Cargar Archivo</button>--}}
					<button class="btn btn-link  btn-cons" type="button" ng-click="clean('all')"><i class="fa fa-eraser fa-fw"></i>Limpiar Todo</button>
				</div>
				<div class="pull-right">
					{{--<button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-check"></i>&nbsp;Guardar</button>--}}
					<button class="btn [[ btnSave[2] ]] btn-cons btnGuardar" type="submit" ng-disabled="cotizForm.$invalid"><i class="fa [[ btnSave[0] ]]"></i>&nbsp;[[ btnSave[1] ]]</button>
					<a href="{{ URL::to('/') }}" class="btn btn-white btn-cons">Salir</a>
				</div>
			</div>
			{{-- END ACTION BUTTONS --}}
		</form>
		{{--END FORM--}}

		{{-- BEGIN MODAL COTIZACION --}}
		<div class="modal fade" id="modalCotizacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Buscar Cotización</h4>
					</div>
					<div class="modal-body">
						<table class="table table-striped table-flip-scroll cf">
							<thead class="cf">
							<tr>
								<th>
									<div class="checkbox check-default ">
										<input id="servicio" type="checkbox" value="1" class="checkall"> <label for="checkbox1"></label>
									</div>
								</th>
								<th>Cotización</th>
								<th>Fecha</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>
									<div class="checkbox check-default">
										<input id="checkbox2" type="checkbox" value="1"> <label for="checkbox2"></label>
									</div>
								</td>
								<td></td>
								<td></td>
							</tr>
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn btn-primary">Cargar</button>
					</div>
				</div>
			</div>
		</div>
		{{--END MODAL COTIZACION--}}

		{{-- BEGIN MODAL CLIENTE --}}
		<div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Buscar Cliente</h4>
					</div>
					<div class="modal-body">
						<h2>Busqueda Cliente <span>(RUT o Nombre)</span></h2>

						<div class="row">
							<div class="col-md-6">
								<h3>RUT:</h3>
								<input type="text" class="form-control" name="sRut" ng-model="cliente.sRut"/>
							</div>
							<div class="col-md-6">
								<h3>Nombre:</h3>
								<input type="text" class="form-control" name="sName" ng-model="cliente.sName"/>
							</div>

						</div>
						<table class="table table-striped">
							<thead class="cf">
							<tr>
								<th>Clientes encontrados:</th>
							</tr>
							</thead>
							<tbody>
							<tr ng-repeat="c in clientes">
								<td class="radio radio-success">
									<input id="radio_[[ $index ]]" type="radio" name="service" value="[[ $index ]]" ng-model="$parent.clienteSelect">
									<label for="radio_[[ $index ]]">[[ c.Nombres ]] [[ c.ApellidoPat ]]</label>
								</td>
							</tr>
							</tbody>
						</table>
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-primary pull-right" ng-click="searchClient()">Buscar</button>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn btn-primary" ng-click="selectCliente()">Cargar</button>
					</div>
				</div>
			</div>
		</div>
		{{--END MODAL CLIENTE--}}

		{{-- BEGIN MODAL COMUNA --}}
		<div class="modal fade" id="modalComuna" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Buscar Comuna</h4>
					</div>
					<div class="modal-body">
						{{--						{{ Form::select2('comunas', $comunas, Input::old('comunas'), array('id', 'comunas', 'ng-model' => 'cliente.comuna')) }}--}}
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						{{--<button type="button" class="btn btn-primary">Cargar</button>--}}
					</div>
				</div>
			</div>
		</div>
		{{--END MODAL COMUNA--}}

		{{--BEGIN MODAL CIUDAD--}}
		<div class="modal fade" id="modalCiudad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Buscar Ciudad</h4>
					</div>
					<div class="modal-body">
						{{--{{ Form::select2('ciudades', $ciudades, Input::old('ciudades'), array('id', 'ciudades', 'ng-model' => 'cliente.ciudad')) }}--}}
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						{{--<button type="button" class="btn btn-primary">Cargar</button>--}}
					</div>
				</div>
			</div>
		</div>
		{{--END MODAL CIUDAD--}}

		{{--BEGIN MODAL SERVICIO--}}
		<div class="modal fade" id="modalServicio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Seleccionar un Servicio</h4>
					</div>
					<div class="modal-body">
						<table class="table table-striped table-flip-scroll cf" ng-show="servicios.length >= 1">
							<thead class="cf">
							<tr>
								<th>Servicio</th>
							</tr>
							</thead>
							<tbody>
							<tr ng-repeat="s in servicios">
								<td class="radio radio-success">
									<input id="radio_[[ $index ]]" type="radio" name="service" value="[[ $index ]]" ng-model="$parent.servicioSelect">
									<label for="radio_[[ $index ]]" ng-bind="s.Descripcion_Servicio"></label>
								</td>
							</tr>
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn btn-primary" ng-click="selectServicio()">Cargar</button>
					</div>
				</div>
			</div>
		</div>
		{{--END MODAL SERVICIO--}}
		{{-- BEGIN MODAL EDIT DETALLE--}}
		<div class="modal fade" id="modalEditDetalle" tabindex="-1" role="dialog" aria-labelledby="modalEditDetalle" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Buscar Comuna</h4>
					</div>
					<div class="modal-body">
						<form action="">
							<div class="row form-row">
								<div class="col-md-6">
									<label for="formTipoServicio">Tipo Servicio</label>

									{{ Form::select2('formTipoServicios', $tservicios, Input::old('formTipoServicios'), array('id' => 'formTipoServicio', 'class' => 'select22 form-control', 'style' => 'width:100%', 'ng-model' => 'servicio.Id_TipoServicio', 'ng-change' => 'changeServicio()')) }}
								</div>
								<div class="col-md-6">
									<label for="formServicio">Servicio</label>

									<div class="input-group">
										<input name="form3Servicio" id="form3Servicio" type="text" class="form-control" placeholder="" ng-model="servicio.Descripcion_Servicio">
										<span class="input-group-addon primary" data-toggle="modal" data-target="#modalServicio">
											<span class="arrow"></span>
											<i class="fa fa-ellipsis-h"></i>
										</span>
									</div>
								</div>
							</div>
							<div class="row form-row">
								<div class="col-md-4">
									<label for="formPrecio">Precio</label>

									<input type="text" class="form-control auto" data-a-sep="," data-a-dec="." placeholder="$" name="formPrecio" value="0" readonly ng-model="servicio.Precio">
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="formUnidad">U.M</label>
										{{--<input type="text" class="form-control" name="formUnidad" id="formUnidad" value="{{ Input::old('formUnidad') }}" readonly ng-model="servicio.UnidadMedida">--}}
										{{--{{ Form::select2('formUnidad', $unidades, Input::old('formUnidad'), array('id' => 'formUnidad', 'class' => 'select2 form-control', 'style' => 'width:100%', 'ng-model' => 'servicio.UnidadMedida')) }}--}}
										{{ Form::select2('formUnidad', $unidades, Input::old('formUnidad'), array('select', 'class' => 'form-control select', 'data-ng-model' => 'servicio.UnidadMedida', 'ng-options' =>'u.UnidadMedida as u.UnidadMedida for u in unidades', 'select-selection' => 'servicio.UnidadMedida')) }}
										{{--<p>selected item is : [[ servicio.UnidadMedida ]]</p>--}}
										{{--<select class="form-control select" data-ng-model="servicio.UnidadMedida" select-selection="servicio.UnidadMedida">--}}
										{{--<option ng-repeat="u in unidades" value="[[ u.Descripcion ]]">[[u.Descripcion ]]</option>--}}
										{{--</select>--}}
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="formCantidad">Cantidad</label>

										<input type="number" class="form-control" placeholder="" name="formCantidad" value="" ng-model="servicio.Cantidad" min="0" ng-change="changeCantidad()">
									</div>
								</div>
							</div>
							<div class="row form-row">
								<div class="col-md-5 pull-right">
									<div class="form-group">
										<label for="formTotal">Total</label>

										<input type="text" class="form-control auto" data-a-sep="," data-a-dec="." placeholder="$" name="formTotal" value="0" readonly ng-model="servicio.Total">
									</div>
								</div>
							</div>
							<div class="row form-row">
								<div class="col-md-12">
									<label for="formDescripcion">Descripción</label>

									<textarea id="formDescripcion" name="formDescripcion" placeholder="..." class="form-control" rows="3" ng-model="servicio.Observaciones"></textarea>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						{{--<button type="button" class="btn btn-primary">Cargar</button>--}}
					</div>
				</div>
			</div>
		</div>
		{{--END MODAL EDIT DETALLE--}}
	</div>
	{{-- <input type="text" class="span12 auto" data-a-sep="," data-a-dec="."> --}}
@endsection

@section('rightmenu')
	{{ \HTML::listaPendientes($pendientes, 'cotiz') }}
@endsection

@section('style')
	{{--{{ HTML::style('http://lipis.github.io/bootstrap-sweetalert/lib/sweet-alert.css') }}--}}
	<!-- BEGIN PLUGIN CSS -->
	{{ HTML::style('assets/plugins/pace/pace-theme-flash.css') }}
	{{ HTML::style('assets/plugins/bootstrap-select2/select2.css') }}
	{{ HTML::style('assets/plugins/bootstrap-datepicker/css/datepicker.css') }}
	{{ HTML::style('assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css') }}
	{{ HTML::style('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}
	{{ HTML::style('assets/plugins/boostrap-checkbox/css/bootstrap-checkbox.css') }}
	{{ HTML::style('assets/plugins/ios-switch/ios7-switch.css') }}
	{{ HTML::style('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}
	{{ HTML::style('assets/plugins/bootstrap-tag/bootstrap-tagsinput.css') }}
	{{ HTML::style('assets/plugins/dropzone/css/dropzone.css') }}
	{{ HTML::style('assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.css') }}
	{{ HTML::style('assets/plugins/boostrap-slider/css/slider.css') }}
	<!-- END PLUGIN CSS -->
@endsection

@section('script')
	{{--{{ HTML::script('http://lipis.github.io/bootstrap-sweetalert/lib/sweet-alert.js') }}--}}
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	{{--{{ HTML::script('assets/plugins/pace/pace.min.js') }}--}}
	{{ HTML::script('assets/plugins/jquery-block-ui/jqueryblockui.js') }}
	{{ HTML::script('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}
	{{ HTML::script('assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}
	{{ HTML::script('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}
	{{ HTML::script('assets/plugins/jquery-inputmask/jquery.inputmask.min.js') }}
	{{ HTML::script('assets/plugins/jquery-autonumeric/autoNumeric.js') }}
	{{ HTML::script('assets/plugins/bootstrap-select2/select2.min.js') }}
	{{ HTML::script('assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}
	{{ HTML::script('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}
	{{ HTML::script('assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js') }}
	{{ HTML::script('assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.js') }}
	{{ HTML::script('assets/plugins/dropzone/dropzone.min.js') }}
	{{ HTML::script('assets/plugins/boostrap-slider/js/bootstrap-slider.js') }}
	<!-- END PAGE LEVEL PLUGINS -->
	{{ HTML::script('assets/js/form_elements.js') }}
	<script>

		// Vigencia Slider
		$('#formVigencia').slider().on('slide', function (ev) {
			$('#formVigencia2').val(ev.value);
			var $cant = ev.value;
			var $date = $('#formVencimiento')
		});

		// Detalle Modal
		$('#myModal').on('show.bs.modal', function (e) {
			$('body').removeClass('open-menu-right');
			$('body').removeClass('open-menu-left');
		});
		// Checkbox tables
		$('table .checkbox input').click(function () {
			if ($(this).is(':checked')) {
				$(this).parent().parent().parent().toggleClass('row_selected');
			}
			else {
				$(this).parent().parent().parent().toggleClass('row_selected');
			}
		});
		// Auto format for numbers
		$('.auto').autoNumeric('init');
	</script>
@endsection

