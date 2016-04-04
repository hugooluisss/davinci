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
			txtCosto: {
				required: true,
				number: true
			}
		},
		wrapper: 'span', 
		messages: {
			txtNombre: "Es necesario un nombre",
			selCiclo: "Es necesario definir un ciclo",
			txtCosto: "Indica el costo de la ruta",
		},
		submitHandler: function(form){
			var obj = new TRuta;
			obj.add(
				$("#id").val(), 
				$("#selCiclo").val(),
				$("#txtNombre").val(),
				$("#txtCosto").val(),
				$("#txtDescripcion").val(),
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
		$.get("listaRutas", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TRyta;
					obj.del($(this).attr("ruta"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idRuta);
				$("#txtNombre").val(el.nombre);
				$("#txtDescripcion").val(el.descripcion);
				$("#txtCosto").val(el.costo);
				$("#selCiclo").val(el.idCiclo);
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("[action=inscritos]").click(function(){
				getListaEstudiantes($(this).attr('ruta'));
			});
			
			$("#tblRutas").DataTable({
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
			source: "?mod=crutas&action=estudiantes&id=" + id,
			minLength: 2,
			select: function(e, el){
				var obj = new TRuta;
		
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
		
		$("#winEstudiantesRutas").modal();
		
		$.get("index.php?mod=listaEstudiantesRutas&id=" + id, function( data ) {
			$("#dvListaEstudiantes").html(data);
			
			$("#dvListaEstudiantes [action=eliminarEstudiante]").click(function(){
				var el = $(this);
				var obj = new TRuta;
				
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