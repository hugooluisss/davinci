<div class="box">
	<div class="box-body">
		<table id="tblPermisos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Fecha</th>
					<th>Días</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.idPermiso}</td>
						<td>{$row.fecha}</td>
						<td>{$row.dias}</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-success btn-circle" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger btn-circle" action="eliminar" title="Eliminar" permiso="{$row.idPermiso}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>