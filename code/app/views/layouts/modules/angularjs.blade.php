{{-- BEGIN ANGULARJS MAIN --}}{{ HTML::script('assets/js/angularjs/angular.min.js') }}{{ HTML::script('assets/js/angularjs/i18n/angular-locale_es-cl.js') }}{{-- END ANGULARJS MAIN --}}{{-- BEGIN APP --}}{{ HTML::script('assets/js/angularjs/app.js') }}{{ HTML::script('assets/js/angularjs/angular-messages.min.js') }}{{ HTML::script('assets/js/angularjs/angular-local-storage.js') }}{{ HTML::script('assets/js/angularjs/slider.js') }}{{ HTML::script('assets/js/angularjs/angular-smooth-scroll.min.js') }}{{ HTML::script('assets/js/angularjs/ngrut.js') }}

<script>
	ameis.service('rootFactory', function () {
		this.root = "{{ Request::root() }}/";
		this.auth = {{ json_encode(Auth::user()) }};
	});
</script>

{{ HTML::script('assets/js/angularjs/factories.js') }}{{ HTML::script('assets/js/angularjs/directives.js') }}{{ HTML::script('assets/js/angularjs/controllers.js') }}{{-- END APP --}}