<p class="menu-title">
	MENÚ PRINCIPAL
	<span class="pull-right">
		<a href="javascript:;"><i class="fa fa-refresh"></i></a>
	</span>
</p>
<ul>
	<!-- BEGIN ACTIVE LINK -->
	<li class="start active">
		<a href="{{ URL::to('/')  }}"><i class="icon-custom-home"></i> <span class="title">Inicio</span> <span class="selected"></span></a>
		{{--<a href="{{ URL::to('/')  }}"><i class="icon-custom-home"></i> <span class="title">Inicio</span> <span class="selected"></span><span class="badge badge-important pull-right">5</span></a>--}}
	</li>
	<!-- END ACTIVE LINK -->

	<!-- BEGIN ADMINISTRACION LEVEL MENU -->
	<li class="">
		<a href="javascript:;"><i class="fa fa-users"></i><span class="title">Administración</span> <span class="arrow"></span></a>
		<ul class="sub-menu">
			<li><a href="#"><i class="fa fa-file-text-o fa-fw"></i>&nbsp;Informes</a></li>
		</ul>
	</li>
	<!-- END ADMINISTRACION LEVEL MENU -->

	<!-- BEGIN OPERACIONES LEVEL MENU -->
	<li class="">
		<a href="javascript:;"><i class="fa fa-wrench"></i> <span class="title">Operaciones</span> <span class="arrow"></span></a>
		<ul class="sub-menu">
			<li class=""><a href="{{ URL::to('menu/cotizaciones')  }}"><i class="fa fa-calculator fa-fw"></i>&nbsp;<span class="title">Cotizador</span></a></li>
			<li class=""><a href="#"><i class="fa fa-flag"></i>&nbsp;<span class="title">Consulta/Generación OT</span></a></li>
			<li class=""><a href="{{ URL::to('menu/proyectos') }}"><i class="fa fa-paper-plane-o fa-fw">&nbsp;</i><span class="title">Proyectos</span></a></li>
		</ul>
	</li>
	<!-- END OPERACIONES LEVEL MENU -->

	<!-- BEGIN BODEGA LEVEL MENU -->
	<li class="">
		<a href="javascript:;"> <i class="fa fa-truck"></i> <span class="title">Bodega</span> <span class="arrow"></span></a>
		<ul class="sub-menu">
			<li class=""><a href="{{ URL::to('menu/kardex')  }}"><i class="fa fa-flag"></i>&nbsp;<span class="title">Kardex</span></a></li>
			<li class=""><a href="#"><i class="fa fa-flag"></i>&nbsp;<span class="title">Recepción Documentos</span></a></li>
		</ul>
	</li>
	<!-- END BODEGA LEVEL MENU -->

	<!-- BEGIN BODEGA LEVEL MENU -->
	<li class="">
		<a href="javascript:;"> <i class="icon-custom-ui"></i> <span class="title">Mantenedor</span> <span class="arrow"></span></a>
		<ul class="sub-menu">
			<li class=""><a href="#"><i class="fa fa-flag"></i>&nbsp;<span class="title">Clientes</span></a></li>
			<li class=""><a href="#"><i class="fa fa-flag"></i>&nbsp;<span class="title">Productos</span></a></li>
			<li class=""><a href="#"><i class="fa fa-flag"></i>&nbsp;<span class="title">Personal</span></a></li>
			<li class=""><a href="#"><i class="fa fa-flag"></i>&nbsp;<span class="title">Cargos</span></a></li>
		</ul>
	</li>
	<!-- END BODEGA LEVEL MENU -->

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