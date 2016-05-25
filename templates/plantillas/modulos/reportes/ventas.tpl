<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Reportes de ventas e inventario</h1>
	</div>
</div>

<div class="panel-group" id="accordion">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#inventarioUniformes">Inventario de uniformes</a>
			</h4>
		</div>
		<div id="inventarioUniformes" class="panel-collapse collapse in">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-2">
						<input type="button" class="btn btn-primary" value="Generar" id="btnEnviar">
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#inventarioLibros">Inventario de libros</a>
			</h4>
		</div>
		<div id="inventarioLibros" class="panel-collapse collapse">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-2">
						<input type="button" class="btn btn-primary" value="Generar" id="btnEnviar">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#ventas">Ventas</a>
			</h4>
		</div>
		<div id="ventas" class="panel-collapse collapse">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-2">Fechas</div>
					<div class="col-md-4">
						<input type="text" id="txtInicio" name="txtInicio" value="{$smarty.now|date_format:"Y-m-d"}" />
						<div id="datepicker"></div>
					</div>
					<div class="col-md-4">
						<input type="text" id="txtFin" name="txtFin" value="{$smarty.now|date_format:"Y-m-d"}" />
						<div id="datepicker"></div>
					</div>
					<div class="col-md-2">
						<input type="button" class="btn btn-primary" value="Generar" id="btnEnviar">
					</div>
				</div>
			</div>
		</div>
	</div>

</div>