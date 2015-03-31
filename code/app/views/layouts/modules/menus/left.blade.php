<p class="menu-title">
	MENÚ PRINCIPAL
	<span class="pull-right">
		<a href="javascript:;"><i class="fa fa-refresh"></i></a>
	</span>
</p>
<ul>
	<!-- BEGIN ACTIVE LINK -->
	<li class="start active">
		<a href="{{ URL::to('/')  }}"> <i class="icon-custom-home"></i> <span class="title">Inicio</span> <span class="selected"></span> <span class="badge badge-important pull-right">5</span> </a>
	</li>
	<!-- END ACTIVE LINK -->

	<!-- BEGIN COTIZACION LINK -->
	<li class="">
		<a href="{{ URL::to('menu/cotizaciones')  }}"> <i class="fa fa-flag"></i> <span class="title">Cotizador</span> </a>
	</li>
	<!-- END COTIZACION LINK -->

	<!-- BEGIN BADGE LINK -->
	{{--<li class="">--}}
	{{--<a href="#"> <i class="fa fa-envelope"></i> <span class="title">Link 2</span> <span class="badge badge-disable pull-right">203</span> </a>--}}
	{{--</li>--}}
	<!-- END BADGE LINK -->

	<!-- BEGIN SINGLE LINK -->
	{{--<li class="">--}}
	{{--<a href="#"> <i class="fa fa-flag"></i> <span class="title">Link 3</span> </a>--}}
	{{--</li>--}}
	<!-- END SINGLE LINK -->

	<!-- BEGIN ONE LEVEL MENU -->
	{{--<li class="">--}}
	{{--<a href="javascript:;"> <i class="icon-custom-ui"></i> <span class="title">Link 4</span> <span class="arrow"></span> </a>--}}
	{{--<ul class="sub-menu">--}}
	{{--<li><a href="#">Sub Link 1</a></li>--}}
	{{--</ul>--}}
	{{--</li>--}}
	<!-- END ONE LEVEL MENU -->

	<!-- BEGIN TWO LEVEL MENU -->
	{{--<li class="">--}}
	{{--<a href="javascript:;"> <i class="fa fa-folder-open"></i> <span class="title">Link 5</span> <span class="arrow"></span> </a>--}}
	{{--<ul class="sub-menu">--}}
	{{--<li><a href="javascript:;">Sub Link 1</a></li>--}}
	{{--<li>--}}
	{{--<a href="javascript:;"><span class="title">Sub Link 2</span><span class="arrow "></span></a>--}}
	{{--<ul class="sub-menu">--}}
	{{--<li><a href="javascript:;">Sub Link 1</a></li>--}}
	{{--</ul>--}}
	{{--</li>--}}
	{{--</ul>--}}
	{{--</li>--}}
	<!-- END TWO LEVEL MENU -->
</ul>