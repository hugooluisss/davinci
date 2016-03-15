<div class="box">
	<div class="box-body">
		<table id="tblCiclos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Consecutivo</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.idCiclo}</td>
						<td>{$row.nombre}</td>
						<td>
							<input class="input-control consecutivo" value="{$row.consecutivo}" idNivel="{$row.idNivel}" />
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>