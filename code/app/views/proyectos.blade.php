@extends('layouts.master')

@section('title')
	Proyectos
@endsection

@section('breadcrumb')
	@parent
	<li><a href="#" class="active">Proyectos</a></li>
@endsection

@section('page-title')
	<i class="fa fa-dot-circle-o"></i>
	<h3><span class="semi-bold">Proyectos</span></h3>
@endsection

@section('content')
	<div class="grid simple vertical green">
		<div class="grid-title no-border">
			<h4>Información <span class="semi-bold">Cliente</span></h4>

			<div class="tools">
				<a class="collapse" href="javascript:;"></a> <a class="config" data-toggle="modal" href="#grid-config"></a> <a class="reload" href="javascript:;"></a>
				<a class="remove" href="javascript:;"></a>
			</div>
		</div>
		<div class="grid-body no-border">
			<div class="row">
				<div class="col-md-12">

					<div class="row form-row">
						<div class="col-md-2">
							<label for="nct">N° Cotización</label>

							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nct" autofocus>
								<span class="input-group-addon primary">
									<span class="arrow"></span>
									<i class="fa fa-ellipsis-h"></i>
								</span>
							</div>
						</div>
						<div class="col-md-2">
							<label for="pro">N° Proyecto</label>

							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="nproy" autofocus>
								<span class="input-group-addon primary">
									<span class="arrow"></span>
									<i class="fa fa-ellipsis-h"></i>
								</span>
							</div>
						</div>

						<div class="col-md-2">
							<label for="rut">RUT</label>

							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="rut" autofocus>
								<span class="input-group-addon primary">
									<span class="arrow"></span>
									<i class="fa fa-ellipsis-h"></i>
								</span>
							</div>

						</div>

						<div class="col-md-2">
							<label for="cliente">Cliente</label>

							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="cliente" autofocus>
								<span class="input-group-addon primary">
									<span class="arrow"></span>
									<i class="fa fa-ellipsis-h"></i>
								</span>
							</div>
						</div>


						<div class="col-md-2">
							<label for="fecha">Fecha</label>

							<input type="text" class="form-control" placeholder="" name="fecha" autofocus value="{{ Carbon::now()  }}">
						</div>


						<div class="col-md-2">
							<label for="vigencia">Vigencia</label>

							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="vigencia" autofocus>
								<span class="input-group-addon primary">
									<span class="arrow"></span>
									<i class="fa fa-ellipsis-h"></i>
								</span>
							</div>
						</div>

					</div>

					<div class="row form-row">
						<div class="col-md-8">
							<label for="direccion">DIRECCION</label>

							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="direccion">
								<span class="input-group-addon primary">
									<span class="arrow"></span>
									<i class="fa fa-ellipsis-h"></i>
								</span>
							</div>
						</div>

						<div class="col-md-4">
							<label for="comuna">COMUNA</label>

							<div class="input-group">
								<input name="formComuna" id="form3City" type="text" class="form-control" placeholder="">
								<span class="input-group-addon primary">
									<span class="arrow"></span>
									<i class="fa fa-ellipsis-h"></i>
								</span>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>

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
						<div class="col-md-2">
							<label for="um">Unidad de Medidad</label>

							<div class="input-group">
								<input type="text" class="form-control" placeholder="" name="un" autofocus>
								<span class="input-group-addon primary">
									<span class="arrow"></span>
									<i class="fa fa-ellipsis-h"></i>
								</span>
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
		$("#formComuna").select2({
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



