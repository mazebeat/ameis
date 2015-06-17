@extends('layouts.master')

@section('title')
	Proyectos
@endsection

@section('breadcrumb')
	@parent
	<li><a href="#" class="active">Proyectos</a></li>
@endsection

@section('page-title')
	<i class="icon-custom-left"></i>
	<h3><span class="semi-bold">Proyectos</span></h3>
@endsection

@section('content')
	<div ng-controller="ProyectosController">

		{{--BEGIN FORM --}}
		<form name="proyeForm" novalidate ng-submit="proyeForm.$valid && saveProyectos(proyeForm)" class="css-form" id="form-condensed" class="form-no-horizontal-spacing">

		{{-- BEGIN PROYECTO --}}
		<div class="grid simple vertical green">
			<div class="grid-title no-border">
				<h4>Información <span class="semi-bold">Cliente</span></h4>

				{{--<div class="tools">
				{{--<a class="collapse" href="javascript:;"></a> <a class="config" data-toggle="modal" href="#grid-config"></a> <a class="reload" href="javascript:;"></a>
				{{--<a class="remove" href="javascript:;"></a>--}}
				{{--</div>--}}
			</div>
			<div class="grid-body no-border">

				{{-- BEGIN GRID BODY --}}
				<div class="row">
					<div class="col-md-12">
						<div class="row form-row">
							<div class="col-md-2">
								<label for="formNumCotizacion">N° Cotización</label>
								<input type="text" class="form-control" placeholder="" name="formNumCotizacion" ng-model="proyecto.NumCotizacion" required>
							</div>
							<div class="col-md-2">
								<label for="formNumProyecto">N° Proyecto</label>
								<input type="text" class="form-control" placeholder="" name="formNumProyecto" ng-model="proyecto.NumProyecto" required>
							</div>

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

									<div ng-messages="proForm.form3Rut.$error" role="alert">
										<span class="help-inline text-error" ng-message="required">Requerido</span> <span class="help-inline text-error" ng-message="minlength">Min. 8 digitos</span>
										<span class="help-inline text-error" ng-message="maxlength">Min. 10 digitos</span>
									</div>
									<span class="help-inline text-error" ng-show="errors.cliente.rut">[[ errors.cliente.rut ]]</span>
								</div>


								<div class="col-md-5">
									<label for="formCliente">Cliente</label>
									<input type="text" class="form-control" placeholder="" name="formCliente" ng-model="proyecto.nombre" required>
								</div>
						</div>

						<div class="row form-row">
								<div class="col-md-3">
									<label for="finventario">Fecha</label> 

									<div class="input-append primary date col-xs-11 col-sm-11 col-md-11 col-lg-11 no-padding">
										<input type="text" class="form-control" placeholder="Fecha" name="fecha">
										<span class="add-on">
											<span class="arrow"></span>
											<i class="fa fa-th"></i>
										</span>
										<div class="clearfix"></div>
									</div>
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
						</div>

						<div class="row form-row">
							<div class="col-md-6">
								<label for="direccion">Dirección</label>

								<div class="input-group">
									<input type="text" class="form-control" placeholder="" name="direccion">
									<span class="input-group-addon primary">
										<span class="arrow"></span>
										<i class="fa fa-ellipsis-h"></i>
									</span>
								</div>
							</div>

								<div class="col-md-5">
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
		{{-- END PROYECTO --}}

		{{-- BEGIN CLIENTE --}}
		<div class="grid simple vertical blue">
			<div class="grid-title no-border">
				<h4>Información <span class="semi-bold">Proyecto</span></h4>

				<div class="tools">
					<a class="collapse" href="javascript:;"></a> <a class="config" data-toggle="modal" href="#grid-config"></a> <a class="reload" href="javascript:;"></a>
					<a class="remove" href="javascript:;"></a>
				</div>
			</div>
			<div class="grid-body no-border">
				<div class="row">
					<div class="col-md-12">
						<div class="row form-row">
							<div class="col-md-12">
								<label for="descripcion">Nombre Proyecto</label>

								<input type="text" class="form-control" placeholder="" name="descripcion" autofocus>
							</div>
						</div>

						<div class="row form-row">
							<div class="col-md-6">
								<label for="descripcion">Descripcion Especificaciones</label> <input type="text" class="form-control" placeholder="" name="descripcion" autofocus>
							</div>

						<div class="col-md-1">
							<div class="form-group">
								<label for="formUnidad">U.N</label>
								<input type="text" class="form-control" name="formUnidad" id="formUnidad" value="{{ Input::old('formUnidad') }}" readonly ng-model="servicio.unidad">
								{{-- 							{{ Form::select2('formUnidad', $unidades, Input::old('formUnidad'), array('id' => 'formUnidad', 'class' => 'select2 form-control', 'style' => 'width:100%', 'ng-model' => 'servicio.unidad')) }} --}}
							</div>
						</div>
							<div class="col-md-2">
								<label for="cantidad">Cantidad</label> <input type="text" class="form-control" placeholder="" name="cantidad" autofocus>
							</div>
							<div class="col-md-2">
								<label for="total">Total</label> <input type="text" class="form-control" placeholder="" name="total" autofocus>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		{{-- END CLIENTE --}}

		{{-- BEGIN DETAIL --}}
		<div class="grid simple horizontal red">
			<div class="grid-title no-border">
				<h4>Detalle <span class="semi-bold">Proyecto</span></h4>

				<div class="tools">
					<a class="collapse" href="javascript:;"></a> <a class="config" data-toggle="modal" href="#grid-config"></a> <a class="reload" href="javascript:;"></a>
					<a class="remove" href="javascript:;"></a>
				</div>
			</div>
			<div class="grid-body no-border">

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
							<th class="text-center" style="width:5%; vertical-align:middle;">N° Linea</th>
							<th class="text-center" style="width:30%; vertical-align:middle;">Especificaciones</th>
							<th class="text-center" style="width:2%; vertical-align:middle;">Unidad</th>
							<th class="text-center" style="width:2%;  vertical-align:middle;">Cantidad</th>
							<th class="text-center" style="width:6%;  vertical-align:middle;">Unitario</th>
							<th class="text-center" style="width:6%;  vertical-align:middle;">Total</th>
						</tr>
						</thead>
						<tbody>

						{{-- BEGIN RESULT LOOP --}}
						<tr>
							<td>
								<div class="checkbox check-default">
									<input id="checkbox1" type="checkbox" value="1"> <label for="checkbox1"></label>
								</div>
							</td>
							<td class="text-center">2</td>
							<td class="text-left">Provisiones Tabiques</td>
							<td class="text-center">m2</td>
							<td class="text-center">1</td>
							<td class="text-right">$ 50,000.00</td>
							<td class="text-right">$ 50,000.00</td>
						</tr>
						{{-- END RESULT LOOP --}}

						</tbody>
					</table>
					{{-- END TABLE --}}

				</div>
				{{-- END GRID BODY --}}

			</div>
		</div>
		{{-- END DETAIL --}}
		{{-- BEGIN ACTION BUTTONS --}}
		<div class="form-actions">
			<div class="pull-left">
				<button class="btn btn-warning  btn-cons" type="submit"><i class="fa fa-upload"></i> Cargar Archivo</button>
			</div>
			<div class="pull-right">
				<button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-check"></i> Guardar</button>
				<button class="btn btn-white btn-cons" type="button">Cancelar</button>
			</div>
		</div>
		{{-- END ACTION BUTTONS --}}

		</form>
		{{--END FORM--}}
	  
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

	</div>
	{{-- <input type="text" class="span12 auto" data-a-sep="," data-a-dec="."> --}}
@endsection

@section('rightmenu')
	{{ \HTML::listaPendientes($pendientes) }}
@endsection

@section('style')
	{{ HTML::style('http://lipis.github.io/bootstrap-sweetalert/lib/sweet-alert.css') }}
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
	{{ HTML::script('http://lipis.github.io/bootstrap-sweetalert/lib/sweet-alert.js') }}
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
	{{-- {{ HTML::script('assets/js/form_elements.js') }} --}}
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
	// Date Pickers
	$('.input-append.date').datepicker({
		autoclose: true,
		todayHighlight: true
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