<form role="form" id="frmAddParentesco" class="form-horizontal" onsubmit="javascript: return false;">
	<h2>Generales</h2>
	<div class="form-group">
		<label for="selParentesco" class="col-lg-4">Parentesco</label>
		<div class="col-lg-8">
			<select class="form-control" id="selParentesco" name="selParentesco">
				<option value="">Selecciona
				{foreach from=$parentesco item="row"}
					<option value="{$row.idParentesco}">{$row.nombre}</option>
				{/foreach}
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="txtNombre" class="col-lg-4">Nombre</label>
		<div class="col-lg-8">
			<input class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre(s)">
		</div>
	</div>
	<div class="form-group">
		<label for="txtApp" class="col-lg-4">Apellido Paterno</label>
		<div class="col-lg-8">
			<input class="form-control" id="txtApp" name="txtApp" placeholder="Apellido paterno">
		</div>
	</div>
	<div class="form-group">
		<label for="txtApm" class="col-lg-4">Apellido Materno</label>
		<div class="col-lg-8">
			<input class="form-control" id="txtApm" name="txtApm" placeholder="Apellido materno">
		</div>
	</div>
	<div class="form-group">
		<label for="txtOcupacion" class="col-lg-4">Ocupación</label>
		<div class="col-lg-8">
			<input class="form-control" id="txtOcupacion" name="txtOcupacion" placeholder="Ocupación">
		</div>
	</div>
	<div class="form-group">
		<label for="txtEmpresa" class="col-lg-4">Empresa</label>
		<div class="col-lg-8">
			<input class="form-control" id="txtEmpresa" name="txtEmpresa" placeholder="Empresa donde trabaja">
		</div>
	</div>
	<div class="form-group">
		<label for="txtTelefono" class="col-lg-4">Telefono</label>
		<div class="col-lg-5">
			<input class="form-control" id="txtTelefono" name="txtTelefono" placeholder="Teléfono">
		</div>
		<div class="col-lg-3">
			<input class="form-control" id="txtExtension" name="txtExtension" placeholder="Extensión">
		</div>
	</div>
	<div class="form-group">
		<label for="txtTelefono" class="col-lg-4">Teléfono</label>
		<div class="col-lg-8">
			<input class="form-control" id="txtTelefono" name="txtTelefono" placeholder="Teléfono de contacto">
		</div>
	</div>
	<div class="form-group">
		<label for="txtCelular" class="col-lg-4">Celular</label>
		<div class="col-lg-8">
			<input class="form-control" id="txtCelular" name="txtCelular" placeholder="Celular">
		</div>
	</div>
	<div class="form-group">
		<label for="txtCorreo" class="col-lg-4">Correo electrónico</label>
		<div class="col-lg-8">
			<input class="form-control" id="txtCorreo" name="txtCorreo" placeholder="Correo electrónico">
		</div>
	</div>
	<div class="box-footer">
			<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id"/>
	</div>
</form>