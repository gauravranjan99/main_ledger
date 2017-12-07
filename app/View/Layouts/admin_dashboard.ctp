<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8"/>
	<title>Central Diary</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>

	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
	<!-- END PAGE LEVEL PLUGIN STYLES -->
	<!-- BEGIN PAGE STYLES -->

	<!-- END PAGE STYLES -->
	<!-- BEGIN THEME STYLES -->
	<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->

	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
	<link href="<?=$this->webroot;?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$this->webroot;?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$this->webroot;?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$this->webroot;?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$this->webroot;?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$this->webroot;?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$this->webroot;?>assets/global/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$this->webroot;?>assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$this->webroot;?>assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$this->webroot;?>assets/global/plugins/select2/css/select2.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="<?=$this->webroot;?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
	<link href="<?=$this->webroot;?>assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$this->webroot;?>assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
	<link href="<?=$this->webroot;?>assets/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$this->webroot;?>assets/admin/layout2/css/layout.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$this->webroot;?>assets/admin/layout2/css/themes/grey.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?=$this->webroot;?>assets/admin/layout2/css/custom.css" rel="stylesheet" type="text/css"/>





	<!-- END THEME STYLES -->

	<script src="<?=$this->webroot;?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<link rel="shortcut icon" href="favicon.ico"/>

	<script src="<?=$this->webroot;?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?=$this->webroot;?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<!--Commented By Govind -->
	<!--<script src="<?/*=$this->webroot;*/?>assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
	<script src="<?/*=$this->webroot;*/?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
	<script src="<?/*=$this->webroot;*/?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
	<script src="<?/*=$this->webroot;*/?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
	<script src="<?/*=$this->webroot;*/?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
	<script src="<?/*=$this->webroot;*/?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
	<script src="<?/*=$this->webroot;*/?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.australia.js" type="text/javascript"></script>
	<script src="<?/*=$this->webroot;*/?>assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>-->
	<script src="<?=$this->webroot;?>assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/global/plugins/select2/select2.min.js" type="text/javascript"></script>

	<script src="<?=$this->webroot;?>assets/global/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/admin/pages/scripts/components-dropdowns.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/admin/pages/scripts/form-validation.js" type="text/javascript"></script>
	<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
	<script src="<?=$this->webroot;?>assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
	<!--Commented By Govind -->
	<!--<script src="<?/*=$this->webroot;*/?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js" type="text/javascript"></script>-->
	<!--<script src="<?/*=$this->webroot;*/?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js" type="text/javascript"></script>-->
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?=$this->webroot;?>assets/global/scripts/metronic.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/admin/layout2/scripts/layout.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/admin/layout2/scripts/quick-sidebar.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/admin/layout2/scripts/demo.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/admin/pages/scripts/index.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
	<script src="<?=$this->webroot;?>/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<!-- <script src="<?=$this->webroot;?>/assets/admin/pages/scripts/table-managed.js" type="text/javascript"></script> -->




</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-md page-boxed page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner container">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<?=$this->Html->link('<span class="logo-default"> Central Diary</span>',['controller'=>'Users','action'=>'dashboard'],array('escape' => false,'style'=>'text-decoration: none;'))?>
			<div class="menu-toggler sidebar-toggler">

				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN PAGE ACTIONS -->
		<!-- DOC: Remove "hide" class to enable the page header actions -->
		<div class="page-actions hide">
			<div class="btn-group">
				<button type="button" class="btn btn-circle red-pink dropdown-toggle" data-toggle="dropdown">
					<i class="icon-bar-chart"></i>&nbsp;<span class="hidden-sm hidden-xs">New&nbsp;</span>&nbsp;<i class="fa fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="javascript:;">
							<i class="icon-user"></i> New User </a>
					</li>
					<li>
						<a href="javascript:;">
							<i class="icon-present"></i> New Event <span class="badge badge-success">4</span>
						</a>
					</li>
					<li>
						<a href="javascript:;">
							<i class="icon-basket"></i> New order </a>
					</li>
					<li class="divider">
					</li>
					<li>
						<a href="javascript:;">
							<i class="icon-flag"></i> Pending Orders <span class="badge badge-danger">4</span>
						</a>
					</li>
					<li>
						<a href="javascript:;">
							<i class="icon-users"></i> Pending Users <span class="badge badge-warning">12</span>
						</a>
					</li>
				</ul>
			</div>
			<div class="btn-group">
				<button type="button" class="btn btn-circle green-haze dropdown-toggle" data-toggle="dropdown">
					<i class="icon-bell"></i>&nbsp;<span class="hidden-sm hidden-xs">Post&nbsp;</span>&nbsp;<i class="fa fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="javascript:;">
							<i class="icon-docs"></i> New Post </a>
					</li>
					<li>
						<a href="javascript:;">
							<i class="icon-tag"></i> New Comment </a>
					</li>
					<li>
						<a href="javascript:;">
							<i class="icon-share"></i> Share </a>
					</li>
					<li class="divider">
					</li>
					<li>
						<a href="javascript:;">
							<i class="icon-flag"></i> Comments <span class="badge badge-success">4</span>
						</a>
					</li>
					<li>
						<a href="javascript:;">
							<i class="icon-users"></i> Feedbacks <span class="badge badge-danger">2</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- END PAGE ACTIONS -->
		<!-- BEGIN PAGE TOP -->
		<div class="page-top">
			<!-- BEGIN HEADER SEARCH BOX -->
			<!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
			<form class="search-form search-form-expanded" action="extra_search.html" method="GET">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search..." name="query">
					<span class="input-group-btn">
					<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
					</span>
				</div>
			</form>
			<!-- END HEADER SEARCH BOX -->
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-extended dropdown-notification toggler tooltips" style="margin-top: 25px;" > Current Time = 3:46 PM Thursday, 12 May 2016 (GMT+5:30)  </li>
					<!--<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-bell"></i>
						<span class="badge badge-default">
						7 </span>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3><span class="bold">12 pending</span> notifications</h3>
								<a href="extra_profile.html">view all</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
									<li>
										<a href="javascript:;">
											<span class="time">just now</span>
										<span class="details">
										<span class="label label-sm label-icon label-success">
										<i class="fa fa-plus"></i>
										</span>
										New user registered. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">3 mins</span>
										<span class="details">
										<span class="label label-sm label-icon label-danger">
										<i class="fa fa-bolt"></i>
										</span>
										Server #12 overloaded. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">10 mins</span>
										<span class="details">
										<span class="label label-sm label-icon label-warning">
										<i class="fa fa-bell-o"></i>
										</span>
										Server #2 not responding. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">14 hrs</span>
										<span class="details">
										<span class="label label-sm label-icon label-info">
										<i class="fa fa-bullhorn"></i>
										</span>
										Application error. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">2 days</span>
										<span class="details">
										<span class="label label-sm label-icon label-danger">
										<i class="fa fa-bolt"></i>
										</span>
										Database overloaded 68%. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">3 days</span>
										<span class="details">
										<span class="label label-sm label-icon label-danger">
										<i class="fa fa-bolt"></i>
										</span>
										A user IP blocked. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">4 days</span>
										<span class="details">
										<span class="label label-sm label-icon label-warning">
										<i class="fa fa-bell-o"></i>
										</span>
										Storage Server #4 not responding dfdfdfd. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">5 days</span>
										<span class="details">
										<span class="label label-sm label-icon label-info">
										<i class="fa fa-bullhorn"></i>
										</span>
										System Error. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">9 days</span>
										<span class="details">
										<span class="label label-sm label-icon label-danger">
										<i class="fa fa-bolt"></i>
										</span>
										Storage server failed. </span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>-->
					<!-- END NOTIFICATION DROPDOWN -->


					<!-- BEGIN USER LOGIN DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

						<span class="username username-hide-on-mobile">
						Preferences </span>
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								  <?=$this->Html->link("<i class='icon-user'></i> My Profile",['controller'=>'users','action'=>'admin_myprofile'],array('escape' => false))?>
							</li>

							<li>
								<?=$this->Html->link("<i class='icon-user'></i> Account Settings",['controller'=>'users','action'=>'admin_account_setting'],array('escape' => false))?>

							</li>

							<li class="divider">
							</li>

							<li>
								<?php echo $this->Html->link('<i class="icon-key"></i> Log Out', array('controller' => 'users','action'=>'logout','plugin'=>false)
									,array('escape' => false));?>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-extended quick-sidebar-toggler hide" >
						<span class="sr-only">Toggle Quick Sidebar</span>
						<i class="icon-logout"></i>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END PAGE TOP -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->

<div class="container">
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar-wrapper">
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<div class="page-sidebar navbar-collapse collapse">
				<!-- BEGIN SIDEBAR MENU -->
				<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
				<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
				<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
				<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
				<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
				<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
				<ul class="page-sidebar-menu page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
					<li class="start active ">
							<?php echo $this->Html->link('<i class="icon-home"></i><span class="title">Home</span><span class="selected"></span>', array('controller' => 'Users','action'=>'dashboard','plugin'=>false),array('escape' => false));?>
						</a>
					</li>
					<li>
						<?php echo $this->Html->link('<i class="icon-settings"></i><span class="title">User Management</span><span class="arrow "></span>', array('controller' => 'Users','action'=>'manage','plugin'=>false),array('escape' => false));?>
					</li>

					<li>
							<?php echo $this->Html->link('<i class="icon-bulb"></i><span class="title">Calendar Management</span><span class="arrow "></span>', array('controller' => 'Calendars','action'=>'admin_manage_calendar','plugin'=>false),array('escape' => false));?>
					
					</li>

					<li>
						<?php echo $this->Html->link('<i class="icon-bulb"></i><span class="title">Category Management</span><span class="arrow "></span>', array('controller' => 'Categories','action'=>'admin_manage_category','plugin'=>false),array('escape' => false));?>
						</a>

					</li>
					<li>
						<a href="email_template.html">
							<i class="icon-rocket"></i>
							<span class="title">Email Template</span>
							<span class="arrow "></span>
						</a>

					</li>
					<li>
						<a href="javascript:;">
							<i class="icon-puzzle"></i>
							<span class="title">Reports</span>
							<span class="arrow "></span>
						</a>

					</li>





				</ul>
				<!-- END SIDEBAR MENU -->
			</div>
		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">
		<!-- BEGIN STYLE CUSTOMIZER -->
		<div class="theme-panel">
			<div class="toggler tooltips" data-container="body" data-placement="left" data-html="true" data-original-title="Click to open advance theme customizer panel">
				<i class="icon-settings"></i>
			</div>
			<div class="toggler-close">
				<i class="icon-close"></i>
			</div>
			<div class="theme-options" id="theme-options">
				<div class="theme-option theme-colors clearfix">
							<span>
							THEME COLOR </span>
					<ul class="website_color">
						<li class="color-default current tooltips" data-style="default" id="default" data-container="body" data-original-title="Default">
						</li>
						<li class="color-grey tooltips" data-style="grey" id="grey" data-container="body" data-original-title="Grey">
						</li>
						<li class="color-blue tooltips" data-style="blue" id="blue" data-container="body" data-original-title="Blue">
						</li>
						<li class="color-dark tooltips" data-style="dark" id="dark" data-container="body" data-original-title="Dark">
						</li>
						<li class="color-light tooltips" data-style="light" id="light" data-container="body" data-original-title="Light">
						</li>
					</ul>
				</div>
				<div class="theme-option">
							<span>
							Theme Style </span>
					<select class="layout-style-option form-control input-small" id="website_style">
						<option value="square" >Square corners</option>
						<option value="rounded">Rounded corners</option>
					</select>
				</div>
				<div class="theme-option">
							<span>
							Layout </span>
					<select class="layout-option form-control input-small" id="website_layout">
						<option value="fluid" >Fluid</option>
						<option value="boxed">Boxed</option>
					</select>
				</div>
				<div class="theme-option">
							<span>
							Header </span>
					<select class="page-header-option form-control input-small website_header" id="website_header">
						<option value="fixed" >Fixed</option>
						<option value="default">Default</option>
					</select>
				</div>
				<div class="theme-option">
							<span>
							Top Dropdown</span>
					<select class="page-header-top-dropdown-style-option form-control input-small" id="website_dropdown">
						<option value="light" >Light</option>
						<option value="dark">Dark</option>
					</select>
				</div>
				<div class="theme-option">
							<span>
							Sidebar Mode</span>
					<select class="sidebar-option form-control input-small" id="website_sidebar_mode">
						<option value="fixed">Fixed</option>
						<option value="default" >Default</option>
					</select>
				</div>
				<div class="theme-option">
							<span>
							Sidebar Style</span>
					<select class="sidebar-style-option form-control input-small" id="website_sidebar_style">
						<option value="default" >Default</option>
						<option value="compact">Compact</option>
					</select>
				</div>
				<div class="theme-option">
							<span>
							Sidebar Menu </span>
					<select class="sidebar-menu-option form-control input-small" id="website_sidebar_menu">
						<option value="accordion" >Accordion</option>
						<option value="hover">Hover</option>
					</select>
				</div>
				<div class="theme-option">
							<span>
							Sidebar Position </span>
					<select class="sidebar-pos-option form-control input-small" id="website_sidebar_position">
						<option value="left" >Left</option>
						<option value="right">Right</option>
					</select>
				</div>
				<div class="theme-option">
							<span>
							Footer </span>
					<select class="page-footer-option form-control input-small" id="website_footer">
						<option value="fixed">Fixed</option>
						<option value="default" >Default</option>
					</select>
				</div>
			</div>
		</div>
		<!-- END STYLE CUSTOMIZER -->
		<?php echo $this->fetch('content'); ?>
			</div>
		</div>
		<!-- END CONTENT -->
		<!-- BEGIN QUICK SIDEBAR -->
		<!--Cooming Soon...-->
		<!-- END QUICK SIDEBAR -->
	</div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		2016 &copy; <a href="http://www.anouconcept.com/" target="_blank">Anouconcept.</a>
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->


<!--Commented By Govind -->
<!--<script src="<?=$this->webroot;?>assets/admin/pages/scripts/table-managed.js" type="text/javascript"></script>-->
<!-- END PAGE LEVEL SCRIPTS -->
<script>
	jQuery(document).ready(function() {
		Metronic.init(); // init metronic core componets
		Layout.init(); // init layout
		Demo.init(); // init demo features
		QuickSidebar.init(); // init quick sidebar
		Index.init();
		Index.initDashboardDaterange();
		Index.initJQVMAP(); // init index page's custom scripts
		Index.initCalendar(); // init index page's custom scripts
		Index.initCharts(); // init index page's custom scripts
		Index.initChat();
		Index.initMiniCharts();
		Tasks.initDashboardWidget();
		ComponentsDropdowns.init();
		Metronic.init(); // Run metronic theme
		Metronic.setAssetsPath('<?=$this->webroot;?>assets/'); // Set the assets folder path
		FormValidation.init();
	});
</script>


<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
