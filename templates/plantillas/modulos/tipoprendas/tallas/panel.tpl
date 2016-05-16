<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Tallas</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<a href="tipoPrendas" class="btn btn-success">Regresar</a>
	</div>
</div>
<br />

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
						<label for="txtNombre" class="col-lg-2">Nombre</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtNombre" name="txtNombre">
						</div>
					</div>
					<div class="form-group">
						<label for="txtAdicional" class="col-lg-2">Adicional</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtAdicional" name="txtAdicional">
							<small class="text-muted">Este se le suma al precio de la prenda
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right">Guardar</button>
					<input type="hidden" id="id"/>
					<input type="hidden" id="tipo" value="{$tipo}"/>
				</div>
			</div>
		</form>
	</div>
</div>