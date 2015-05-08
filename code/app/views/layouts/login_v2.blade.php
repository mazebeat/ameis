<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
	<meta charset="utf-8"/>
	<title>{{ Str::upper(Config::get('api.company.name')) }} - @yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta content="Ameis" name="description"/>
	<meta content="Mazebeat" name="author"/>
	<!-- BEGIN CORE CSS FRAMEWORK -->
	{{ HTML::style('assets/plugins/pace/pace-theme-flash.css') }}
	{{ HTML::style('assets/plugins/boostrapv3/css/bootstrap.min.css') }}
	{{ HTML::style('assets/plugins/boostrapv3/css/bootstrap-theme.min.css') }}
	{{ HTML::style('assets/plugins/font-awesome/css/font-awesome.css') }}
	{{ HTML::style('assets/css/animate.min.css') }}
	<!-- END CORE CSS FRAMEWORK --><!-- BEGIN CSS TEMPLATE -->
	{{ HTML::style('assets/css/style.css') }}
	{{ HTML::style('assets/css/responsive.css') }}
	{{ HTML::style('ass ets/css/custom-icon-set.css') }}
	<!-- END CSS TEMPLATE -->
</head>
<!-- END HEAD --><!-- BEGIN BODY -->
<body class="error-body no-top lazy" data-original="assets/img/work.jpg" style="background-image: url('{{ public_path() }}/assets/img/work.jpg')">
<div class="container">
	@yield('content')
</div>
<!-- END CONTAINER -->

<!-- BEGIN CORE JS FRAMEWORK-->
{{ HTML::script('assets/plugins/jquery-1.8.3.min.js' ) }}
{{ HTML::script('assets/plugins/boostrapv3/js/bootstrap.min.js' ) }}
{{ HTML::script('assets/plugins/pace/pace.min.js' ) }}
{{ HTML::script('assets/plugins/jquery-validation/js/jquery.validate.min.js' ) }}
{{ HTML::script('assets/plugins/jquery-lazyload/jquery.lazyload.min.js' ) }}
{{ HTML::script('assets/js/login_v2.js' ) }}
<!-- BEGIN CORE TEMPLATE JS -->

@include('layouts.modules.angularjs')
<!-- END CORE TEMPLATE JS -->
</body>

</html>