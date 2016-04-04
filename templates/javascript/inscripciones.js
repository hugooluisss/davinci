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
	
	var ventana = undefined;
	
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
			
			$("[action=constancia]").click(function(){
				$.get('?mod=cinscripciones&action=pdf&id=' + $(this).attr("inscripcion"), function(data){
					console.log(data);
					
					if (data.band){
						if (ventana == undefined || ventana == null)
							ventana = window.open(data.doc,'_blank');
						else{
							try{
								ventana.location.href = data.doc;
							}catch(er){
								ventana = window.open(data.doc,'_blank');
							}
						}
						
						ventana.focus();	
					}
					
				}, "json");
			});
			
			$(".folio").change(function(){
				var obj = new TEstudiante;
				var el = $(this);
				
				el.attr("anterior", el.val());
				
				obj.setFolioInscripcion($(this).attr('inscripcion'), $(this).val(), {
					before: function(){
						el.prop("disabled", true);
					},
					after: function(resp){
						el.prop("disabled", false);
						if (resp.band == true)
							el.attr("anterior", el.val());
						else{
							el.val(el.attr("anterior"));
							alert("Ocurrió un error al actualizar el número de folio");
						}
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