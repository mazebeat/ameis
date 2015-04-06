@extends('layouts.master')

@section('title')
	Productos
@endsection

@section('breadcrumb')
	@parent
	<li>MANTENEDORES</li>
	<li><a href="#" class="active">Productos</a></li>
@endsection

@section('page-title')
	<i class="icon-custom-left"></i>
	<h3><span class="semi-bold">Producto</span></h3>
@endsection

@section('content')
	<!-- BEGIN FORM -->

	{{ Form::open(array('url' => '', 'method' => 'POST', 'id' => 'form-condensed', 'class' => 'form-no-horizontal-spacing')) }}

	{{-- BEGIN PRODUCTO --}}
	<div class="grid simple vertical green">
		<div class="grid-title no-border">
			<h4>Información <span class="semi-bold">Básica</span></h4>

			<div class="tools">
				<a class="collapse" href="javascript:;"></a> <a class="config" data-toggle="modal" href="#grid-config"></a> <a class="reload" href="javascript:;"></a>
				<a class="remove" href="javascript:;"></a>
			</div>
		</div>
		<div class="grid-body no-border">

			{{-- BEGIN GRID BODY --}}
			<div class="row">
				<div class="col-md-12">
					<div class="row form-row">
						<div class="col-md-7">
							<label for="">Nombre Producto</label>

							<div class="input-group">
								<input name="form3Address" id="form3Address" type="text" class="form-control" placeholder="">
							<span class="input-group-addon primary">
								<span class="arrow"></span>
								<i class="fa fa-ellipsis-h"></i>
							</span>
							</div>
						</div>
						<div class="col-md-5">
							<label for="">Marca</label>

							<div class="input-group">
								<input name="form3FirstName" id="form3FirstName" type="text" class="form-control" placeholder="">
							<span class="input-group-addon primary">
								<span class="arrow"></span>
								<i class="fa fa-ellipsis-h"></i>
							</span>
							</div>
						</div>

					</div>
					<div class="row form-row">
						<div class="col-md-12">
							<label for="formDescripcion">Descripción</label>

							<textarea id="formDescripcion" name="formDescripcion" placeholder="..." class="form-control" rows="3"></textarea>
						</div>
					</div>

					<h5>Propiedades</h5>

					<div class="row form-row">

						<div class="col-md-2">
							<label for="">Ancho</label>

							<input name="form3Ciudad" id="form3Ciudad" type="text" class="form-control" placeholder="">
						</div>
						<div class="col-md-2">
							<label for="">Alto</label>

							<input name="form3Ciudad" id="form3Ciudad" type="text" class="form-control" placeholder="">
						</div>

						<div class="col-md-3">
							<label for="">Estado</label>

							<select id="formEstado" class="select2 form-control" style="width:100%">
								<option value=""></option>
							</select>
						</div>

						<div class="col-md-5">
							<label for="">Codigo de Barra</label>

							<div class="input-group">
								<input name="form3Comuna" id="form3Comuna" type="text" class="form-control" placeholder="" readonly>
							<span class="input-group-addon primary">
								<span class="arrow"></span>
								<i class="fa fa-ellipsis-h"></i>
							</span>
							</div>
						</div>
					</div>

					<h5>Valores</h5>

					<div class="row form-row">

						<div class="col-md-4">
							<label for="">Costo</label>

							<input name="form3Ciudad" id="form3Ciudad" type="text" class="form-control auto" placeholder="">
						</div>
						<div class="col-md-5">
							<label for="">Lista de Costo</label>

							<select id="formListaCosto" class="select2 form-control" style="width:100%">
								<option value=""></option>
							</select>
						</div>
					</div>
				</div>
			</div>
			{{-- END GRID BODY --}}

		</div>
	</div>
	{{-- END PRODUCTO --}}

	<div class="grid simple vertical green">
		<div class="grid-title no-border">
			<h4>Datos <span class="semi-bold">Extras</span></h4>

			<div class="tools">
				<a class="collapse" href="javascript:;"></a> <a class="config" data-toggle="modal" href="#grid-config"></a> <a class="reload" href="javascript:;"></a>
				<a class="remove" href="javascript:;"></a>
			</div>
		</div>
		<div class="grid-body no-border">
			<div class="row form-row">
				<div class="col-md-9">
					<label for="formDescripcion">Observaciones</label>

					<textarea id="formObservarcion" name="formObservarcion" placeholder="..." class="form-control" rows="5"></textarea>
				</div>
				<div class="col-md-3">
					<label for="">Imagen</label>

					<form action="/file-upload" class="dropzone no-margin">
						<div class="fallback">
							{{--<input name="file" type="file" multiple />--}}
						</div>
					</form>
				</div>
			</div>
			<div class="row form-row">
				<div class="col-md-12">
					<label for="">Caracteristicas</label>

					<select id="multi" style="width:100%" multiple>
						<option value="solid">Solido</option>
						<option value="limitado">Limitado</option>
						<option value="acero">Acero</option>
						<option value="etc">etc...</option>
					</select>
				</div>
			</div>
		</div>
	</div>

	{{-- BEGIN DETAIL --}}

	{{-- END DETAIL --}}

	{{-- BEGIN ACTION BUTTONS --}}
	<div class="form-actions">
		<div class="pull-left"></div>
		<div class="pull-right">
			<button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-check"></i> Guardar</button>
			<button class="btn btn-white btn-cons" type="button">Cancelar</button>
		</div>
	</div>
	{{-- END ACTION BUTTONS --}}

	{{ Form::close() }}
	<!-- END FORM -->

	{{-- <input type="text" class="span12 auto" data-a-sep="," data-a-dec="."> --}}
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
	{{ HTML::script('assets/plugins/dropzone/dropzone.min.js') }}
	<!-- END PAGE LEVEL PLUGINS -->
	{{--{{ HTML::script('assets/js/form_elements.js') }}--}}
	<script>
		$('#formDescripcion').wysihtml5();
		$('#formObservarcion').wysihtml5();

		// Tipo Servicio Select2
		$("#multi").val(["acero", "limitado", "etc"]).select2();

		//Color pickers
		$('.my-colorpicker-control').colorpicker()

		// Auto format for numbers
		$('.auto').autoNumeric('init');

		//Drag n Drop up-loader
		$("div#myId").dropzone({url: "/file/post"});

		// Tipo Servicio Select2
		$("#formEstado").select2({
			placeholder: " ",
			allowClear: true
		});
		$("#formListaCosto").select2({
			placeholder: " ",
			allowClear: true
		});
	</script>
@endsection


