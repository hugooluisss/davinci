<div class="box">
	<div class="box-body">
		<table id="tblEstudiantes" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Matrícula</th>
					<th>Nombre</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.matricula}</td>
						<td>{$row.nombre} {$row.app} {$row.apm}</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-danger btn-circle" action="eliminarEstudiante" title="Eliminar" estudiante="{$row.idEstudiante}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>