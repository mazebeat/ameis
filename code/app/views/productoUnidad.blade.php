@extends('layouts.master')

@section('title')
	Unidad por Producto
@endsection

@section('breadcrumb')
	@parent
	<li>PRODUCTO</li>
	<li><a href="#" class="active">Unidad de Medida</a></li>
@endsection

@section('page-title')
	<i class="icon-custom-left"></i>
	<h3>Asignar UM por <span class="semi-bold">Producto</span></h3>
@endsection

@section('content')
	{{-- BEGIN CREATE CLIENTE--}}
	<div class="grid simple horizontal yellow">
		<div class="grid-title no-border">
			<h4>Asignar <span class="semi-bold">Unidad de Medida</span></h4>

			<div class="tools"><a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a>
				<a href="javascript:;" class="remove"></a></div>
		</div>
		<div class="grid-body no-border">

			{{-- BEGIN GRID BODY --}}
			<form class="form-no-horizontal-spacing" id="form-condensed" novalidate="novalidate">
				<div class="row form-row">
					<div class="col-md-12">

						<div class="row form-row">
							<div class="col-md-3">
								<label for="">Producto</label>

								<div class="input-group">
									<input name="form3FirstName" id="form3FirstName" type="text" class="form-control" placeholder="">
									<span class="input-group-addon primary">
										<span class="arrow"></span>
										<i class="fa fa-ellipsis-h"></i>
									</span>
								</div>
							</div>
							<div class="col-md-3">
								<label for="">Unidad de Medida</label>

								<div class="input-group">
									<input name="form3City" id="form3City" type="text" class="form-control" placeholder="">
									<span class="input-group-addon primary">
										<span class="arrow"></span>
										<i class="fa fa-ellipsis-h"></i>
									</span>
								</div>
							</div>
							<div class="col-md-3">
								<label for="">Tipo Unidad</label>

								<div class="input-group">
									<input name="form3State" id="form3State" type="text" class="form-control" placeholder="">
									<span class="input-group-addon primary">
										<span class="arrow"></span>
										<i class="fa fa-ellipsis-h"></i>
									</span>
								</div>
							</div>
							<div class="col-md-3">
								<label for="">Orden</label>

								<div class="input-group">
									<input name="form3State" id="form3State" type="text" class="form-control" placeholder="">
									<span class="input-group-addon primary">
										<span class="arrow"></span>
										<i class="fa fa-ellipsis-h"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				{{-- BEGIN ACTION BUTTONS --}}
				<div class="form-actions">
					<div class="pull-left"></div>
					<div class="pull-right">
						<button class="btn btn-warning btn-cons" type="submit"><i class="icon-ok"></i> Guardar</button>
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


