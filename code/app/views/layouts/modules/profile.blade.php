<div class="user-info-wrapper">
	<div class="profile-wrapper">
		{{ HTML::image('assets/img/profiles/' . Auth::user()->Id_Usuario .  '/avatar.jpg', '', array('class' => '', 'data-src' => URL::asset('assets/img/profiles/' . Auth::user()->Id_Usuario .  '/avatar.jpg'), 'data-src-retina' => URL::asset('assets/img/profiles/' . Auth::user()->Id_Usuario .  '/avatar2x.jpg'), 'width' => '69', 'height' => '69')) }}
	</div>
	<div class="user-info">
		<div class="greeting">Bienvenido!</div>
		<div class="username">
			{{--{{ Auth::user()->Nombre }} <span class="semi-bold">{{ Auth::user()->Apellido_Pat }}</span>--}}
			<span class="semi-bold">{{ Auth::user()->Apellido_Pat }}</span>
		</div>

		<div class="status">
			Estado <a href="#"> <span class="status-icon green"></span> Activo </a>
		</div>
	</div>

</div>