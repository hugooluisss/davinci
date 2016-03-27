$(document).ready(function(){
	$("#permisos #panelTabs li a[href=#add]").click(function(){
		$("#frmAdd").get(0).reset();
		$("#id").val("");
		$("form:not(.filter) :input:visible:enabled:first").focus();
	});
	
	$("#permisos #btnReset").click(function(){
		$('#panelTabs a[href="#listas"]').tab('show');
	});
	
	$("#permisos #frmAdd").validate({
		debug: true,
		rules: {
			txtDias: "required",
			txtFecha: "required",
		},
		wrapper: 'span', 
		messages: {
			txtDias: "Especifica el número de días",
			txtFecha: "Indica la fecha donde inicia",
		},
		submitHandler: function(form){
			var obj = new TPermiso;
			obj.add(
				$("#permisos #id").val(), 
				$("#permisos #estudiante").val(),
				$("#permisos #txtFecha").val(),
				$("#permisos #txtDias").val(),
				$("#permisos #txtComentarios").val(),
				{
					after: function(datos){
						if (datos.band){
							getListaPermisos($("#estudiante").val());
							$("#permisos #frmAdd").get(0).reset();
							$('#panelTabs2 a[href="#listasPermisos"]').tab('show');
						}else{
							alert("Upps... " + datos.mensaje);
						}
					}
				}
			);
        }

    });
});

function getListaPermisos(estudiante){
		$.get("?mod=listaPermisos&estudiante=" + estudiante, function( data ) {
			$("#permisos #dvLista").html(data);
			
			$("#permisos [action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TPermiso;
					obj.del($(this).attr("permiso"), {
						after: function(data){
							getListaPermisos($("#estudiante").val());
						}
					});
				}
			});
			
			$("#permisos [action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#permisos #id").val(el.idPermiso);
				$("#permisos #txtFecha").val(el.fecha);
				$("#permisos #txtDias").val(el.dias);
				$("#permisos #txtComentarios").val(el.comentario);
				$('a[href="#addPermisos"]').tab('show');
			});
			
			$("#tblPermisos").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": false,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
		});
	};