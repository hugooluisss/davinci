$(document).ready(function(){
	getLista();
	
	$("#panelTabs li a[href=#add]").click(function(){
		$("#frmAdd").get(0).reset();
		$("#id").val("");
		$("form:not(.filter) :input:visible:enabled:first").focus();
	});
	
	$("#btnReset").click(function(){
		$('#panelTabs a[href="#listas"]').tab('show');
	});
	
	$("#frmAdd").validate({
		debug: true,
		rules: {
			txtNombre: "required",
			selCiclo: "required",
		},
		wrapper: 'span', 
		messages: {
			txtNombre: "Es necesario un nombre",
			selCiclo: "Es necesario definir un ciclo",
		},
		submitHandler: function(form){
			var obj = new TOptativa;
			obj.add(
				$("#id").val(), 
				$("#selNivel").val(),
				$("#selCiclo").val(),
				$("#txtNombre").val(),
				$("#txtResponsable").val(),
				{
					after: function(datos){
						if (datos.band){
							getLista();
							$("#frmAdd").get(0).reset();
							$('#panelTabs a[href="#listas"]').tab('show');
						}else{
							alert("Upps... " + datos.mensaje);
						}
					}
				}
			);
        }

    });
		
	function getLista(){
		$.get("listaOptativas", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TOptativa;
					obj.del($(this).attr("optativa"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idOptativa);
				$("#txtNombre").val(el.nombre);
				$("#txtResponsable").val(el.responsable);
				$("#selNivel").val(el.idNivel);
				$("#selCiclo").val(el.idCiclo);
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("[action=inscritos]").click(function(){
				getListaEstudiantes($(this).attr('optativa'));
			});
			
			$("#tblOptativas").DataTable({
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
	
	function getListaEstudiantes(id){
		$("#txtEstudiante").autocomplete({
			source: "?mod=coptativas&action=estudiantes&id=" + id,
			minLength: 2,
			select: function(e, el){
				var obj = new TOptativa;
		
				obj.addEstudiante(id, el.item.identificador, {
					after: function(result){
						if (result.band == true){
							alert("Estudiante inscrito");
							$("#txtEstudiante").val("");
							
							getListaEstudiantes(id);
						}else
							alert("Ocurrió un error al agregar al estudiante");
					}
				});
			}
		});
		
		$("#winEstudiantesOptativa").modal();
		
		$.get("index.php?mod=listaEstudiantesOptativa&id=" + id, function( data ) {
			$("#dvListaEstudiantes").html(data);
			
			$("#dvListaEstudiantes [action=eliminarEstudiante]").click(function(){
				var el = $(this);
				var obj = new TOptativa;
				
				obj.delEstudiante(id, el.attr("estudiante"), {
					after: function(result){
						if (result.band == true){
							alert("Estudiante eliminado");
							
							getListaEstudiantes(id);
						}else
							alert("Ocurrió un error al eliminar al estudiante");
					}
				});
			});
			
			$("#tblEstudiantes").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": false,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
		});
	}
});