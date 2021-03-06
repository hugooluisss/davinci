<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>.:: {$PAGE.empresaAcronimo} ::.</title>
		{if $PAGE.debug}
		<link rel="stylesheet/less" type="text/css" href="{$PAGE.ruta}build/less/AdminLTE.less" />
		<link rel="stylesheet/less" type="text/css" href="{$PAGE.ruta}build/less/skins/_all-skins.less" />
		{else}
		<link rel="stylesheet" href="{$PAGE.ruta}dist/css/AdminLTE.min.css">
		<link rel="stylesheet" type="text/css" href="{$PAGE.ruta}dist/css/skins/_all-skins.css" />
		{/if}

		<link rel="stylesheet" href="{$PAGE.ruta}bootstrap/css/bootstrap.min.css">
		
		<link rel="stylesheet" href="{$PAGE.ruta}dist/css/font-awesome.min.css">
		<link rel="stylesheet" href="{$PAGE.ruta}dist/css/ionicons.min.css">
		
		<link rel="stylesheet/less" type="text/css" href="{$PAGE.ruta}build/less/skins/_all-skins.less" />
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/iCheck/flat/blue.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/morris/morris.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/datepicker/datepicker3.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/daterangepicker/daterangepicker-bs3.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/upload/css/jquery.fileupload.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	</head>
	<body class="hold-transition skin-red sidebar-mini">
	<div class="wrapper">
		<header class="main-header">
			<!-- Logo -->
			<a href="panelPrincipal" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>D</b>avinci</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg">Colegio <b>D</b>a <b>V</b>inci</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top" role="navigation">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				
				<!-- Navbar Right Menu -->
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<!-- Menu Toggle Button -->
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<!-- hidden-xs hides the username on small devices so only the image appears. -->
								<i class="fa fa-user"></i> <span class="hidden-xs">{$PAGE.usuario->getNombre()}</span>
							</a>
							<ul class="dropdown-menu">
								<!-- The user image in the menu -->
								<li class="user-header">
									<img src="?mod=cusuarios&action=getFoto&ancho=180&alto=180" class="img-circle" alt="User Image"/>
									<p>
										{$PAGE.usuario->getNombre()}
										<small>{$PAGE.usuario->getEmail()}</small>
									</p>
								</li>
								<!-- Menu Body -->
								<li class="user-body">
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-right">
										<a href="?mod=logout" class="btn btn-default btn-flat">Salir</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-custom-menu -->
			</nav>
		</header>
		
		
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
			<!-- Sidebar user panel -->
			<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
					<li class="header">MENÚ PRINCIPAL</li>
					<!--<li class="{if $PAGE.modulo eq 'estudiantes' or $PAGE.modulo eq 'inscripciones'}active{/if} treeview">-->
					<li class="{if in_array($PAGE.modulo, array('estudiantes', 'inscripciones'))}active{/if} treeview">
						<a href="#">
							<span>Gestión escolar</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li {if $PAGE.modulo eq 'estudiantes'}class="active"{/if}><a href="estudiantes"><i class="fa fa-graduation-cap"></i> Registro</a></li>
							<li {if $PAGE.modulo eq 'inscripciones'}class="active"{/if}><a href="inscripciones"><i class="fa fa-book"></i> Inscripciones</a></li>
						</ul>
					</li>
					{if $PAGE.usuario->getIdTipo() neq 3}
					<li class="{if in_array($PAGE.modulo, array('optativas', 'rutas'))}active{/if} treeview">
						<a href="#">
							<span>Servicios Especiales</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							
							<li {if $PAGE.modulo eq 'optativas'}class="active"{/if}><a href="optativas"><i class="fa fa-bookmark"></i> Clases optativas</a></li>
							{if $PAGE.usuario->getIdTipo() neq 2}
							<li {if $PAGE.modulo eq 'rutas'}class="active"{/if}><a href="rutas"><i class="fa fa-bus"></i> Transporte</a></li>
							{/if}
						</ul>
					</li>
					{/if}
					{if $PAGE.usuario->getIdTipo() eq 1}
					<li class="{if in_array($PAGE.modulo, array('admonUsuarios'))}active{/if} treeview">
						<a href="#">
							<span>Administración</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li {if $PAGE.modulo eq 'admonUsuarios'}class="active"{/if}><a href="admonUsuarios"><i class="fa fa-users"></i> Usuarios</a></li>
							
						</ul>
					</li>
					{/if}
					{if $PAGE.usuario->getIdTipo() neq 3}
					<li class="{if in_array($PAGE.modulo, array('cicloescolar', 'grupos', 'cuidados', 'niveles', 'planestudio', 'asignaturas'))}active{/if} treeview">
						<a href="#">
							<span>Catálogos</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							{if $PAGE.usuario->getIdTipo() neq 2}
							<li {if $PAGE.modulo eq 'cicloescolar'}class="active"{/if}><a href="cicloescolar"><i class="fa fa-flag"></i> Ciclos escolares</a></li>
							{/if}
							<li {if $PAGE.modulo eq 'grupos'}class="active"{/if}><a href="grupos"><i class="fa fa-users"></i> Grupos</a></li>
							<li {if $PAGE.modulo eq 'cuidados'}class="active"{/if}><a href="cuidados"><i class="fa fa-heartbeat"></i> Cuidados</a></li>
							{if $PAGE.usuario->getIdTipo() neq 2}
							<li {if $PAGE.modulo eq 'niveles'}class="active"{/if}><a href="niveles"><i class="fa fa-university"></i> Niveles educativos</a></li>
							{/if}
							<li {if $PAGE.modulo eq 'planestudio' or $PAGE.modulo eq 'asignaturas'}class="active"{/if}><a href="planestudios"><i class="fa fa-folder"></i> Plan de estudios</a></li>
						</ul>
					</li>
					{/if}
					{if $PAGE.usuario->getIdTipo() neq 3}
					<li class="{if in_array($PAGE.modulo, array('tipoPrendas', 'tallas', 'proveedores', 'uniformes', 'editoriales', 'libros'))}active{/if} treeview">
						<a href="#">
							<span>Almacén</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li {if $PAGE.modulo eq 'proveedores'}class="active"{/if}><a href="proveedores"><i class="fa fa-truck"></i> Proveedores</a></li>
							<li {if $PAGE.modulo eq 'tipoPrendas' or $PAGE.modulo eq 'tallas'}class="active"{/if}><a href="tipoPrendas"><i class="fa fa-pencil-square-o"></i> Tipo de prendas</a></li>
							<li {if $PAGE.modulo eq 'uniformes'}class="active"{/if}><a href="uniformes"><i class="fa fa-male"></i> Uniformes</a></li>
							<li {if $PAGE.modulo eq 'editoriales'}class="active"{/if}><a href="editoriales"><i class="fa fa-briefcase"></i> Editoriales</a></li>
							<li {if $PAGE.modulo eq 'libros'}class="active"{/if}><a href="libros"><i class="fa fa-book"></i> Libros</a></li>
						</ul>
					</li>
					{/if}
					<li class="{if in_array($PAGE.modulo, array('ventaUniformes', 'ventaLibros'))}active{/if} treeview">
						<a href="#">
							<span>Ventas</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li {if $PAGE.modulo eq 'ventaUniformes'}class="active"{/if}><a href="ventaUniformes"><i class="fa fa-shopping-cart"></i> Uniformes</a></li>
							<li {if $PAGE.modulo eq 'ventaLibros'}class="active"{/if}><a href="ventaLibros"><i class="fa fa-shopping-cart"></i> Libros</a></li>
						</ul>
					</li>
					<li class="{if in_array($PAGE.modulo, array('reportesEstudiantes', 'reportesVentas'))}active{/if} treeview">
						<a href="#">
							<span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li {if $PAGE.modulo eq 'reportesEstudiantes'}class="active"{/if}><a href="reportesEstudiantes"><i class="fa fa-graduation-cap"></i> Estudiantes</a></li>
							<li {if $PAGE.modulo eq 'reportesVentas'}class="active"{/if}><a href="reportesVentas"><i class="fa fa-shopping-cart"></i> Ventas</a></li>
						</ul>
					</li>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>
		
		
		
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-lg-12">
					{if $PAGE.vista neq ''}
						{include file=$PAGE.vista}
					{/if}
					</div>
				</div>
			</section><!-- /.content -->
		</div><!-- /.content-wrapper -->
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Versión</b> {$PAGE.version}
			</div>
			<strong>Copyright &copy; {date("Y")} {$PAGE.empresaAcronimo}.</strong> Todos los derechos reservados
		</footer>
	</div>
    
    
    <!-- jQuery 2.1.4 -->
    <script src="{$PAGE.ruta}plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{$PAGE.ruta}plugins/jQueryUI/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="{$PAGE.ruta}plugins/jQueryUI/jquery-ui.css">
    <!-- Bootstrap 3.3.5 -->
    <script src="{$PAGE.ruta}bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="{$PAGE.ruta}plugins/raphael-min.js"></script>
    <script src="{$PAGE.ruta}plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="{$PAGE.ruta}plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="{$PAGE.ruta}plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{$PAGE.ruta}plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{$PAGE.ruta}plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="{$PAGE.ruta}plugins/daterangepicker/daterangepicker.js"></script>
    <script src="{$PAGE.ruta}moment.min.js"></script>
    <!-- datepicker -->

    <!-- Bootstrap WYSIHTML5 -->
    <script src="{$PAGE.ruta}plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="{$PAGE.ruta}plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{$PAGE.ruta}plugins/fastclick/fastclick.min.js"></script>
    <script type="text/javascript" src="{$PAGE.ruta}plugins/validate/validate.es.js"></script>
    <script type="text/javascript" src="{$PAGE.ruta}plugins/validate/validate.js"></script>
    
    <link rel="stylesheet" href="{$PAGE.ruta}plugins/datatables/dataTables.bootstrap.css">
    <script src="{$PAGE.ruta}plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{$PAGE.ruta}plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="{$PAGE.ruta}plugins/datatables/lenguaje/ES-mx.js"></script>
    
    <script src="{$PAGE.ruta}plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="{$PAGE.ruta}plugins/upload/js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="{$PAGE.ruta}plugins/upload/js/jquery.fileupload.js"></script>
    
    <script type="text/javascript" src="{$PAGE.ruta}plugins/datepicker/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="{$PAGE.ruta}plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>
    <link rel="stylesheet" href="{$PAGE.ruta}plugins/datepicker/datepicker3.css" />
     
    <script src="{$PAGE.ruta}plugins/input-mask/jquery.inputmask.js"></script>
    <script src="{$PAGE.ruta}plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="{$PAGE.ruta}plugins/input-mask/jquery.inputmask.extensions.js"></script>
    
    <script src="{$PAGE.ruta}dist/js/app.js" type="text/javascript"></script>
    
    {foreach from=$PAGE.scriptsJS item=script}
		<script type="text/javascript" src="{$script}"></script>
	{/foreach}
    
    {if $PAGE.debug}
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.3.1/less.min.js" type="text/javascript"></script>
    {else}
    
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    {/if}
  </body>
</html>
