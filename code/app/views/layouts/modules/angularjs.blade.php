{{-- BEGIN ANGULARJS MAIN --}}
{{ HTML::script('assets/js/angularjs/angular.min.js') }}
{{ HTML::script('assets/js/angularjs/i18n/angular-locale_es-cl.js') }}
{{-- END ANGULARJS MAIN --}}

{{-- BEGIN APP --}}
{{ HTML::script('assets/js/angularjs/app.js') }}
{{ HTML::script('assets/js/angularjs/angular-local-storage.js') }}

<script>
	ameis.factory('rootFactory', function () {
		var servicio = {
			root: "{{ Request::root() }}",
			store: "{{ storage_path() }}",
			public: "{{ public_path() }}"
		};
		return servicio;
	});
</script>

{{ HTML::script('assets/js/angularjs/factories.js') }}
{{ HTML::script('assets/js/angularjs/directives.js') }}
{{ HTML::script('assets/js/angularjs/controllers.js') }}
{{-- END APP --}}