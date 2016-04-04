<table id="tblEstudiantes" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>¿Asistió?</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr>
				<td>{$row.nombre}</td>
				<td>
					<input type="checkbox" inscripcion="{$row.idInscripcion}" fecha="{$fecha}" action="setAsistencia" {if $row.asistio eq true}checked{/if}/>
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>