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

	<!-- BEGIN CSS TEMPLATE -->
	{{ HTML::style('assets/css/style.css') }}
	{{ HTML::style('assets/css/responsive.css') }}
	{{ HTML::style('assets/css/custom-icon-set.css') }}
	<!-- END CSS TEMPLATE -->
</head>
<body class="">

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
		<div class="header-quick-nav">

			<!-- BEGIN HEADER LEFT SIDE SECTION -->
			<div class="pull-left">

				<!-- BEGIN SLIM NAVIGATION TOGGLE -->
				<ul class="nav quick-section">
					<li class="quicklinks">
						<a href="#" class="" id="layout-condensed-toggle">
							<div class="iconset top-menu-toggle-dark"></div>
						</a>
					</li>
				</ul>
				<!-- END SLIM NAVIGATION TOGGLE -->

				<!-- BEGIN HEADER QUICK LINKS -->
				<ul class="nav quick-section">
					{{--<li class="quicklinks">--}}
					{{--<a href="#" class="">--}}
					{{--<div class="iconset top-reload"></div>--}}
					{{--</a>--}}
					{{--</li>--}}
					{{--<li class="quicklinks">--}}
					{{--<span class="h-seperate"></span>--}}
					{{--</li>--}}
					{{--<li class="quicklinks">--}}
					{{--<a href="#" class="">--}}
					{{--<div class="iconset top-tiles"></div>--}}
					{{--</a>--}}
					{{--</li>--}}

					<!-- BEGIN SEARCH BOX -->
					<li class="m-r-10 input-prepend inside search-form no-boarder">
							<span class="add-on">
								<span class="iconset top-search"></span>
							</span> <input name="search" type="text" class="no-boarder" placeholder="Buscar..." style="width:250px;">
					</li>
					<!-- END SEARCH BOX -->
				</ul>

				<!-- BEGIN HEADER QUICK LINKS -->
			</div>
			<!-- END HEADER LEFT SIDE SECTION -->

			<!-- BEGIN HEADER RIGHT SIDE SECTION -->
			<div class="pull-right">
				<div class="chat-toggler">

					<!-- BEGIN NOTIFICATION CENTER -->
					<a href="#" class="dropdown-toggle" id="my-task-list" data-placement="bottom" data-content="" data-toggle="dropdown" data-original-title="Notifications">
						<div class="user-details">
							<div class="username">
								@if(Auth::check())
									<span class="badge badge-important">3</span>&nbsp;{{ Auth::user()->name }}<span class="bold">&nbsp;{{ Auth::user()->lastname }}</span>
								@else
									<span class="badge badge-important">3</span>&nbsp;{{ Config::get('test.user.name') }}<span class="bold">&nbsp;{{ Config::get('test.user.lastname') }}</span>
								@endif
							</div>
						</div>
						<div class="iconset top-down-arrow"></div>
					</a>

					<div id="notification-list" style="display:none">
						<div style="width:300px">

							<!-- BEGIN NOTIFICATION MESSAGE -->
							<div class="notification-messages info">
								<div class="user-profile">
									@if(Auth::check())
										{{ HTML::image('assets/img/profiles/' . Auth::user()->id_user . 'd.jpg', '', array('class' => '', 'data-src' => URL::asset('assets/img/profiles/' . Auth::user()->id_user . 'd.jpg'), 'data-src-retina' => URL::asset('assets/img/profiles/' . Auth::user()->id_user . 'd2x.jpg'), 'width' => '35', 'height' => '35')) }}
									@else
										{{ HTML::image('assets/img/profiles/' . Config::get('test.user.id') . 'd.jpg', '', array('class' => '', 'data-src' => URL::asset('assets/img/profiles/' . Config::get('test.user.id') . 'd.jpg'), 'data-src-retina' => URL::asset('assets/img/profiles/' . Config::get('test.user.id') . 'd2x.jpg'), 'width' => '35', 'height' => '35')) }}
									@endif
								</div>
								<div class="message-wrapper">
									<div class="heading">Title of Notification</div>
									<div class="description">Description...</div>
									<div class="date pull-left">A min ago</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<!-- END NOTIFICATION MESSAGE -->
						</div>
					</div>
					<!-- END NOTIFICATION CENTER -->

					<!-- BEGIN PROFILE PICTURE -->
					<div class="profile-pic">
						@if(Auth::check())
							{{ HTML::image('assets/img/profiles/avatar' . Auth::user()->id_user .  '_small.jpg', 'logo', array('class' => '', 'data-src' => URL::asset('assets/img/profiles/avatar' . Auth::user()->id_user .  '_small.jpg'), 'data-src-retina' => URL::asset('assets/img/profiles/avatar' . Auth::user()->id_user .  '_small2x.jpg'), 'width' => '35', 'height' => '35')) }}
						@else
							{{ HTML::image('assets/img/profiles/avatar' . Config::get('test.user.id') .  '_small.jpg', 'logo', array('class' => '', 'data-src' => URL::asset('assets/img/profiles/avatar' . Config::get('test.user.id') .  '_small.jpg'), 'data-src-retina' => URL::asset('assets/img/profiles/avatar' . Config::get('test.user.id') .  '_small2x.jpg'), 'width' => '35', 'height' => '35')) }}
						@endif
					</div>
					<!-- END PROFILE PICTURE -->
				</div>

				<!-- BEGIN HEADER NAV BUTTONS -->
				<ul class="nav quick-section">

					<!-- BEGIN SETTINGS -->
					<li class="quicklinks">
						<a data-toggle="dropdown" class="dropdown-toggle pull-right" href="#" id="user-options">
							<div class="iconset top-settings-dark"></div>
						</a>
						<ul class="dropdown-menu pull-right" role="menu" aria-labelledby="user-options">
							<li><a href="#">Perfil</a></li>
							<li><a href="#">Configuración&nbsp;&nbsp;<span class="badge badge-important animated bounceIn">2</span></a></li>
							<li class="divider"></li>
							<li><a href="#"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Logout</a></li>
						</ul>
					</li>
					<!-- END SETTINGS -->
					<li class="quicklinks"><span class="h-seperate"></span></li>

					<!-- BEGIN RIGHT SIDEBAR TOGGLE -->
					<li class="quicklinks">
						<a id="chat-menu-toggle" href="#sidr" class="chat-menu-toggle">
							<div class="iconset top-tiles">
								<span class="badge badge-important hide" id="chat-message-count">1</span>
							</div>
						</a>


						<!-- BEGIN OPTIONAL RECENT POP UP NOTIFICATION -->
						<div class="simple-chat-popup chat-menu-toggle hide">
							<div class="simple-chat-popup-arrow"></div>
							<div class="simple-chat-popup-inner">
								<div style="width:100px">
									<div class="semi-bold">CAUSA</div>
									<div class="message">MENSAJE...</div>
								</div>
							</div>
						</div>
						<!-- END OPTIONAL RECENT POP UP NOTIFICATION -->
					</li>
					<!-- END RIGHT SIDEBAR TOGGLE -->
				</ul>
				<!-- END HEADER NAV BUTTONS -->
			</div>
			<!-- END HEADER RIGHT SIDE SECTION -->
		</div>
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

<!-- END NEED TO WORK ON -->

<!-- END JAVASCRIPTS -->
</body>
</html>