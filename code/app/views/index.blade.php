@extends('layouts.login_v2')


@section('title')
	INICIO
@endsection

@section('content')

	{{-- <div ng-controller="LoginController"> --}}

	<div class="row login-container animated fadeInUp">
		<div class="col-md-4 col-md-offset-4 p-t-30 p-l-40 p-r-40 p-b-20 xs-p-t-10 xs-p-l-10 xs-p-b-10 tiles white">
			<h1 class="text-center">{{ HTML::image('assets/img/logo.png') }}</h1>

			{{ Form::open(array('url' => '/', 'id' => 'frm_login', 'method' => 'POST', 'autocomplete' => 'off')) }}
			<div class="row">
				<div class="form-group col-md-12">
					<label class="form-label">Correo</label>

					<div class="controls">
						<div class="input-with-icon right">
							<i class=""></i> <input type="email" name="mail" id="mail" class="form-control" autocomplete="off"> <span class="help-inline text-error">{{ $errors->first('mail') }}</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-12">
					<label class="form-label">Contraseña</label> <span class="help"></span>

					<div class="controls">
						<div class="input-with-icon  right">
							<i class=""></i> <input type="password" name="password" id="password" class="form-control"> <span class="help-inline text-error">{{ $errors->first('password') }}</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="control-group col-md-12">
					<div class="checkbox checkbox check-success">
						<a href="#">Problemas al iniciar?</a>&nbsp;&nbsp;
						<div class="pull-right">
							<input type="checkbox" id="persist" value="1"> <label for="persist">Recordarme </label>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<button class="btn btn-primary btn-cons pull-right" type="submit">Ingresar</button>
				</div>
			</div>
			{{ Form::close() }}

	</div>

	</div>

	{{-- </div> --}}
@endsection

@section('style')
	<!-- BEGIN PLUGIN CSS -->
	<!-- END PLUGIN CSS -->
@endsection

@section('script')
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script>

	</script>
	<!-- END PAGE LEVEL PLUGINS -->
@endsection