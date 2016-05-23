<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Reportes de estudiantes</h1>
	</div>
</div>

<div class="panel-group" id="accordion">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#cuidados">Cuidados de estudiantes</a>
			</h4>
		</div>
		<div id="cuidados" class="panel-collapse collapse in">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-2">Grupo</div>
					<div class="col-md-6">
						<select id="selGrupo" name="selGrupo" class="form-control">
							{foreach from=$grupos item="row"}
								<option value="{$row.idGrupo}">{$row.grupo} del grado {$row.grado} de {$row.nivel} del ciclo {$row.ciclo}
							{/foreach}
						</select>
					</div>
					<div class="col-md-2">
						<input type="button" class="btn btn-primary" value="generar" id="btnEnviar">
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#rutas">Rutas de transporte</a>
			</h4>
		</div>
		<div id="rutas" class="panel-collapse collapse">
			<div class="panel-body">Cuidados
			</div>
		</div>
	</div>
</div>