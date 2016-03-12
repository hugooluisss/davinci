<?php
define('SISTEMA', 'Davinci');
define('VERSION', 'v 1.0');
define('ALIAS', '');
define('AUTOR', 'Hugo Luis Santiago Altamirano');
define('EMAIL', 'hugooluisss@gmail.com');
define('EMAILSOPORTE', 'hugooluisss@gmail.com');
define('STATUS', 'En desarrollo');

define('LAYOUT_DEFECTO', 'layout/default.tpl');
define('LAYOUT_AJAX', 'layout/update.tpl');

#Login y su controlador
$conf['inicio'] = array(
	'descripcion' => '',
	'seguridad' => false,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('login.js'),
	'capa' => 'layout/login.tpl');

$conf['logout'] = array(
	'controlador' => 'login.php',
	#'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Salir del sistema',
	'seguridad' => false,
	'js' => array(),
	'capa' => LAYOUT_DEFECTO);
	
$conf['clogin'] = array(
	'controlador' => 'login.php',
	'descripcion' => 'Inicio de sesion',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);
	
$conf['bienvenida'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/bienvenida.tpl',
	'descripcion' => 'Bienvenida al sistema',
	'seguridad' => true,
	'capa' => LAYOUT_DEFECTO);

$conf['admonUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Administración de usuarios',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('usuarios.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/lista.tpl',
	'descripcion' => 'Lista de usuarios',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cusuarios'] = array(
	'controlador' => 'usuarios.php',
	'descripcion' => 'Controlador de usuarios',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/*Datos de usuario desde el panel*/
$conf['usuarioDatosPersonales'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/datosPersonales.tpl',
	'descripcion' => 'Cambiar datos personales',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('datosUsuario.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['admonUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Administración de usuarios',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('usuarios.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['panelPrincipal'] = array(
	#'controlador' => 'index.php',
	'vista' => 'inicio.tpl',
	'descripcion' => 'Vista del panel',
	'seguridad' => true,
	'js' => array(),
	'capa' => LAYOUT_DEFECTO);
	
/*Ciclos escolares*/
$conf['cicloescolar'] = array(
	'controlador' => 'ciclos.php',
	'vista' => 'ciclos/panel.tpl',
	'descripcion' => 'Administración de ciclos escolares',
	'seguridad' => true,
	'js' => array('ciclo.class.js'),
	'jsTemplate' => array('cicloescolar.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaCiclos'] = array(
	'controlador' => 'ciclos.php',
	'vista' => 'ciclos/lista.tpl',
	'descripcion' => 'Lista de ciclos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['ccicloescolar'] = array(
	'controlador' => 'ciclos.php',
	'descripcion' => 'Controlador de ciclos escolares',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

/*Grupos*/
$conf['grupos'] = array(
	'controlador' => 'grupos.php',
	'vista' => 'grupos/panel.tpl',
	'descripcion' => 'Administración de grupos',
	'seguridad' => true,
	'js' => array('grupo.class.js'),
	'jsTemplate' => array('grupos.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaGrupos'] = array(
	'controlador' => 'grupos.php',
	'vista' => 'grupos/lista.tpl',
	'descripcion' => 'Lista de grupos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cgrupos'] = array(
	'controlador' => 'grupos.php',
	'descripcion' => 'Controlador de grupos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

/*Cuidados*/
$conf['cuidados'] = array(
	'controlador' => 'cuidados.php',
	'vista' => 'cuidados/panel.tpl',
	'descripcion' => 'Administración del catálogo de cuidados al estudiante',
	'seguridad' => true,
	'js' => array('cuidado.class.js'),
	'jsTemplate' => array('cuidados.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaCuidados'] = array(
	'controlador' => 'cuidados.php',
	'vista' => 'cuidados/lista.tpl',
	'descripcion' => 'Lista de cuidados',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['ccuidados'] = array(
	'controlador' => 'cuidados.php',
	'descripcion' => 'Controlador de cuidados',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/*Estudiante*/
$conf['estudiantes'] = array(
	'controlador' => 'estudiantes.php',
	'vista' => 'estudiantes/panel.tpl',
	'descripcion' => 'Administración de estudiantes',
	'seguridad' => true,
	'js' => array('estudiante.class.js'),
	'jsTemplate' => array('estudiantes.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaEstudiantes'] = array(
	'controlador' => 'estudiantes.php',
	'vista' => 'estudiantes/lista.tpl',
	'descripcion' => 'Lista de estudiantes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cestudiantes'] = array(
	'controlador' => 'estudiantes.php',
	'descripcion' => 'Controlador de estudiantes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
?>