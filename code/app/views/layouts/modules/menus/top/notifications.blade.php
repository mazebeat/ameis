{{--<a href="#" class="dropdown-toggle" id="my-task-list" data-placement="bottom" data-content="" data-toggle="dropdown" data-original-title="Notificaciones">--}}
<a href="#" class="dropdown-toggle" id="my-task-list">
	<div class="user-details">
		<div class="username">
			{{--<span class="badge badge-important">3</span>&nbsp;{{ Auth::user()->Nombre }}<span class="bold">&nbsp;{{ Auth::user()->Apellido_Pat }}</span>--}}
			{{ Auth::user()->Nombre }}<span class="bold">&nbsp;{{ Auth::user()->Apellido_Pat }}</span>
		</div>
	</div>
	<div class="iconset top-down-arrow2"></div>
</a>

{{--<div id="notification-list" style="display:none">--}}
	{{--<div style="width:300px">--}}

		{{--<!-- BEGIN NOTIFICATION MESSAGE -->--}}
		{{--<div class="notification-messages info">--}}
			{{--<div class="user-profile">--}}
				{{--{{ HTML::image('assets/img/profiles/d.jpg', '', array('class' => '', 'data-src' => URL::asset('assets/img/profiles/d.jpg'), 'data-src-retina' => URL::asset('assets/img/profiles/d2x.jpg'), 'width' => '35', 'height' => '35')) }}            </div>--}}
			{{--<div class="message-wrapper">--}}
				{{--<div class="heading">Title of Notification</div>--}}
				{{--<div class="description">Description...</div>--}}
				{{--<div class="date pull-left">A min ago</div>--}}
			{{--</div>--}}
			{{--<div class="clearfix"></div>--}}
		{{--</div>--}}
		{{--<!-- END NOTIFICATION MESSAGE -->    </div>--}}
{{--</div>--}}