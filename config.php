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
	
/*Inventarios*/
/*Ciclos escolares*/
$conf['tipoPrendas'] = array(
	'controlador' => 'tipoprendas.php',
	'vista' => 'tipoprendas/panel.tpl',
	'descripcion' => 'Administración de Tipo de prendas',
	'seguridad' => true,
	'js' => array('tipoPrenda.class.js'),
	'jsTemplate' => array('tipoPrendas.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaTipoPrendas'] = array(
	'controlador' => 'tipoprendas.php',
	'vista' => 'tipoprendas/lista.tpl',
	'descripcion' => 'Lista de tipo de prendas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cTipoPrendas'] = array(
	'controlador' => 'tipoprendas.php',
	'descripcion' => 'Controlador de tipo de prendas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

/*Tallas*/
$conf['tallas'] = array(
	'controlador' => 'tallas.php',
	'vista' => 'tipoprendas/tallas/panel.tpl',
	'descripcion' => 'Administración de tallas',
	'seguridad' => true,
	'js' => array('talla.class.js'),
	'jsTemplate' => array('tallas.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaTallas'] = array(
	'controlador' => 'tallas.php',
	'vista' => 'tipoprendas/tallas/lista.tpl',
	'descripcion' => 'Lista de tallas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['ctallas'] = array(
	'controlador' => 'tallas.php',
	'descripcion' => 'Controlador de tallas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/*Proveedores*/
$conf['proveedores'] = array(
	'controlador' => 'proveedores.php',
	'vista' => 'proveedores/panel.tpl',
	'descripcion' => 'Administración de proveedores',
	'seguridad' => true,
	'js' => array('proveedor.class.js'),
	'jsTemplate' => array('proveedores.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaProveedores'] = array(
	'controlador' => 'proveedores.php',
	'vista' => 'proveedores/lista.tpl',
	'descripcion' => 'Lista de proveedores',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cproveedores'] = array(
	'controlador' => 'proveedores.php',
	'descripcion' => 'Controlador de proveedores',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/*Uniformes*/
$conf['uniformes'] = array(
	'controlador' => 'uniformes.php',
	'vista' => 'uniformes/panel.tpl',
	'descripcion' => 'Administración de uniformes',
	'seguridad' => true,
	'js' => array('uniforme.class.js'),
	'jsTemplate' => array('uniformes.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaUniformes'] = array(
	'controlador' => 'uniformes.php',
	'vista' => 'uniformes/lista.tpl',
	'descripcion' => 'Lista de uniformes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cuniformes'] = array(
	'controlador' => 'uniformes.php',
	'descripcion' => 'Controlador de uniformes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['listaTallasUniformes'] = array(
	'controlador' => 'uniformes.php',
	'vista' => 'uniformes/listaTallas.tpl',
	'descripcion' => 'Lista de tallas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/*Uniformes*/
$conf['ventaUniformes'] = array(
	'controlador' => 'ventas.php',
	'vista' => 'ventaUniformes/panel.tpl',
	'descripcion' => 'Administración de ventas',
	'seguridad' => true,
	'js' => array('venta.class.js'),
	'jsTemplate' => array('ventaUniformes.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['responsablesVenta'] = array(
	'controlador' => 'responsables.php',
	'vista' => 'ventaUniformes/listaResponsables.tpl',
	'descripcion' => 'Lista de responsables',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['listaVentasUniformes'] = array(
	'controlador' => 'ventas.php',
	'vista' => 'ventaUniformes/lista.tpl',
	'descripcion' => 'Lista de ventas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cventas'] = array(
	'controlador' => 'ventas.php',
	'descripcion' => 'Controlador de ventas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

$conf['listaMovimientos'] = array(
	'controlador' => 'ventas.php',
	'vista' => 'ventaUniformes/listaMovimientos.tpl',
	'descripcion' => 'Lista de movimientos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['listaUniformesTalla'] = array(
	'controlador' => 'ventas.php',
	'vista' => 'ventaUniformes/listaUniformes.tpl',
	'descripcion' => 'Lista de uniformes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);


/* Plan de estudios*/
$conf['planestudios'] = array(
	'controlador' => 'planesestudio.php',
	'vista' => 'planEstudios/panel.tpl',
	'descripcion' => 'Administración de plan de estudios',
	'seguridad' => true,
	'js' => array('planEstudios.class.js'),
	'jsTemplate' => array('planestudios.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaPlanes'] = array(
	'controlador' => 'planesestudio.php',
	'vista' => 'planEstudios/lista.tpl',
	'descripcion' => 'Lista de planes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cplanesestudio'] = array(
	'controlador' => 'planesestudio.php',
	'descripcion' => 'Controlador de plan de estudios',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/* Asignaturas*/
$conf['asignaturas'] = array(
	'controlador' => 'asignaturas.php',
	'vista' => 'asignaturas/panel.tpl',
	'descripcion' => 'Administración de asignaturas',
	'seguridad' => true,
	'js' => array('asignatura.class.js'),
	'jsTemplate' => array('asignaturas.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaAsignaturas'] = array(
	'controlador' => 'asignaturas.php',
	'vista' => 'asignaturas/lista.tpl',
	'descripcion' => 'Lista de asignaturas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['casignaturas'] = array(
	'controlador' => 'asignaturas.php',
	'descripcion' => 'Controlador de asignaturas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/* Asignaturas*/
$conf['editoriales'] = array(
	'controlador' => 'editoriales.php',
	'vista' => 'editoriales/panel.tpl',
	'descripcion' => 'Administración de editoriales',
	'seguridad' => true,
	'js' => array('editorial.class.js'),
	'jsTemplate' => array('editoriales.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaEditoriales'] = array(
	'controlador' => 'editoriales.php',
	'vista' => 'editoriales/lista.tpl',
	'descripcion' => 'Lista de editoriales',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['ceditoriales'] = array(
	'controlador' => 'editoriales.php',
	'descripcion' => 'Controlador de editoriales',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
?>