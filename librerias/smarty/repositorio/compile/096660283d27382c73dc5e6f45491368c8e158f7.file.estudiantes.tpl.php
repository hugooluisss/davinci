<?php /* Smarty version Smarty-3.1.11, created on 2016-05-21 00:26:25
         compiled from "templates/plantillas/modulos/reportes/estudiantes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181866900573fef158da9b7-67035033%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '096660283d27382c73dc5e6f45491368c8e158f7' => 
    array (
      0 => 'templates/plantillas/modulos/reportes/estudiantes.tpl',
      1 => 1463808384,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181866900573fef158da9b7-67035033',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_573fef158db725_24156562',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573fef158db725_24156562')) {function content_573fef158db725_24156562($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Reportes de estudiantes</h1>
	</div>
</div>

<div class="panel-group" id="accordion">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#cuidados">Cuidados de estudiantes</a>
			</h4>
		</div>
		<div id="cuidados" class="panel-collapse collapse in">
			<div class="panel-body">Cuidados
			</div>
		</div>
	</div>
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#rutas">Rutas de transporte</a>
			</h4>
		</div>
		<div id="rutas" class="panel-collapse collapse">
			<div class="panel-body">Cuidados
			</div>
		</div>
	</div>
</div><?php }} ?>