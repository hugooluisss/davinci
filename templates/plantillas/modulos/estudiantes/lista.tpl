<div class="box">
	<div class="box-body">
		<div class="alert alert-info" id="dvInfo">
			<strong>Obteniendo datos</strong> Estoy obteniendo los datos del estudiante, por favor espera un momento...
		</div>
		<table id="tblEstudiantes" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Matrícula</th>
					<th>Nombre</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.idEstudiante}</td>
						<td>{$row.matricula}</td>
						<td>{$row.nombre} {$row.app} {$row.apm}</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-primary" action="permisos" title="Registro de permisos" estudiante='{$row.idEstudiante}'><i class="fa fa-suitcase"></i></button>
							<button type="button" class="btn btn-primary" action="fotografia" title="Fotografía" estudiante='{$row.idEstudiante}'><i class="fa fa-picture-o"></i></button>
							<button type="button" class="btn btn-primary" action="matricula" title="Cambiar Matrícula" estudiante='{$row.idEstudiante}' matricula="{$row.matricula}" {if $row.matricula eq ''}disabled{/if}><i class="fa fa-pencil-square-o"></i></button>
							<button type="button" class="btn btn-success" action="modificar" title="Modificar" estudiante='{$row.idEstudiante}'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" estudiante="{$row.idEstudiante}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>