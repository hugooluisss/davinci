<?php /* Smarty version Smarty-3.1.11, created on 2016-05-16 23:55:17
         compiled from "templates/plantillas/modulos/ventaUniformes/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:344724532573a9b3aba3b47-47916493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b22680154cdb55667ba739b2bddb52825e10801' => 
    array (
      0 => 'templates/plantillas/modulos/ventaUniformes/panel.tpl',
      1 => 1463460894,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '344724532573a9b3aba3b47-47916493',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_573a9b3ac49af4_37808668',
  'variables' => 
  array (
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573a9b3ac49af4_37808668')) {function content_573a9b3ac49af4_37808668($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/davinci/librerias/smarty/plugins/modifier.date_format.php';
?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Ventas</h1>
	</div>
</div>

<ul class="nav nav-tabs">
	<li class="active"><a data-toggle="tab" href="#lista">Lista</a></li>
	<li><a data-toggle="tab" href="#add">Agregar o modificar</a></li>
</ul>




<div class="tab-content">
	<div id="lista" class="tab-pane fade in active">
		<div id="dvLista"></div>
	</div>
	<div id="add" class="tab-pane fade">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="form-group">
				<label for="txtFecha" class="col-sm-2 control-label">Fecha *</label>
				<div class="col-sm-2">
					<input type="text" id="txtFecha" name="txtFecha" autofocus="true" class="form-control" autocomplete="false" value="<?php echo smarty_modifier_date_format(time(),"Y-m-d");?>
" placeholder="Y-m-d"/>
					<div id="datepicker"></div>
				</div>
			</div>
			<div class="form-group">
				<label for="txtResponsable" class="col-sm-2 control-label">Cliente <small>(responsable)</small>*</label>
				<div class="col-sm-6">
					<input type="text" id="txtResponsable" name="txtResponsable" autofocus="true" class="form-control" autocomplete="false" disabled="true" />
				</div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-default btn-block" id="btnBuscarPadres"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
				</div>
			</div>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id"/>
		</form>
		<br/><br/>
		<hr />
		<br/>
		<form role="form" id="frmAddProductos" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="form-group">
				<label for="txtClave" class="col-sm-2 control-label">Producto</label>
				<div class="col-sm-2">
					<input type="text" id="txtClave" name="txtClave" autofocus="true" class="form-control" autocomplete="false" placeholder="clave"/>
				</div>
				<div class="col-sm-5">
					<input type="text" id="txtDescripcion" name="txtDescripcion" autofocus="true" class="form-control" autocomplete="false" placeholder="Descripción"/>
				</div>
				<div class="col-sm-3">
					<button type="button" class="btn btn-default btn-block" id="btnBuscarProductos"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
				</div>
			</div>
			<div class="form-group">
				<label for="txtCantidad" class="col-sm-2 control-label">Cantidad</label>
				<div class="col-sm-2">
					<input type="text" id="txtCantidad" name="txtCantidad" autofocus="true" class="form-control" autocomplete="false" placeholder="Cantidad"/>
				</div>
				<label for="txtCantidad" class="col-sm-offset-2 col-sm-2 control-label">Precio Unitario</label>
				<div class="col-sm-2">
					<input type="text" id="txtPrecio" name="txtPrecio" autofocus="true" class="form-control text-right" autocomplete="false" placeholder="Precio"/>
				</div>
				<div class="col-sm-1 text-right">
					<button type="submit" id="btnReset" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i></button>
				</div>
			</div>
		</form>
		<br/><br/>
		<hr />
		<br/>
		<div id="lstMovimiento"></div>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/ventaUniformes/winPadres.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>