<div id="winFotografia" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" data-toogle="modal">
    <div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1>Subir fotografía</h1>
			</div>
			<div class="modal-body">
				<form id="upload" method="post" action="?mod=cestudiantes&action=uploadfile" enctype="multipart/form-data">
					<input type="hidden" id="fotoEstudiante" name="fotoEstudiante">
					<input type="file" name="upl" multiple accept="image/jpg,image/jpeg"/>
					<ul class="elementos list-group">
					</ul>
				</form>
			</div>
		</div>
    </div>
</div>