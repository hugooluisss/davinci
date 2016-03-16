<?php /* Smarty version Smarty-3.1.11, created on 2016-03-16 13:28:03
         compiled from "templates/plantillas/modulos/estudiantes/addResponsable.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197626187456e9a86d21c221-16909055%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df80aaf5ee6af08278cc16132653b05c4dff01f4' => 
    array (
      0 => 'templates/plantillas/modulos/estudiantes/addResponsable.tpl',
      1 => 1458156426,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197626187456e9a86d21c221-16909055',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_56e9a86d22c320_91624183',
  'variables' => 
  array (
    'parentesco' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e9a86d22c320_91624183')) {function content_56e9a86d22c320_91624183($_smarty_tpl) {?><form role="form" id="frmAddParentesco" class="form-horizontal" onsubmit="javascript: return false;">
	<h2>Generales</h2>
	<div class="form-group">
		<label for="selParentesco" class="col-lg-4">Parentesco</label>
		<div class="col-lg-8">
			<select class="form-control" id="selParentesco" name="selParentesco">
				<option value="">Selecciona
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['parentesco']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idParentesco'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</option>
				<?php } ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="txtNombre" class="col-lg-4">Nombre</label>
		<div class="col-lg-8">
			<input class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre(s)">
		</div>
	</div>
	<div class="form-group">
		<label for="txtApp" class="col-lg-4">Apellido Paterno</label>
		<div class="col-lg-8">
			<input class="form-control" id="txtApp" name="txtApp" placeholder="Apellido paterno">
		</div>
	</div>
	<div class="form-group">
		<label for="txtApm" class="col-lg-4">Apellido Materno</label>
		<div class="col-lg-8">
			<input class="form-control" id="txtApm" name="txtApm" placeholder="Apellido materno">
		</div>
	</div>
	<div class="form-group">
		<label for="txtOcupacion" class="col-lg-4">Ocupación</label>
		<div class="col-lg-8">
			<input class="form-control" id="txtOcupacion" name="txtOcupacion" placeholder="Ocupación">
		</div>
	</div>
	<div class="form-group">
		<label for="txtEmpresa" class="col-lg-4">Empresa</label>
		<div class="col-lg-8">
			<input class="form-control" id="txtEmpresa" name="txtEmpresa" placeholder="Empresa donde trabaja">
		</div>
	</div>
	<div class="form-group">
		<label for="txtTelefono" class="col-lg-4">Telefono</label>
		<div class="col-lg-5">
			<input class="form-control" id="txtTelefono" name="txtTelefono" placeholder="Teléfono">
		</div>
		<div class="col-lg-3">
			<input class="form-control" id="txtExtension" name="txtExtension" placeholder="Extensión">
		</div>
	</div>
	<div class="form-group">
		<label for="txtTelefono" class="col-lg-4">Teléfono</label>
		<div class="col-lg-8">
			<input class="form-control" id="txtTelefono" name="txtTelefono" placeholder="Teléfono de contacto">
		</div>
	</div>
	<div class="form-group">
		<label for="txtCelular" class="col-lg-4">Celular</label>
		<div class="col-lg-8">
			<input class="form-control" id="txtCelular" name="txtCelular" placeholder="Celular">
		</div>
	</div>
	<div class="form-group">
		<label for="txtCorreo" class="col-lg-4">Correo electrónico</label>
		<div class="col-lg-8">
			<input class="form-control" id="txtCorreo" name="txtCorreo" placeholder="Correo electrónico">
		</div>
	</div>
	<div class="box-footer">
			<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id"/>
	</div>
</form><?php }} ?>