<div class="box">
	<div class="box-body">
		<table id="tblLibros" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Clave</th>
					<th>Nombre</th>
					<th>Asignatura</th>
					<th>Exist</th>
					<th>P. V.</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.clave}</td>
						<td>{$row.nombre}</td>
						<td>{$row.asignatura}</td>
						<td class="text-right">{$row.existencias}</td>
						<td class="text-right">{$row.precioventa}</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-success btn-circle" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger btn-circle" action="eliminar" title="Eliminar" libro="{$row.idLibro}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>