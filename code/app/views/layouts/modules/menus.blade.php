<div class="page-sidebar" id="main-menu">
	<div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">

		<!-- BEGIN MINI-PROFILE -->
		@include('layouts.modules.profile')
		<!-- END MINI-PROFILE -->

		<!-- BEGIN SIDEBAR MENU -->
		@include('layouts.modules.menus.left')
		<!-- END SIDEBAR MENU -->

		<!-- BEGIN SIDEBAR WIDGETS -->
		<div class="side-bar-widgets">

			<!-- BEGIN TASKS WIDGET -->
			{{--@include('layouts.modules.widgets.tasks')--}}
			<!-- END TASKS WIDGET -->

			<!-- BEGIN PROJECTS WIDGET -->
			@include('layouts.modules.widgets.projects')
			<!-- END PROJECTS WIDGET -->
		</div>
		<div class="clearfix"></div>
		<!-- END SIDEBAR WIDGETS -->
	</div>
</div>

<!-- BEGIN SCROLL UP HOVER --><a href="#" class="scrollup">Scroll</a><!-- END SCROLL UP HOVER -->