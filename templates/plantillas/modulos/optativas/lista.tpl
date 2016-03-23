<div class="box">
	<div class="box-body">
		<table id="tblOptativas" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Responsable</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.idOptativa}</td>
						<td>{$row.nombre}</td>
						<td>{$row.responsable}</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-primary btn-circle" action="inscritos" title="Inscritos" optativa='{$row.idOptativa}'><i class="fa fa-users"></i></button>
							<button type="button" class="btn btn-success btn-circle" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger btn-circle" action="eliminar" title="Eliminar" optativa="{$row.idOptativa}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>