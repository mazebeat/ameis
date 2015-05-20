<!DOCTYPE html><!--[if lt IE 7]><!--[if lt IE 7]>  <html lang="es" class="ie ie6 lte9 lte8 lte7"> <![endif]--><!--[if IE 7]><!--[if IE 7]>     <html lang="es" class="ie ie7 lte9 lte8 lte7"> <![endif]--><!--[if IE 8]><!--[if IE 8]>     <html lang="es" class="ie ie8 lte9 lte8"> <![endif]--><!--[if IE 9]><!--[if IE 9]>     <html lang="es" class="ie ie9 lte9"> <![endif]--><!--[if gt IE 9]><!--[if gt IE 9]>  <html lang="es"> <![endif]--><!--[if !IE]><!--><!--[if !IE]><!-->
<html lang="es">             <!--<![endif]-->
<head>
	<title>{{ Str::upper(Config::get('api.company.name')) }} - @yield('title')</title>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta content="Ameis" name="description"/>
	<meta content="Mazebeat" name="author"/>

	<!-- BEGIN PLUGIN CSS -->
	@yield('style')
	<!-- END PLUGIN CSS -->

	<!-- BEGIN CORE CSS FRAMEWORK -->
	{{ HTML::style('assets/plugins/boostrapv3/css/bootstrap.min.css') }}
	{{ HTML::style('assets/plugins/boostrapv3/css/bootstrap-theme.min.css') }}
	{{ HTML::style('assets/plugins/font-awesome/css/font-awesome.css') }}
	{{ HTML::style('assets/css/animate.min.css') }}
	{{ HTML::style('assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}
	<!-- END CORE CSS FRAMEWORK -->

	{{-- BEGIN SWEET ALERT --}}
	{{ HTML::script('assets/plugins/sweetalert/dist/sweetalert.min.js') }}
	{{ HTML::style('assets/plugins/sweetalert/dist/sweetalert.css') }}
	{{-- END SWEET ALERT --}}

	<!-- BEGIN CSS TEMPLATE -->
	{{ HTML::style('assets/css/style.css') }}
	{{ HTML::style('assets/css/responsive.css') }}
	{{ HTML::style('assets/css/custom-icon-set.css') }}
	<!-- END CSS TEMPLATE -->


</head>
<body class="" ng-app="ameis">

<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse">

	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="navbar-inner">

		<!-- BEGIN NAVIGATION HEADER -->
		<div class="header-seperation">

			<!-- BEGIN MOBILE HEADER -->
			<ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">
				<li class="dropdown">
					<a id="main-menu-toggle" href="#main-menu" class="">
						<div class="iconset top-menu-toggle-dark"></div>
					</a>
				</li>
			</ul>
			<!-- END MOBILE HEADER -->

			@include('layouts.modules.logos')
		</div>
		<!-- END NAVIGATION HEADER -->

		<!-- BEGIN CONTENT HEADER -->
		@include('layouts.modules.menus.top')
		<!-- END CONTENT HEADER -->
	</div>
	<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->


<!-- BEGIN CONTENT -->
<div class="page-container row-fluid">

	<!-- BEGIN SIDEBAR -->

	<!-- BEGIN MENU -->
	@include('layouts.modules.menus')
	<!-- END MENU -->

	<!-- BEGIN SIDEBAR FOOTER WIDGET -->
	{{-- 	<div class="footer-widget">
	<div class="progress transparent progress-small no-radius no-margin">
	<div data-percentage="79%" class="progress-bar progress-bar-success animate-progress-bar"></div>
	</div>
	<div class="pull-right">
	<div class="details-status">
	<span data-animation-duration="560" data-value="86" class="animate-number"></span>%
	</div>
	<a href="#"><i class="fa fa-power-off"></i></a>
	</div>
</div> --}}
	<!-- END SIDEBAR FOOTER WIDGET -->

	<!-- END SIDEBAR -->

	<!-- BEGIN PAGE CONTAINER-->
	<div class="page-content">
		<div class="content">
			<ul class="breadcrumb">
				@section('breadcrumb')
					<li>
						<p>INICIO</p>
					</li>
				@show
			</ul>

			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				@yield('page-title')
			</div>
			<!-- END PAGE TITLE -->

			<!-- BEGIN PlACE PAGE CONTENT HERE -->
			@yield('content')
			<!-- END PLACE PAGE CONTENT HERE -->
		</div>
	</div>
	<!-- END PAGE CONTAINER -->

	<!-- BEGIN RIGHT MENU -->
	@include('layouts.modules.menus.right')
	<!-- END RIGHT MENU -->
</div>
<!-- END CONTENT -->

<!-- BEGIN CORE JS FRAMEWORK-->
{{ HTML::script('assets/plugins/jquery-1.8.3.min.js') }}
{{ HTML::script('assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js') }}
{{ HTML::script('assets/plugins/boostrapv3/js/bootstrap.min.js') }}
{{ HTML::script('assets/plugins/breakpoints.js') }}
{{ HTML::script('assets/plugins/jquery-unveil/jquery.unveil.min.js') }}
<!-- END CORE JS FRAMEWORK -->

<!-- BEGIN PAGE LEVEL JS -->
{{ HTML::script('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}
{{ HTML::script('assets/plugins/jquery-block-ui/jqueryblockui.js') }}
{{ HTML::script('assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js') }}
@yield('script')
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN CORE TEMPLATE JS -->
{{ HTML::script('assets/js/core.js') }}
{{-- {{ HTML::script('assets/js/chat.js') }} --}}
{{ HTML::script('assets/js/demo.js') }}
<!-- END CORE TEMPLATE JS -->

@include('layouts.modules.angularjs')
<!-- END NEED TO WORK ON -->

<!-- END JAVASCRIPTS -->
</body>
</html>