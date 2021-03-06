<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="box">
		<div class="box-body">
			<h2>Generales</h2>
			<div class="form-group">
				<label for="selNivel" class="col-lg-2">Nivel</label>
				<div class="col-lg-3">
					<select class="form-control" id="selNivel" name="idNivel">
						<option value="">Selecciona
						{foreach from=$nivel item="row"}
							<option value="{$row.idNivel}">{$row.nombre}
						{/foreach}
					</select>
				</div>
				<label for="selIngreso" class="col-lg-2">Año de ingreso</label>
				<div class="col-lg-2">
					<select id="selIngreso" name="selIngreso" class="form-control">
						{while $anio > $anio2}
							<option value="{$anio}">{$anio--}
						{/while}
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="selIngreso" class="col-lg-2">Matrícula</label>
				<div class="col-lg-2">
					<input class="form-control" id="txtMatricula" name="txtMatricula" disabled="true">
				</div>
			</div>
			<hr />
			<h2>Personales</h2>
			<div class="form-group">
				<label for="txtCURP" class="col-lg-2">CURP</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtCURP" name="txtCURP" placeholder="CURP">
				</div>
			</div>
			<div class="form-group">
				<label for="txtNombre" class="col-lg-2">Nombre</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre">
				</div>
				<div class="col-lg-3">
					<input class="form-control" id="txtApp" name="txtApp" placeholder="Apellido paterno">
				</div>
				<div class="col-lg-3">
					<input class="form-control" id="txtApm" name="txtApm" placeholder="Apellido materno">
				</div>
			</div>
			<div class="form-group">
				<label for="selSexo" class="col-lg-2">Sexo</label>
				<div class="col-lg-2">
					<select id="selSexo" name="selSexo" class="form-control">
						<option value="H">Hombre
						<option value="M">Mujer
					</select>
				</div>
				
				<label for="txtNacimiento" class="col-lg-2 col-lg-offset-2">Fecha de nacimiento</label>
				<div class="col-lg-2">
					<input class="form-control" id="txtNacimiento" name="txtNacimiento" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
				</div>
			</div>
			<div class="form-group">
				<label for="selEstadoNacimiento" class="col-lg-2">Lugar de nacimiento</label>
				<div class="col-lg-8">
					<select id="selEstadoNacimiento" name="selEstadoNacimiento" class="form-control">
						<option value=""></option>
					{foreach from=$estados item="row"}
						<option value="{$row.idEstado}" curp="{$row.cve_curp}">{$row.nombre}
					{/foreach}
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="txtEstatura" class="col-lg-2">Estatura</label>
				<div class="col-lg-2">
					<input class="form-control" id="txtEstatura" name="txtEstatura">
				</div>
				<label for="txtPeso" class="col-lg-offset-2 col-lg-2">Peso</label>
				<div class="col-lg-2">
					<input class="form-control" id="txtPeso" name="txtPeso">
				</div>
			</div>
			<div class="form-group">
				<label for="selSanguineo" class="col-lg-2">Grupo sanguineo</label>
				<div class="col-lg-2">
					<select id="selSanguineo" name="selSanguineo" class="form-control">
						{foreach from=$gruposSanguineos item="row"}
							<option value="{$row.idSanguineo}">{$row.abbr}
						{/foreach}
					</select>
				</div>
			</div>
			<hr />
			<h2>Responsables</h2>
			<div class="form-group">
				<label for="txtPapa" class="col-lg-2">Papá</label>
				<div class="col-lg-1">
					<a href="#" class="btn btn-success responsable" tipo="1"><i class="fa fa-search"></i> Buscar</a>
				</div>
				<div class="col-lg-8">
					<input class="form-control" id="txtPapa" name="txtPapa" placeholder="Escribe el nombre del papá" disabled>
				</div>
			</div>
			<div class="form-group">
				<label for="txtMama" class="col-lg-2">Mamá</label>
				<div class="col-lg-1">
					<a href="#" class="btn btn-success responsable" tipo="2"><i class="fa fa-search"></i> Buscar</a>
				</div>
				<div class="col-lg-8">
					<input class="form-control" id="txtMama" name="txtMama" placeholder="Escribe el nombre de la mamá" disabled>
				</div>
			</div>
			<div class="form-group">
				<label for="txtTutor" class="col-lg-2">Tutor</label>
				<div class="col-lg-1">
					<a href="#" class="btn btn-success responsable" tipo="3"><i class="fa fa-search"></i> Buscar</a>
				</div>
				<div class="col-lg-8">
					<input class="form-control" id="txtTutor" name="txtTutor" placeholder="Escribe el nombre del tutor" disabled>
				</div>
			</div>
			<hr />
			<h2>Domicilio</h2>
			<div class="form-group">
				<label for="txtDireccion" class="col-lg-2">Dirección</label>
				<div class="col-lg-10">
					<textarea id="txtDireccion" name="txtDireccion" class="form-control"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="txtNoExt" class="col-lg-2">Número exterior</label>
				<div class="col-lg-2">
					<input class="form-control" id="txtNoExt" name="txtNoExt">
				</div>
				<label for="txtNoInt" class="col-lg-2 col-lg-offset-2">Número interior</label>
				<div class="col-lg-2">
					<input class="form-control" id="txtNoInt" name="txtNoInt">
				</div>
			</div>
			<div class="form-group">
				<label for="txtColonia" class="col-lg-2">Colonia</label>
				<div class="col-lg-10">
					<input class="form-control" id="txtColonia" name="txtColonia" placeholder="Colonia">
				</div>
			</div>
			<div class="form-group">
				<label for="txtCodigoPostal" class="col-lg-2">Código postal</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtCodigoPostal" name="txtCodigoPostal">
				</div>
				<label for="txtDelegacion" class="col-lg-offset-1 col-lg-2">Delegación o Municipio</label>
				<div class="col-lg-4">
					<input class="form-control" id="txtDelegacion" name="txtDelegacion">
				</div>
			</div>
			<hr />
			<h2>Cuidados</h2>
			<div class="row">
				{foreach from=$cuidados item="row"}
				<div class="col-xs-12 col-sm-4 col-md-3">
					<div class="checkbox">
							<label><input type="checkbox" value="{$row.idCuidado}" class="cuidados" name="cuidados">{$row.nombre}</label>
					</div>
				</div>
				{/foreach}
			</div>
		</div>
		<div class="box-footer">
			<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id"/>
		</div>
	</div>
</form>