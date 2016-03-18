<div class="box">
	<div class="box-body">
		<table id="tblResponsables" class="table table-bordered table-hover">
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
						<td>{$row.idResponsable}</td>
						<td>{$row.nombre}</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-primary btn-circle" action="seleccionar" title="Seleccionar" datos='{$row.json}'><i class="fa fa-hand-pointer-o"></i></button>
							<button type="button" class="btn btn-success btn-circle" action="modificarResponsable" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger btn-circle" action="eliminarResponsable" title="Eliminar" responsable="{$row.idResponsable}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>