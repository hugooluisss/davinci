<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Administración de Uniformes</h1>
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
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						<label for="txtClave" class="col-lg-2">Clave</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtClave" name="txtClave" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtNombre" class="col-lg-2">Nombre</label>
						<div class="col-lg-8">
							<input class="form-control" id="txtNombre" name="txtNombre" />
						</div>
					</div>
					<div class="form-group">
						<label for="selProveedor" class="col-lg-2">Proveedor</label>
						<div class="col-lg-4">
							<select id="selProveedor" name="selProveedor" class="form-control">
								{foreach from=$proveedores item="row"}
								<option value="{$row.idProveedor}">{$row.nombre}
								{/foreach}
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="selTipo" class="col-lg-2">Tipo</label>
						<div class="col-lg-4">
							<select id="selTipo" name="selTipo" class="form-control">
								{foreach from=$tipos item="row"}
								<option value="{$row.idTipo}">{$row.nombre}
								{/foreach}
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtLista" class="col-lg-2">Precio de lista</label>
						<div class="col-lg-2">
							<input class="form-control text-right" id="txtLista" name="txtLista" placeholder="De lista" value="0.00"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtVenta" class="col-lg-2">Precio de venta</label>
						<div class="col-lg-2">
							<input class="form-control text-right" id="txtVenta" name="txtVenta" placeholder="De venta" value="0.00"/>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right">Guardar</button>
					<input type="hidden" id="id"/>
				</div>
			</div>
		</form>
	</div>
</div>

{include file=$PAGE.rutaModulos|cat:"modulos/uniformes/existencias.tpl"}