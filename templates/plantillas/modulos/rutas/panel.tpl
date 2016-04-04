<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Administración de rutas</h1>
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
						<label for="selCiclo" class="col-lg-2">Ciclo</label>
						<div class="col-lg-3">
							<select id="selCiclo" name="selCiclo" class="form-control">
								{foreach from=$ciclos item="row"}
								<option value="{$row.idCiclo}">{$row.nombre}
								{/foreach}
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtNombre" class="col-lg-2">Nombre</label>
						<div class="col-lg-8">
							<input class="form-control" id="txtNombre" name="txtNombre" autocomplete="off">
						</div>
					</div>
					<div class="form-group">
						<label for="txtCosto" class="col-lg-2">Costo</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtCosto" name="txtCosto" autocomplete="off">
						</div>
					</div>
					<div class="form-group">
						<label for="txtDescripcion" class="col-lg-2">Descripcion</label>
						<div class="col-lg-8">
							<textarea id="txtDescripcion" name="txtDescripcion" class="form-control"></textarea>
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


{include file=$PAGE.rutaModulos|cat:'/modulos/rutas/modal.tpl'}