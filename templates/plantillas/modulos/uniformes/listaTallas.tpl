<div class="box">
	<div class="box-body">
		<table id="tblTallas" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Cantidad</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.nombre}</td>
						<td>
							<input type="number" class="form-control text-right cantidad" datos='{$row.json}' value="{if $row.cantidad eq ''}0{else}{$row.cantidad}{/if}"/>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>