<div class="box">
	<div class="box-body">
		<table id="tblGrupos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Ciclo</th>
					<th>Grado</th>
					<th>Nivel</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.idGrupo}</td>
						<td>{$row.nombre}</td>
						<td>{$row.ciclo}</td>
						<td>{$row.grado}</td>
						<td>{$row.nivel}</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-success btn-circle" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger btn-circle" action="eliminar" title="Eliminar" grupo="{$row.idGrupo}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>