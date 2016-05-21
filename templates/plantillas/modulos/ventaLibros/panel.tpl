<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Venta de libros</h1>
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
		<div class="box">
			<div class="box-body">
				<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
					<div class="form-group">
						<label for="txtFecha" class="col-sm-2 control-label">Fecha *</label>
						<div class="col-sm-2">
							<input type="text" id="txtFecha" name="txtFecha" autofocus="true" class="form-control" autocomplete="false" value="{$smarty.now|date_format:"Y-m-d"}" placeholder="Y-m-d"/>
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
				<br />
				<form role="form" id="frmAddProductos" class="form-horizontal" onsubmit="javascript: return false;">
					<div class="form-group">
						<label for="txtClave" class="col-sm-2 control-label">Producto</label>
						<div class="col-sm-2">
							<input type="text" id="txtClave" name="txtClave" class="form-control" autocomplete="false" placeholder="Clave" readonly="true"/>
						</div>
						<div class="col-sm-5">
							<input type="text" id="txtDescripcion" name="txtDescripcion" class="form-control" autocomplete="false" placeholder="Descripción" readonly="true"/>
						</div>
						<div class="col-sm-3">
							<button type="button" class="btn btn-default btn-block" id="btnBuscarProductos"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
						</div>
					</div>
					<div class="form-group">
						<label for="txtCantidad" class="col-sm-offset-2 col-sm-2 control-label">Precio Unitario</label>
						<div class="col-sm-2">
							<input type="text" id="txtPrecio" name="txtPrecio" class="form-control text-right" autocomplete="false" placeholder="Precio" disabled="true" readonly="true"/>
						</div>
						<label for="txtCantidad" class="col-sm-2 control-label">Cantidad</label>
						<div class="col-sm-2">
							<input type="text" id="txtCantidad" name="txtCantidad" class="form-control" autocomplete="false" placeholder="Cantidad"/>
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
	</div>
</div>

{include file=$PAGE.rutaModulos|cat:"modulos/ventaUniformes/winPadres.tpl"}
{include file=$PAGE.rutaModulos|cat:"modulos/ventaLibros/winLibros.tpl"}