<div id="winAsistencias" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" data-toogle="modal">
    <div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1>Registro de asistencias</h1>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<div class="form-group">
							<label for="txtFecha" class="col-xs-4 col-lg-4">Asistencias del día</label>
							<div class="col-xs-8 col-sm-4">
								<input class="form-control" id="txtFecha" name="txtFecha" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask />
							</div>
						</div>
					</div>
				</div>
				<div id="dvLista"></div>
			</div>
		</div>
    </div>
</div>

<input type="hidden" id="grupo" name="grupo" value="" />