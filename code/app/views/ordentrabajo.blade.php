@extends('layouts.master')

@section('title')
OT
@endsection

@section('breadcrumb')
@parent
<li><a href="#" class="active">OT</a></li>
@endsection

@section('page-title')
<i class="icon-custom-left"></i>
<h3>Orden de <span class="semi-bold">Trabajo</span></h3>
@endsection

@section('content')
{{-- BEGIN INFO --}}
<div class="grid simple vertical green">
	<div class="grid-title no-border">
		<h4>Ordenes de <span class="semi-bold">Trabajo</span></h4>

		<div class="tools">
			<a class="collapse" href="javascript:;"></a>
			<a class="config" data-toggle="modal" href="#grid-config"></a>
			<a class="reload" href="javascript:;"></a>
			<a class="remove" href="javascript:;"></a>
		</div>
	</div>
	<div class="grid-body no-border">

		<div class="row">

			{{-- BEGIN FORM --}}
			{{ Form::open(array('url' => 'busqueda', 'class' => 'form-inline')) }}

			<div class="col-md-12">
				<div class="row form-row">
					<div class="col-md-2 form-group">
						<label for="formNOrdenTrabajo">N° OT</label>

						<input type="text" class="form-control" placeholder="N° Orden de Trabajo" name="formNOrdenTrabajo">	
					</div>

					<div class="col-md-2">
						<label for="formNombreProyecto">N° Proyecto</label>

						<div class="input-group">
							<input type="text" class="form-control" placeholder="N° Proyecto" name="formNombreProyecto">
							<span class="input-group-addon primary">
								<span class="arrow"></span>
								<i class="fa fa-ellipsis-h"></i>
							</span>
						</div>
					</div>

					<div class="col-md-2">
						<label for="formNCotizacion">N° Cotización</label>

						<div class="input-group">
							<input type="text" class="form-control" placeholder="N° Cotización" name="formNCotizacion">
							<span class="input-group-addon primary">
								<span class="arrow"></span>
								<i class="fa fa-ellipsis-h"></i>
							</span>
						</div>			
					</div>

					<div class="col-md-2">
						<label for="formTipoOT">Tipo OT</label>

						<div class="input-group">
							<input type="text" class="form-control" placeholder="Tipo OT" name="formTipoOT">
							<span class="input-group-addon primary">
								<span class="arrow"></span>
								<i class="fa fa-ellipsis-h"></i>
							</span>
						</div>	
					</div>

					<div class="col-md-3">
						<label for="formCliente">Cliente</label>

						<div class="input-group">
							<input type="text" class="form-control" placeholder="Cliente" name="formCliente">
							<span class="input-group-addon primary">
								<span class="arrow"></span>
								<i class="fa fa-ellipsis-h"></i>
							</span>
						</div>					
					</div>

					<div class="col-md-3">
						<label for="formFechaInicio">Fecha Inicio</label>

						<div class="input-append primary date col-xs-11 col-sm-11 col-md-11 col-lg-11 no-padding">
							<input type="text" class="form-control" placeholder="Fecha Inventario" name="formFechaInicio">
							<span class="add-on">
								<span class="arrow"></span>
								<i class="fa fa-th"></i>
							</span>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="col-md-3">
						<label for="formFechaTermino">Fecha Término</label>

						<div class="input-append primary date col-xs-11 col-sm-11 col-md-11 col-lg-11 no-padding">
							<input type="text" class="form-control" placeholder="Fecha Inventario" name="formFechaTermino">
							<span class="add-on">
								<span class="arrow"></span>
								<i class="fa fa-th"></i>
							</span>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
			{{ Form::close() }}
			{{-- END FORM --}}

		</div>
	</div>
</div>{{-- END SEARCH --}}


{{-- BEGIN  --}}	
<div class="grid simple vertical green">
	<div class="grid-title no-border">
		<h4>Ordenes de <span class="semi-bold">Trabajo</span></h4>

		<div class="tools">
			<a class="collapse" href="javascript:;"></a>
			<a class="config" data-toggle="modal" href="#grid-config"></a>
			<a class="reload" href="javascript:;"></a>
			<a class="remove" href="javascript:;"></a>
		</div>
	</div>
	<div class="grid-body no-border">

		{{-- BEGIN GRID BODY --}}
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-danger" style="margin-bottom: 6px;">
					<div class="panel-body">
						{{ Form::open(array('url' => 'busqueda', 'class' => 'form-inline')) }}
						<div class="form-group" style="width:650px;">
							<label for="requerimiento">Requerimientos Proyectos</label>
							{{ Form::select('estado', array('' => '', 'Asignadosaadafafsa' => 'Asignadofafafaf', 'Sin Asignar' => 'Sin Asignar'), Session::get('estado', ''), array('class' => 'form-control', 'style' => 'width:600px;')) }}
						</div>
						<div class="form-group" style="width:250px;">
							<label for="cantidadhombres">Cantidad Hombres</label>
							<input type="text" class="form-control" placeholder="Cantidad Hombres" name="cantidadhombres" autofocus>	
						</div>
						<div class="form-group" style="width:250px;">
							<label for="horashombre">Horas Hombre</label>
							<input type="text" class="form-control" placeholder="Horas Hombre" name="horashombre" autofocus>
						</div>
						<div class="form-group" style="margin-top: 21px;">
						</div>
					</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
		{{-- END GRID BODY --}}	
	</div>
</div>

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
		$('table .checkbox input').click( function() {
			if($(this).is(':checked')){
				$(this).parent().parent().parent().toggleClass('row_selected');
			}
			else{
				$(this).parent().parent().parent().toggleClass('row_selected');
			}
		});
		// Auto format for numbers
		$('.auto').autoNumeric('init');
	</script>
@endsection


