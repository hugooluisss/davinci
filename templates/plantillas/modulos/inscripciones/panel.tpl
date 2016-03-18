<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Inscripciones</h1>
	</div>
</div>

<div class="box">
	<div class="box-body">
		<div class="form-group">
			<label for="selGrupo" class="col-lg-2">Grupo</label>
			<div class="col-lg-8">
				<select id="selGrupo" name="selGrupo" class="form-control">
					{foreach from=$grupos item="row"}
						<option value="{$row.idGrupo}">{$row.grupo} del grado {$row.grado} de {$row.nivel} del ciclo {$row.ciclo}
					{/foreach}
				</select>
			</div>
		</div>
	</div>
	<div class="box-footer">
		<button class="btn btn-info pull-right">Buscar</button>
		<input type="hidden" id="id"/>
	</div>
</div>

<div class="box">
	<div class="box-body">
		<div class="form-group">
			<label for="selGrupo" class="col-lg-2">Agregar a</label>
			<div class="col-lg-8">
				<input type="text" id="txtEstudiante" name="txtEstudiante" value="" class="form-control"/>
			</div>
		</div>
		<br /><br /><br />
		<div class="row">
			<div id="lista" class="col-xs-12">asdf</div>
		</div>
	</div>
</div>
