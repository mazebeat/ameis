@extends('layouts.master')

@section('title')
Kardex
@endsection

@section('breadcrumb')
@parent
<li><a href="#" class="active">Kardex</a></li>
@endsection

@section('page-title')
<i class="icon-custom-left"></i>
<h3><span class="semi-bold">Kardex</span></h3>
@endsection

@section('content')

{{-- BEGIN SEARCH --}}
<div class="grid simple vertical green">
	<div class="grid-title no-border">
		<h4>Busqueda <span class="semi-bold"></span></h4>

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
			{{ Form::open(array('url' => '', 'class' => 'form-no-horizontal-spacing')) }}

			<div class="col-md-12">

				<div class="row form-row">

					<div class="col-md-3">
						<label for="finventario">Fecha Inventario</label> 

						<div class="input-append primary date col-xs-11 col-sm-11 col-md-11 col-lg-11 no-padding">
							<input type="text" class="form-control" placeholder="Fecha Inventario" name="finventario">
							<span class="add-on">
								<span class="arrow"></span>
								<i class="fa fa-th"></i>
							</span>
							<div class="clearfix"></div>
						</div>
					</div>

					<div class="col-md-4">
						<label for="bodega">Bodega</label> 

						<input type="text" class="form-control" placeholder="Bodega" name="bodega">
					</div>

					<div class="col-md-3">
						<label for="codrapido">Código Rápido</label> 

						<input type="text" class="form-control" placeholder="Cod. Proyecto" name="codrapido">
					</div>

				</div>	

				{{-- BEGIN ACTION BUTTONS --}}
				<div class="form-actions">
					<div class="pull-left"></div>
					<div class="pull-right">
						<button class="btn btn-primary btn-cons" type="submit" >Buscar</button>
						<button class="btn btn-white btn-cons" type="button">Cancelar</button>
					</div>
				</div>	
				{{-- END ACTION BUTTONS --}}
			</div>

			{{ Form::close() }}
			{{-- END FORM --}}
			
		</div>
	</div>
</div>{{-- END SEARCH --}}

{{-- BEGIN RESULT --}}
<div class="grid simple vertical blue">
	<div class="grid-title no-border">
		<h4>Resultado <span class="semi-bold"></span></h4>

		<div class="tools">
			<a class="collapse" href="javascript:;"></a>
			<a class="config" data-toggle="modal" href="#grid-config"></a>
			<a class="reload" href="javascript:;"></a>
			<a class="remove" href="javascript:;"></a>
		</div>
	</div>
	<div class="grid-body no-border">

		<div class="table-responsive">
			<table class="table table-bordered no-more-tables">
				<thead>
					<tr class="" style="">
						<th style="width:1%" >
							<div class="checkbox check-default">
								<input id="checkboxMain" type="checkbox" value="1" class="checkall">
								<label for="checkboxMain"></label>
							</div>
						</th>
						<th class="text-center" style="width:10%; vertical-align:middle;">SKU</th>
						<th class="text-center" style="width:10%; vertical-align:middle;">Producto</th>
						<th class="text-center" style="width:24%; vertical-align:middle;">Entrada</th>
						<th class="text-center" style="width:21%; vertical-align:middle;">Salida</th>
						<th class="text-center" style="width:10%; vertical-align:middle;">Cantidad</th>
						<th class="text-center" style="width:10%; vertical-align:middle;">Documento</th>
					</tr>
				</thead>
				<tbody>

					{{-- BEGIN RESULT BUCLE --}}
					<tr class="">
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
					</tr>
					{{-- END RESULT BUCLE --}}

				</tbody>
			</table>
		</div>
	</div>
</div>
.{{-- END RESULT --}}

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
	// Checkbox tables
	$('table .checkbox input').click( function() {
		if($(this).is(':checked')){
			$(this).parent().parent().parent().toggleClass('row_selected');
		}
		else{
			$(this).parent().parent().parent().toggleClass('row_selected');
		}
	});
	// Date Pickers
	$('.input-append.date').datepicker({
		autoclose: true,
		todayHighlight: true
	});
	// Autonumeric
	$('.auto').autoNumeric('init');
</script>
@endsection