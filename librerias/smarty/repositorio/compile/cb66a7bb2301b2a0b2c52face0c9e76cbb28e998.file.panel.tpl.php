<?php /* Smarty version Smarty-3.1.11, created on 2016-03-11 23:43:25
         compiled from "templates/plantillas/modulos/estudiantes/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3892532656e3a0834c3184-47778352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb66a7bb2301b2a0b2c52face0c9e76cbb28e998' => 
    array (
      0 => 'templates/plantillas/modulos/estudiantes/panel.tpl',
      1 => 1457761404,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3892532656e3a0834c3184-47778352',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_56e3a0835118b3_73051419',
  'variables' => 
  array (
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e3a0835118b3_73051419')) {function content_56e3a0835118b3_73051419($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Estudiantes</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#listas">Lista</a></li>
  <li><a data-toggle="tab" href="#add">Agregar o Modificar</a></li>
</ul>

<div class="tab-content">
	<div id="listas" class="tab-pane fade in active">
		<div id="dvLista">
		</div>
	</div>
	
	<div id="add" class="tab-pane fade">
		<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).('/modulos/estudiantes/add.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
</div><?php }} ?>