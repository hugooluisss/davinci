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
							<button type="button" class="btn btn-default" action="seleccionar" title="Seleccionar" producto='{$row.json}'>
					<i class="fa fa-hand-pointer-o"></i>
				</button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>