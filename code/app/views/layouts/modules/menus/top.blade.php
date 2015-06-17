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
			<!-- BEGIN SEARCH BOX -->
			<li class="m-r-10 input-prepend inside search-form no-boarder">
				<span class="add-on">
					<span class="iconset top-search"></span>
				</span> <input name="search" type="text" class="no-boarder" placeholder="Buscar..." style="width:250px;">
			</li>
			<!-- END SEARCH BOX -->
		</ul>
		<!-- END SLIM NAVIGATION TOGGLE -->

		<!-- BEGIN HEADER QUICK LINKS -->
		{{--@include('layouts.modules.menus.top.quicklinks')--}}
		<!-- BEGIN HEADER QUICK LINKS -->

	</div>
	<!-- END HEADER LEFT SIDE SECTION -->

	<!-- BEGIN HEADER RIGHT SIDE SECTION -->
	<div class="pull-right">
		<div class="chat-toggler">

			<!-- BEGIN NOTIFICATION CENTER -->
			@include('layouts.modules.menus.top.notifications')
			<!-- END NOTIFICATION CENTER -->

			<!-- BEGIN PROFILE PICTURE -->
			<div class="profile-pic">
				{{ HTML::image('assets/img/profiles/' . Auth::user()->Id_Usuario .  '/avatar_small.jpg', 'avatar', array('class' => '', 'data-src' => URL::asset('assets/img/profiles/' . Auth::user()->Id_Usuario .  '/avatar_small.jpg'), 'data-src-retina' => URL::asset('assets/img/profiles/' . Auth::user()->Id_Usuario .  '/avatar_small2x.jpg'), 'width' => '35', 'height' => '35')) }}
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
					<li><a href="{{ URL::to('logout') }}"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Salir</a></li>
				</ul>
			</li>
			<!-- END SETTINGS -->
			<li class="quicklinks"><span class="h-seperate"></span></li>

			<!-- BEGIN RIGHT SIDEBAR TOGGLE -->
			<li class="quicklinks">
				<a id="chat-menu-toggle" href="#sidr" class="chat-menu-toggle">
					<div class="iconset top-tiles">
						{{--<span class="badge badge-important hide" id="chat-message-count">0</span>--}}
					</div>
				</a>

				<!-- BEGIN OPTIONAL RECENT POP UP NOTIFICATION -->
				{{--<div class="simple-chat-popup chat-menu-toggle hide">--}}
					{{--<div class="simple-chat-popup-arrow"></div>--}}
					{{--<div class="simple-chat-popup-inner">--}}
						{{--<div style="width:100px">--}}
							{{--<div class="semi-bold">Atención!</div>--}}
							{{--<div class="message">No hay documentos inconclusos</div>--}}
						{{--</div>--}}
					{{--</div>--}}
				{{--</div>--}}
				<!-- END OPTIONAL RECENT POP UP NOTIFICATION -->
			</li>
			<!-- END RIGHT SIDEBAR TOGGLE -->
		</ul>
		<!-- END HEADER NAV BUTTONS -->
	</div>
	<!-- END HEADER RIGHT SIDE SECTION -->
</div>