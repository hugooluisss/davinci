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
	'controlador' => 'index.php',
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
	'js' => array('grupo.class.js', "estudiante.class.js"),
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
	'js' => array('estudiante.class.js', 'responsable.class.js', 'permiso.class.js'),
	'jsTemplate' => array('permisos.js', 'estudiantes.js'),
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
	'debugSeg' => false,
	'capa' => LAYOUT_AJAX);

/*Niveles*/
$conf['niveles'] = array(
	'controlador' => 'niveles.php',
	'vista' => 'niveles/panel.tpl',
	'descripcion' => 'Administración de niveles',
	'seguridad' => true,
	'js' => array('nivel.class.js'),
	'jsTemplate' => array('niveles.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['cniveles'] = array(
	'controlador' => 'niveles.php',
	'descripcion' => 'Controlador de niveles',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/*Responsables*/
$conf['listaResponsablesEstudiante'] = array(
	'controlador' => 'responsables.php',
	'vista' => 'estudiantes/listaResponsables.tpl',
	'descripcion' => 'Lista de responsables del estudiante',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cresponsables'] = array(
	'controlador' => 'responsables.php',
	'descripcion' => 'Controlador de responsables',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['inscripciones'] = array(
	'controlador' => 'inscripciones.php',
	'vista' => 'inscripciones/panel.tpl',
	'descripcion' => 'Inscripciones',
	'seguridad' => true,
	'js' => array('estudiante.class.js'),
	'jsTemplate' => array('inscripciones.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaInscripciones'] = array(
	'controlador' => 'inscripciones.php',
	'vista' => 'inscripciones/lista.tpl',
	'descripcion' => 'Lista de de inscripciones',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cinscripciones'] = array(
	'controlador' => 'inscripciones.php',
	'descripcion' => 'Controlador de inscripciones',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/*Optativas*/
$conf['optativas'] = array(
	'controlador' => 'optativas.php',
	'vista' => 'optativas/panel.tpl',
	'descripcion' => 'Administración de clases optativas',
	'seguridad' => true,
	'js' => array('optativa.class.js'),
	'jsTemplate' => array('optativas.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaOptativas'] = array(
	'controlador' => 'optativas.php',
	'vista' => 'optativas/lista.tpl',
	'descripcion' => 'Lista de clases optativas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['coptativas'] = array(
	'controlador' => 'optativas.php',
	'descripcion' => 'Controlador de clases optativas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['listaEstudiantesOptativa'] = array(
	'controlador' => 'optativas.php',
	'vista' => 'optativas/listaEstudiantes.tpl',
	'descripcion' => 'Lista de estudiantes inscritos en el curso optativo',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/*Rutas*/
$conf['rutas'] = array(
	'controlador' => 'rutas.php',
	'vista' => 'rutas/panel.tpl',
	'descripcion' => 'Administración de rutas',
	'seguridad' => true,
	'js' => array('ruta.class.js'),
	'jsTemplate' => array('rutas.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaRutas'] = array(
	'controlador' => 'rutas.php',
	'vista' => 'rutas/lista.tpl',
	'descripcion' => 'Lista de rutas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['crutas'] = array(
	'controlador' => 'rutas.php',
	'descripcion' => 'Controlador de rutas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['listaEstudiantesRutas'] = array(
	'controlador' => 'rutas.php',
	'vista' => 'rutas/listaEstudiantes.tpl',
	'descripcion' => 'Lista de estudiantes registrados para la ruta',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

/*Permisos*/
$conf['listaPermisos'] = array(
	'controlador' => 'permisos.php',
	'vista' => 'permisos/lista.tpl',
	'descripcion' => 'Lista de permisos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cpermisos'] = array(
	'controlador' => 'permisos.php',
	'descripcion' => 'Controlador de permisos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

/*Permisos*/
$conf['asistencias'] = array(
	'controlador' => 'asistencias.php',
	'vista' => 'grupos/listaAsistencia.tpl',
	'descripcion' => 'Registro de asistencias',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['casistencias'] = array(
	'controlador' => 'asistencias.php',
	'descripcion' => 'Controlador de asistencias',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
?>