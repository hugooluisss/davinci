<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Administración de Niveles Educativos</h1>
	</div>
</div>

<div class="box">
	<div class="box-body">
		<table id="tblNiveles" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Inicial</th>
					<th>Consecutivo</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.idNivel}</td>
						<td>{$row.nombre}</td>
						<td>{$row.inicial}</td>
						<td>
							<input class="input-control text-right consecutivo" value="{$row.consecutivo}" anterior="{$row.consecutivo}" idNivel="{$row.idNivel}" />
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>