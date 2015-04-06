@extends('layouts.master')

@section('title')
	Usuarios
@endsection

@section('breadcrumb')
	@parent
	<li><a href="#" class="active">Usuario</a></li>
@endsection

@section('page-title')
	<i class="icon-custom-left"></i>
	<h3>Crear <span class="semi-bold">Usuario</span></h3>
@endsection

@section('content')
	{{-- BEGIN CREATE CLIENTE--}}
	<div class="grid simple vertical red">
		<div class="grid-title no-border">
			<h4>Crear/Modificar <span class="semi-bold">Usuario</span></h4>

			<div class="tools"><a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a>
				<a href="javascript:;" class="remove"></a></div>
		</div>
		<div class="grid-body no-border">

			{{-- BEGIN GRID BODY --}}
			<form class="form-no-horizontal-spacing" id="form-condensed" novalidate="novalidate">
				<div class="row column-seperation">

					<div class="col-md-6">
						<h4>Información Básica</h4>

						<div class="row form-row">
							<div class="col-md-12">
								<div class="input-group">
									<input name="form3FirstName" id="form3FirstName" type="text" class="form-control" placeholder="Usuario">
									<span class="input-group-addon primary">
										<span class="arrow"></span>
										<i class="fa fa-ellipsis-h"></i>
									</span>
								</div>
							</div>
							<div class="col-md-12">
								<input name="form3FirstName" id="form3FirstName" type="text" class="form-control" placeholder="Nombres">
							</div>
							<div class="col-md-6">
								<input name="form3LastName" id="form3LastName" type="text" class="form-control" placeholder="Apellido Paterno">
							</div>
							<div class="col-md-6">
								<input name="form3LastName" id="form3LastName" type="text" class="form-control" placeholder="Apellidos Materno">
							</div>
						</div>
						<div class="row form-row">
							<div class="col-md-5">
								<div class="select2-container select2 form-control" id="s2id_form3Gender">
									<a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">
										<span class="select2-chosen">Estado Civil</span><abbr class="select2-search-choice-close"></abbr>
										<span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen3">

									<div class="select2-drop select2-display-none select2-with-searchbox">
										<div class="select2-search">
											<input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input"></div>
										<ul class="select2-results"></ul>
									</div>
								</div>
								<select name="form3Gender" id="form3Gender" class="select2 form-control select2-offscreen" tabindex="-1">
									<option value="1">Masculino</option>
									<option value="2">Femenino</option>
								</select>
							</div>
							<div class="col-md-6">
								<div class="radio">
									<input id="male" type="radio" name="gender" value="male" checked="checked"> <label for="male">Masculino</label>
									<input id="female" type="radio" name="gender" value="female"> <label for="female">Femenino</label>
								</div>
							</div>
						</div>
						<div class="row form-row">
							<div class="col-md-5">
								<input type="text" placeholder="Fecha de Nacimiento" class="form-control" id="form3DateOfBirth" name="form3DateOfBirth">
							</div>
							<div class="col-md-7">
								<input type="text" placeholder="Nacionalidad" class="form-control" id="form3DateOfBirth" name="form3DateOfBirth">
							</div>
						</div>
						<div class="row form-row">
							<div class="col-md-6">
								<input name="form3Occupation" id="form3Occupation" type="text" class="form-control" placeholder="Telefono Fijo">
							</div>
							<div class="col-md-6">
								<input name="form3Occupation" id="form3Occupation" type="text" class="form-control" placeholder="Telefono Celular">
							</div>
						</div>
						<div class="row form-row">
							<div class="col-md-12">
								<input name="form3Email" id="form3Email" type="text" class="form-control" placeholder="email@email.com">
							</div>
						</div>
					</div>
					{{-- END BASIC INFORMATION --}}

					{{-- BEGIN WORK INFORMATION --}}
					<div class="col-md-6">


						<div class="row form-row">
							<div class="col-md-7">
								<h4>Información Laboral</h4>
							</div>
							<div class="col-md-5 pull-right">
								<label for="">Fecha Ingreso</label>
								<input name="form3PostalCode" id="form3PostalCode" type="text" class="form-control" placeholder="Fecha Ingreso" value="{{ Carbon::now() }}">
							</div>
						</div>
						<div class="row form-row">
							<div class="col-md-6">
								<div class="input-group">
									<input name="form3Address" id="form3Address" type="text" class="form-control" placeholder="Tipo Usuario">
									<span class="input-group-addon primary">
										<span class="arrow"></span>
										<i class="fa fa-ellipsis-h"></i>
									</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group">
									<input name="form3Country" id="form3Country" type="text" class="form-control" placeholder="Tipo Contrato">
									<span class="input-group-addon primary">
										<span class="arrow"></span>
										<i class="fa fa-ellipsis-h"></i>
									</span>
								</div>
							</div>
						</div>
						<div class="row form-row">
							<div class="col-md-6">
								<div class="input-group">
									<input name="form3City" id="form3City" type="text" class="form-control" placeholder="AFP">
									<span class="input-group-addon primary">
										<span class="arrow"></span>
										<i class="fa fa-ellipsis-h"></i>
									</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group">
									<input name="form3State" id="form3State" type="text" class="form-control" placeholder="Isapre">
									<span class="input-group-addon primary">
										<span class="arrow"></span>
										<i class="fa fa-ellipsis-h"></i>
									</span>
								</div>
							</div>
						</div>

						{{--<div class="row small-text">--}}
						{{--<p class="col-md-12">NOTE - Facts to be considered, Simply remove or edit this as for what you desire. Disabled font Color and size </p>--}}
						{{--</div>--}}

					</div>
				</div>

				{{-- BEGIN ACTION BUTTONS --}}
				<div class="form-actions">
					<div class="pull-left">
						<div class="checkbox checkbox check-success">
							<input type="checkbox" value="1" id="chkTerms"> <label for="chkTerms">Acepto las condiciones que conllevan los datos ingresados en este formulario. </label>
						</div>
					</div>
					<div class="pull-right">
						<button class="btn btn-danger btn-cons" type="submit"><i class="icon-ok"></i> Guardar</button>
						<button class="btn btn-white btn-cons" type="button">Cancelar</button>
					</div>
				</div>
				{{-- END ACTION BUTTONS --}}

			</form>
			{{-- END GRID BODY --}}

		</div>
	</div>
	{{-- END CREATE CLIENT --}}





@endsection

@section('style')
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
		//		$('#descripcion').wysihtml5();
		// Tipo Servicio Select2
		$("#form3TipoServicio").select2({
			placeholder: " ",
			allowClear: true
		});
		// Unidad de Medida Select2
		$("#form3Unidad").select2({
			placeholder: " ",
			allowClear: true
		});
		// Vigencia Slider
		$('#formVigencia').slider();
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


