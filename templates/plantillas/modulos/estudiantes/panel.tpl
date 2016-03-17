<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Estudiantes</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#listas">Lista</a></li>
  <li><a data-toggle="tab" href="#add">Agregar o Modificar</a></li>
</ul>

<div class="tab-content">
	<div id="listas" class="tab-pane fade in active">
		<div id="dvLista">
		</div>
	</div>
	
	<div id="add" class="tab-pane fade">
		{include file=$PAGE.rutaModulos|cat:'/modulos/estudiantes/add.tpl'}
	</div>
</div>

<div id="winResponsables" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" data-toogle="modal">
    <div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1>Tutor y responsables</h1>
			</div>
			<div class="modal-body">
				<ul id="tabResponsables" class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#listaResponsables">Lista</a></li>
					<li><a data-toggle="tab" href="#nuevoResponsable">Nuevo / modificar</a></li>
				</ul>
				
				<div class="tab-content"> 
					<div id="listaResponsables" class="tab-pane fade in active">
						<div class="box">
							<div class="box-body">
								asdf2
							</div>
						</div>
					</div>
					<div id="nuevoResponsable" class="tab-pane fade in">
						<div class="box">
							<div class="box-body">
								{include file=$PAGE.rutaModulos|cat:'/modulos/estudiantes/addResponsable.tpl'}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>