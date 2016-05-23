<div id="winImpresion" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" data-toogle="modal">
    <div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1>Impresión de asistencias</h1>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<div class="form-group">
							<label for="txtFecha" class="col-xs-4 col-lg-4">Asistencias de</label>
							<div class="col-xs-4 col-sm-4">
								<select id="selAnio" name="selAnio" class="form-control">
									{while $anio > $anio2}
										<option value="{$anio}">{$anio--}
									{/while}
								</select>
							</div>
							<div class="col-xs-4 col-sm-4">
								<select id="selMes" name="selMes" class="form-control">
									<option value="1" {if $mes eq 1}selected{/if}>Enero</option>
									<option value="2" {if $mes eq 2}selected{/if}>Febrero</option>
									<option value="3" {if $mes eq 3}selected{/if}>Marzo</option>
									<option value="4" {if $mes eq 4}selected{/if}>Abril</option>
									<option value="5" {if $mes eq 5}selected{/if}>Mayo</option>
									<option value="6" {if $mes eq 6}selected{/if}>Junio</option>
									<option value="7" {if $mes eq 7}selected{/if}>Julio</option>
									<option value="8" {if $mes eq 8}selected{/if}>Agosto</option>
									<option value="9" {if $mes eq 9}selected{/if}>Septiembre</option>
									<option value="10" {if $mes eq 10}selected{/if}>Octubre</option>
									<option value="11" {if $mes eq 11}selected{/if}>Novimiebre</option>
									<option value="12" {if $mes eq 12}selected{/if}>Diciembre</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			<div class="modal-footer">
				<button class="btn btn-success" id="btnImprimir">Generar</button>
				<button class="btn btn-warning" id="btnVacio">Generar vacío</button>
			</div>
		</div>
    </div>
</div>