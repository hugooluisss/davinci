<table id="tblEstudiantes" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Folio</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr>
				<td>{$row.idEstudiante}</td>
				<td>{$row.nombre} {$row.app} {$row.apm}</td>
				<td class="text-right">
					<input class="form-control folio text-right" value="{$row.folio}" inscripcion="{$row.idInscripcion}"/>
				</td>
				<td style="text-align: right">
					<button type="button" class="btn btn-primary" action="constancia" title="Constancia de inscripcion" inscripcion="{$row.idInscripcion}"><i class="fa fa-file-pdf-o"></i></button>
					<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" inscripcion="{$row.idInscripcion}"><i class="fa fa-times"></i></button>
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>