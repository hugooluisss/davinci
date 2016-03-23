<div class="box">
	<div class="box-body">
		<table id="tblRutas" class="table table-bordered table-hover">
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
						<td>{$row.idRuta}</td>
						<td>{$row.nombre}</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-primary btn-circle" action="inscritos" title="Inscritos" ruta='{$row.idRuta}'><i class="fa fa-users"></i></button>
							<button type="button" class="btn btn-success btn-circle" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger btn-circle" action="eliminar" title="Eliminar" ruta="{$row.idRuta}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>