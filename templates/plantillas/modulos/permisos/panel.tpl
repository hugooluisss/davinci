<ul id="panelTabs2" class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#listasPermisos">Lista</a></li>
  <li><a data-toggle="tab" href="#addPermisos">Agregar o Modificar</a></li>
</ul>

<div class="tab-content" id="permisos">
	<div id="listasPermisos" class="tab-pane fade in active">
		<div id="dvLista">
			
		</div>
	</div>
	
	<div id="addPermisos" class="tab-pane fade">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						<label for="txtFecha" class="col-lg-2">Fecha</label>
						<div class="col-lg-4">
							<input class="form-control" id="txtFecha" name="txtFecha" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
						</div>
					</div>
					<div class="form-group">
						<label for="txtDias" class="col-lg-2">Días</label>
						<div class="col-lg-2">
							<input class="form-control" id="txtDias" name="txtDias" data-inputmask="'mask': '9'" data-mask>
						</div>
					</div>
					<div class="form-group">
						<label for="txtComentarios" class="col-lg-2">Comentarios</label>
						<div class="col-lg-10">
							<textarea id="txtComentarios" name="txtComentarios" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right">Guardar</button>
					<input type="hidden" id="id"/>
					<input type="hidden" id="estudiante"/>
				</div>
			</div>
		</form>
	</div>
</div>