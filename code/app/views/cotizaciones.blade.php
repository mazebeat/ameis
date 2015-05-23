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
		<form name="cotizForm" novalidate ng-submit="cotizForm.$valid && saveCotizacion(cotizForm)" class="css-form has-feedback" id="form-condensed" class="form-no-horizontal-spacing">

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
								<input name="form3Cotiz" id="form3Cotiz" type="text" class="form-control" placeholder="N° Cotización" ng-model="cotizacion.numero" required>
								{{--<span class="input-group-addon primary" data-toggle="modal1" data-target="#modalCotizacion1">--}}
								<span class="input-group-addon primary" ng-click="searchCotizacion()">
									<span class="arrow"></span>
									<i class="fa fa-ellipsis-h"></i>
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

					{{--<div class="tools">--}}
					{{--<a class="collapse" href="javascript:;"></a> <a class="config" data-toggle="modal" href="#grid-config"></a> <a class="reload" href="javascript:;"></a>--}}
					{{--<a class="remove" href="javascript:;"></a>--}}
					{{--</div>--}}
				</div>
				<div class="grid-body no-border">

					{{-- BEGIN GRID BODY --}}
					<div class="row">
						<div class="col-md-12">
							<div class="row form-row">
								<div class="col-md-3">
									<label for="">RUT</label>

									<div class="input-group">
										<input name="form3Rut" id="form3Rut" type="text" class="form-control" placeholder="" ng-model="cliente.rut" minlength="8" maxlength="10" required>
										<span class="input-group-addon primary" sglclick="searchCliente()" ng-dblclick="modalCliente()" ng-click-options="{preventDoubleClick: true}">
											<span class="arrow"></span>
											<i class="fa fa-ellipsis-h" ng-show="!loads.cliente.rut"></i>
											<i class="fa fa-circle-o-notch fa-spin" ng-show="loads.cliente.rut"></i>
										</span>
									</div>

									<div ng-messages="cotizForm.form3Rut.$error" role="alert">
										<span class="help-inline text-error" ng-message="required">Requerido</span> <span class="help-inline text-error" ng-message="minlength">Min. 8 digitos</span>
										<span class="help-inline text-error" ng-message="maxlength">Min. 10 digitos</span>
									</div>
									<span class="help-inline text-error" ng-show="errors.cliente.rut">[[ errors.cliente.rut ]]</span>
								</div>

								<div class="col-md-4">
									<label for="">Nombre</label>

									<div class="input-group">
										<input name="form3FirstName" id="form3FirstName" type="text" class="form-control" placeholder="" ng-model="cliente.nombre" required>
										<span class="input-group-addon primary" data-toggle="modal" data-target="#modalCliente" ng-click="searchCliente">
											<span class="arrow"></span>
											<i class="fa fa-ellipsis-h" ng-show="!loads.cliente.nombre"></i>
											<i class="fa fa-circle-o-notch fa-spin" ng-show="loads.cliente.nombre"></i>
										</span>
									</div>
								</div>

								<div class="col-md-5">
									<label for="">Dirección</label>

									<div class="input-group">
										<input name="form3Address" id="form3Address" type="text" class="form-control" placeholder="" ng-model="cliente.direccion" required>
										<span class="input-group-addon primary">
											<span class="arrow"></span>
											<i class="fa fa-ellipsis-h"></i>
										</span>
									</div>
								</div>
							</div>
							<div class="row form-row">

								<div class="col-md-6">
									<label for="">Ciudad</label>

									{{ Form::select2('ciudades', $ciudades, Input::old('ciudades'), array('select2', 'class' => 'form-control select2', 'data-ng-model' => 'cliente.ciudad', 'ng-change' => 'changeCiudades()', 'select-selection' => 'cliente.comuna', 'required')) }}

									{{--<div class="input-group">--}}
									{{--<input name="form3Ciudad" id="form3Ciudad" type="text" class="form-control" placeholder="" readonly ng-model="cliente.ciudad" required>--}}
									{{--<span class="input-group-addon primary" data-toggle="modal" data-target="#modalCiudad">--}}
									{{--<span class="arrow"></span>--}}
									{{--<i class="fa fa-ellipsis-h"></i>--}}
									{{--</span>--}}
									{{--</div>--}}
								</div>

								<div class="col-md-6">
									<label for="">Comuna</label>

									{{--									{{ Form::select2('comunas', $comunas, Input::old('comunas'), array('select2', 'class' => 'form-control select2', 'data-ng-model' => 'cliente.comuna', 'ng-options' =>'c.Id_Comuna as c.Descripcion for c in comunas', 'select-selection' => 'cliente.comuna')) }}--}}
									{{ Form::select2('comunas', $comunas, Input::old('comunas'), array('select2', 'class' => 'form-control select2', 'data-ng-model' => 'cliente.comuna', 'select-selection' => 'cliente.comuna')) }}

									{{--<div class="input-group">--}}
									{{--<input name="form3Comuna" id="form3Comuna" type="text" class="form-control" placeholder="" readonly ng-model="cliente.comuna" required>--}}
									{{--<span class="input-group-addon primary" data-toggle="modal" data-target="#modalComuna">--}}
									{{--<span class="arrow"></span>--}}
									{{--<i class="fa fa-ellipsis-h"></i>--}}
									{{--</span>--}}
									{{--</div>--}}
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

					{{--<div class="tools">--}}
					{{--<a class="collapse" href="javascript:;"></a> <a class="config" data-toggle="modal" href="#grid-config"></a> <a class="reload" href="javascript:;"></a>--}}
					{{--<a class="remove" href="javascript:;"></a>--}}
					{{--</div>--}}
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
									{{--<div class="slider primary">--}}
									{{--<input type="text" id="formVigencia" name="formVigencia" class="form-control" data-slider-max="30" data-slider-step="1" data-slider-value="5" data-slider-orientation="horizontal" data-slider-selection="after">--}}
									{{--</div>--}}

									{{--<input type="hidden" name="formVigencia2" id="formVigencia2" ng-model="proyecto.vigencia">--}}
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
			<div class="grid simple vertical blue">
				<div class="grid-title no-border">
					<h4>Información <span class="semi-bold">Servicio</span></h4>

					{{--<div class="tools">--}}
					{{--<a class="collapse" href="javascript:;"></a> <a class="config" data-toggle="modal" href="#grid-config"></a> <a class="reload" href="javascript:;"></a>--}}
					{{--<a class="remove" href="javascript:;"></a>--}}
					{{--</div>--}}
				</div>
				<div class="grid-body no-border">
					<div class="row form-row">
						<div class="col-md-2">
							<label for="formTipoServicio">Tipo Servicio</label>

							{{ Form::select2('formTipoServicios', $tservicios, Input::old('formTipoServicios'), array('id' => 'formTipoServicio', 'class' => 'select22 form-control', 'style' => 'width:100%', 'ng-model' => 'servicio.tipoServicio', 'ng-change' => 'changeServicio()')) }}
						</div>
						<div class="col-md-3">
							<label for="formServicio">Servicio</label>

							<div class="input-group">
								<input name="form3Servicio" id="form3Servicio" type="text" class="form-control" placeholder="" ng-model="servicio.servicio">
							<span class="input-group-addon primary" data-toggle="modal" data-target="#modalServicio">
								<span class="arrow"></span>
								<i class="fa fa-ellipsis-h"></i>
							</span>
							</div>
						</div>
						<div class="col-md-2">
							<label for="formPrecio">Precio</label>

							<input type="text" class="form-control auto" data-a-sep="," data-a-dec="." placeholder="$" name="formPrecio" value="0" readonly ng-model="servicio.precio">
						</div>
						<div class="col-md-1">
							<div class="form-group">
								<label for="formUnidad">U.N</label>
								<input type="text" class="form-control" name="formUnidad" id="formUnidad" value="{{ Input::old('formUnidad') }}" readonly ng-model="servicio.unidad">
								{{-- 							{{ Form::select2('formUnidad', $unidades, Input::old('formUnidad'), array('id' => 'formUnidad', 'class' => 'select2 form-control', 'style' => 'width:100%', 'ng-model' => 'servicio.unidad')) }} --}}
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="formCantidad">Cantidad</label>

								<input type="number" class="form-control" placeholder="" name="formCantidad" value="" ng-model="servicio.cantidad" min="0" ng-change="changeCantidad()">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="formTotal">Total</label>

								<input type="text" class="form-control auto" data-a-sep="," data-a-dec="." placeholder="$" name="formTotal" value="0" readonly ng-model="servicio.total">
							</div>
						</div>
					</div>
					<div class="row form-row">
						<div class="col-md-12">
							<label for="formDescripcion">Descripción</label>

							<textarea id="formDescripcion" name="formDescripcion" placeholder="..." class="form-control" rows="3" ng-model="servicio.descripcion"></textarea>
						</div>
					</div>
					<div class="form-actions">
						<div class="pull-left"></div>
						<div class="pull-right">
							<button class="btn btn-success btn-cons" type="button" ng-click="addService()">Agregar</button>
						</div>
					</div>
				</div>
			</div>
			{{-- END SERVICES --}}

			{{-- BEGIN DETAIL --}}
			<div class="grid simple horizontal red">
				<div class="grid-title no-border">
					<h4>Detalle <span class="semi-bold">Proyecto</span></h4>

					{{--<div class="tools">--}}
					{{--<a class="collapse" href="javascript:;"></a> <a class="config" data-toggle="modal" href="#grid-config"></a> <a class="reload" href="javascript:;"></a>--}}
					{{--<a class="remove" href="javascript:;"></a>--}}
					{{--</div>--}}
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
										<td class="text-center">[[ d.nombreTipoServicio ]]</td>
										<td class="text-center">[[ d.servicio ]]</td>
										<td class="text-center">[[ d.precio | currency ]]</td>
										<td class="text-center">[[ d.unidad ]]</td>
										<td class="text-center">[[ d.cantidad ]]</td>
										<td class="text-center">[[ d.total | currency ]]</td>
										<td class="text-center">
											<a class="btn btn-info btn-sm btn-small" data-toggle="modal" data-target="#tableDetalle_[[ $index ]]"><i class="fa fa-outdent"></i></a>

											{{-- BEGIN MODAL --}}
											<div class="modal fade" id="tableDetalle_[[ $index ]]" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">

													{{-- BEGIN MODAL-CONTENT --}}
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															<br> <i class="fa fa-outdent fa-7x"></i>
															<h4 id="myModalLabel" class="semi-bold">[[ d.nombreTipoServicio ]] - [[ d.servicio ]]</h4>

															<p class="no-margin"></p><br>
														</div>
														<div class="modal-body">
															<p>[[ d.descripcion ]]</p>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
														</div>
													</div>
												</div>
											</div>
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

			<div class="grid simple transparent">
				<div class="grid-body">
					<div class="row">
						<div class="col-md-3  pull-right">
							<div class="table-responsive">
								<table class="table table-bordered no-more-tables">
									<tbody>
									<tr>
										<td class="text-left">Subtotal</td>
										<td class="text-right">[[ detalleTotal.subtotal | currency ]]</td>
									</tr>
									<tr>
										<td class="text-left">IVA</td>
										<td class="text-right">[[ detalleTotal.iva | currency ]]</td>
									</tr>
									<tr>
										<td class="text-left">Total</td>
										<td class="text-right">[[ detalleTotal.total | currency ]]</td>
									</tr>
									</tbody>
								</table>
							</div>
							{{-- END GRID BODY --}}
						</div>
					</div>
				</div>
			</div>

			{{-- BEGIN ACTION BUTTONS --}}
			<div class="form-actions">
				<div class="pull-left">
					<button class="btn btn-warning  btn-cons" type="submit"><i class="fa fa-upload"></i> Cargar Archivo</button>
				</div>
				<div class="pull-right">
					{{--<button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-check"></i>&nbsp;Guardar</button>--}}
					<button class="btn btn-danger btn-cons btnGuardar" type="submit" ng-disabled="cotizForm.$invalid"><i class="fa fa-check"></i>&nbsp;Guardar</button>
					<button class="btn btn-white btn-cons" type="button">Cancelar</button>
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
						<table class="table table-striped table-flip-scroll cf">
							<thead class="cf">
							<tr>
								<th>
									<div class="checkbox check-default">
										<input id="checkboxall" type="checkbox" value="1" class="checkall"> <label for="checkboxall"></label>
									</div>
								</th>
								<th>Nombres</th>
								<th>Apellidos</th>
							</tr>
							</thead>
							<tbody>
							<tr ng-repeat="c in clientes">
								<td>
									<div class="checkbox check-default">
										<input id="checkbox_[[ c.Id_Cliente ]]" type="checkbox" value="1"> <label for="checkbox_[[ c.Id_Cliente ]]"></label>
									</div>
								</td>
								<td>[[ c.Nombre ]]</td>
								<td>[[ c.Apellido_Paterno ]]</td>
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
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Seleccionar un Servicio</h4>
					</div>
					<div class="modal-body">
						<table class="table table-striped table-flip-scroll cf" ng-show="servicios.length >= 1">
							<thead class="cf">
							<tr>
								<th></th>
								<th>Servicio</th>
							</tr>
							</thead>
							<tbody>
							<tr ng-repeat="s in servicios">
								<td>
									<input id="radio_[[ $index ]]" type="radio" name="service" value="[[ $index ]]" ng-model="$parent.servicioSelect">
								</td>
								<td>[[ s.Descripcion_Servicio ]]</td>
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
	</div>
	{{-- <input type="text" class="span12 auto" data-a-sep="," data-a-dec="."> --}}
@endsection

@section('rightmenu')
	{{ \HTML::listaPendientes($pendientes) }}
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
	{{ HTML::script('assets/plugins/pace/pace.min.js') }}
	{{ HTML::script('assets/plugins/jquery-block-ui/jqueryblockui.js') }}
	{{ HTML::script('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}
	{{ HTML::script('assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}
	{{ HTML::script('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}
	{{ HTML::script('assets/plugins/jquery-inputmask/jquery.inputmask.min.js') }}
	{{ HTML::script('assets/plugins/jquery-autonumeric/autoNumeric.js') }}
	{{ HTML::script('assets/plugins/ios-switch/ios7-switch.js') }}
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

		//		document.querySelector('.btnGuardar').onclick = function(){
		//			swal({
		//				title: "Cotizacion Exitosa!",
		//				text: "Se ha completado correctamente la cotización.",
		//				type: "success",
		//				showCancelButton: false,
		//				closeOnConfirm: false,
		//				confirmButtonClass: 'btn-success',
		//				confirmButtonText: ''
		//			});
		//		};
		//		$('#descripcion').wysihtml5();

		//		$("#formTipoServicio").select2({
		//			placeholder: "...",
		//			allowClear: true
		//		});

		//		$("#comunas").select2({
		//			placeholder: "...",
		//			allowClear: true
		//		});
		//
		//		$("#ciudades").select2({
		//			placeholder: "...",
		//			allowClear: true
		//		});

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


