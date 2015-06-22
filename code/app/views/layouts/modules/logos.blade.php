<!-- BEGIN LOGO -->
<a href="#">
	{{ HTML::image('assets/img/logo.png', 'logo', array('class' => 'logo', 'data-src' => URL::asset('assets/img/logo.png'), 'data-src-retina' => URL::asset('assets/img/logo.png'), 'width' => '160', 'height' => '40')) }}
</a><!-- END LOGO -->

<!-- BEGIN LOGO NAV BUTTONS -->
<ul class="nav pull-right notifcation-center">
	{{--<li class="dropdown" id="header_task_bar">--}}
	{{--<a href="#" class="dropdown-toggle active" data-toggle="">--}}
	{{--<div class="iconset top-home"></div>--}}
	{{--</a>--}}
	{{--</li>--}}
	{{--<li class="dropdown" id="header_inbox_bar">--}}
	{{--<a href="#" class="dropdown-toggle">--}}
	{{--<div class="iconset top-messages"></div>--}}
	{{--<span class="badge" id="msgs-badge">2</span>--}}
	{{--</a>--}}
	{{--</li>--}}
	<li class="dropdown">
		<a data-toggle="dropdown" class="dropdown-toggle pull-right" href="#" id="user-options">
			<div class="iconset top-settings-dark"></div>
		</a>
		<ul class="dropdown-menu pull-right" role="menu" aria-labelledby="user-options">
			<li><a href="#">Perfil</a></li>
			<li><a href="#">Configuración&nbsp;&nbsp;<span class="badge badge-important animated bounceIn">2</span></a></li>
			<li class="divider"></li>
			<li><a href="{{ URL::to('logout') }}"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Salir</a></li>
		</ul>
	</li>

	<!-- BEGIN MOBILE CHAT TOGGLER -->
	<li class="dropdown" id="portrait-chat-toggler" style="display:none">
		<a href="#sidr" class="chat-menu-toggle">
			<div class="iconset top-tiles"></div>
		</a>
	</li>
	<!-- END MOBILE CHAT TOGGLER -->
</ul><!-- END LOGO NAV BUTTONS -->