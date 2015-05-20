<!-- BEGIN LOGO -->
<a href="#">
	{{ HTML::image('assets/img/logo.png', 'logo', array('class' => 'logo', 'data-src' => URL::asset('assets/img/logo.png'), 'data-src-retina' => URL::asset('assets/img/logo.png'), 'width' => '160', 'height' => '40')) }}
</a>
<!-- END LOGO -->

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

	<!-- BEGIN MOBILE CHAT TOGGLER -->
	<li class="dropdown" id="portrait-chat-toggler" style="display:none">
		<a href="#sidr" class="chat-menu-toggle">
			<div class="iconset top-tiles"></div>
		</a>
	</li>
	<!-- END MOBILE CHAT TOGGLER -->
</ul>
<!-- END LOGO NAV BUTTONS -->