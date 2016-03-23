$(document).ready(function(){
	getLista();
	
	$("#txtEstudiante").autocomplete({
		source: "?mod=cinscripciones&action=estudiantes&grupo=" + $("#selGrupo").val(),
		minLength: 2,
		select: function(e, el){
			inscribir(el.item.identificador, $("#selGrupo").val());
		}
	});
	
	$("#selGrupo").change(function(){
		$("#txtEstudiante").autocomplete({
			source: "?mod=cinscripciones&action=estudiantes&grupo=" + $("#selGrupo").val(),
			minLength: 2,
			select: function(e, el){
				inscribir(el.item.identificador, $("#selGrupo").val());
			}
		});
		
		getLista();
	});
	
	function getLista(){
		$.get("?mod=listaInscripciones&grupo=" + $("#selGrupo").val(), function( data ) {
			$("#lista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TEstudiante;
					obj.quitarInscripcion($(this).attr("inscripcion"), {
						after: function(data){
							if (data.band != true)
								alert("Ocurrió un error al borrar la inscripción del estudiante");
							else
								getLista();
						}
					});
				}
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
	};
	
	function inscribir(est, grupo){
		var obj = new TEstudiante;
		
		obj.inscribe(est, grupo, {
			after: function(result){
				if (result.band == true){
					alert("Estudiante inscrito");
					$("#txtEstudiante").val("");
					
					getLista();
				}else
					alert("Ocurrió un error al insertar al estudiante");
			}
		});
	}
});