<div class="user-info-wrapper">
	<div class="profile-wrapper">
		@if(Auth::check())
			{{ HTML::image('assets/img/profiles/avatar' . Auth::user()->id_user .  '.jpg', '', array('class' => '', 'data-src' => URL::asset('assets/img/profiles/avatar' . Auth::user()->id_user .  '.jpg'), 'data-src-retina' => URL::asset('assets/img/profiles/avatar' . Auth::user()->id_user .  '2x.jpg'), 'width' => '69', 'height' => '69')) }}
		@else
			{{ HTML::image('assets/img/profiles/avatar' . Config::get('test.user.id') .  '.jpg', '', array('class' => '', 'data-src' => URL::asset('assets/img/profiles/avatar' . Config::get('test.user.id') .  '.jpg'), 'data-src-retina' => URL::asset('assets/img/profiles/avatar' . Config::get('test.user.id') .  '2x.jpg'), 'width' => '69', 'height' => '69')) }}
		@endif
	</div>
	<div class="user-info">
		<div class="greeting">Bienvenido!</div>
		@if(Auth::check())
			<div class="username">
				{{ Auth::user()->name }} <span class="semi-bold">{{ Auth::user()->lastname }}</span>
			</div>
		@else
			<div class="username">
				{{ Config::get('test.user.name') }} <span class="semi-bold">{{ Config::get('test.user.lastname') }}</span>
			</div>
		@endif
		<div class="status">Estado<a href="#">
				<div class="status-icon green"></div>
				Online</a>
		</div>
	</div>
</div>