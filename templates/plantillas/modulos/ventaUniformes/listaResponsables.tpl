<table id="tblPadres" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Responsable</th>
			<th>Estudiante</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item=row}
		<tr>
			<td>{$row.nombre}</td>
			<td>{$row.estudiante}</td>
			<td class="text-right">
				<button type="button" class="btn btn-default" action="seleccionar" title="Seleccionar" responsable='{$row.json}'>
					<i class="fa fa-hand-pointer-o"></i>
				</button>
			</td>
		</tr>
		{/foreach}
	</tbody>
</table>