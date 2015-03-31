@extends('layouts.master')

@section('title')
Informes
@endsection

@section('breadcrumb')
@parent
<li><a href="#" class="active">Informes</a></li>
@endsection

@section('page-title')
<i class="fa fa-file-text-o"></i>
<h3><span class="semi-bold">Informe</span></h3>
@endsection

@section('content')

{{-- BEGIN SEARCH --}}
<div class="grid simple vertical green">
	<div class="grid-title no-border">
		<h4>Busqueda <span class="semi-bold">Informes</span></h4>

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
			{{-- BEGIN FORM --}}
			{{ Form::open(array('url' => '', 'class' => 'form-no-horizontal-spacing')) }}
			
			<div class="col-md-12">

				<div class="row form-row">
					<div class="col-md-3">
						<label for="formState">Estado</label>

						<select id="formState" class="select2 form-control" style="width:100%">
							<option value=""></option>
						</select>
					</div>
					
					<div class="col-md-3">
						<label for="formFechaDesde">Fecha Desde</label> 

						<div class="input-append primary date col-xs-11 col-sm-11 col-md-11 col-lg-11 no-padding">
							<input type="text" class="form-control" placeholder="" name="formFechaDesde">
							<span class="add-on">
								<span class="arrow"></span>
								<i class="fa fa-th"></i>
							</span>
						</div>
						<div class="clearfix"></div>
					</div>
					
					<div class="col-md-3">
						<label for="formFechaHasta">Fecha Hasta</label> 

						<div class="input-append primary date col-xs-11 col-sm-11 col-md-11 col-lg-11 no-padding">
							<input type="text" class="form-control" placeholder="" name="formFechaHasta">
							<span class="add-on">
								<span class="arrow"></span>
								<i class="fa fa-th"></i>
							</span>
						</div>
						<div class="clearfix"></div>
					</div>
					
				</div>
				{{-- BEGIN ACTION BUTTONS --}}
				<div class="form-actions">
					<div class="pull-left"></div>
					<div class="pull-right">
						<button id="formSubmit" type="submit" class="btn btn-primary btn-cons">Generar Informe</button>
						<button class="btn btn-white btn-cons" type="button">Cancelar</button>
					</div>
				</div>	
				{{-- END ACTION BUTTONS --}}
			</div>
			{{ Form::close() }}
			{{-- END FORM --}}
		</div>
		{{-- END GRID BODY --}}

	</div>
</div>
{{-- END SEARCH --}}

{{-- BEGIN RESULT --}}
<div class="grid simple vertical red">
	<div class="grid-title no-border">
		<h4>Resultados <span class="semi-bold"></span></h4>

		<div class="tools">
			<a class="collapse" href="javascript:;"></a>
			<a class="config" data-toggle="modal" href="#grid-config"></a>
			<a class="reload" href="javascript:;"></a>
			<a class="remove" href="javascript:;"></a>
		</div>
	</div>
	<div class="grid-body no-border">

		{{-- BEGIN GRID BODY --}}
		<div class="table-responsive">
			<table class="table table-bordered no-more-tables">
				<thead>
					<tr>
						<th style="width:1%" >
							<div class="checkbox check-default">
								<input id="checkboxMain" type="checkbox" value="1" class="checkall">
								<label for="checkboxMain"></label>
							</div>
						</th>
						<th style="width:10%; vertical-align:middle;">N° Linea</th>
						<th style="width:40%; vertical-align:middle;">Especificaciones</th>
						<th style="width:14%; vertical-align:middle;">Unidad</th>
						<th style="width:11%; vertical-align:middle;">Cantidad</th>
						<th style="width:10%; vertical-align:middle;">Unitario</th>
						<th style="width:10%; vertical-align:middle;">Total</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<div class="checkbox check-default">
								<input id="checkbox1" type="checkbox" value="1">
								<label for="checkbox1"></label>
							</div>
						</td>
						<td class="text-center">777</td>
						<td class="text-center">Escalera</td>
						<td class="text-center">7</td>
						<td class="text-center">3</td>
						<td class="text-center">4</td>
						<td class="text-center">GDP-1</td>
					</tbody>		
				</table>
			</div>
		</div>
		{{-- END GRID BODY --}}

	</div>
</div>
{{-- END RESULT --}}

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
<script>
	$('table .checkbox input').click( function() {
		if($(this).is(':checked')){
			$(this).parent().parent().parent().toggleClass('row_selected');
		}
		else{
			$(this).parent().parent().parent().toggleClass('row_selected');
		}
	});
	//Date Pickers
	$('.input-append.date').datepicker({
		autoclose: true,
		todayHighlight: true
	});
	$('#formState').select2();
</script>
@endsection