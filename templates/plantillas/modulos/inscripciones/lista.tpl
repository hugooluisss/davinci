<table id="tblEstudiantes" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr>
				<td>{$row.idEstudiante}</td>
				<td>{$row.nombre} {$row.app} {$row.apm}</td>
				<td style="text-align: right">
					<button type="button" class="btn btn-danger btn-circle" action="eliminar" title="Eliminar" inscripcion="{$row.idInscripcion}"><i class="fa fa-times"></i></button>
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>