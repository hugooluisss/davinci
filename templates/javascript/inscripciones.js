$(document).ready(function(){
	getLista();
	
	$("#txtEstudiante").autocomplete({
		source: "?mod=cinscripciones&action=estudiantes&grupo=" + $("#selGrupo").val(),
		minLength: 2,
		select: function(e, el){
			$("#add #txtLocalidad").attr("localidad", el.item.identificador);
			$("#add #txtLocalidad").attr("anterior", el.item.label);
		}
	});
	
	$("#selGrupo").change(function(){
		$("#txtEstudiante").autocomplete({
			source: "?mod=cinscripciones&action=estudiantes&grupo=" + $("#selGrupo").val(),
			minLength: 2,
			select: function(e, el){
				$("#add #txtLocalidad").attr("localidad", el.item.identificador);
				$("#add #txtLocalidad").attr("anterior", el.item.label);
			}
		});
		
		getLista();
	});
	
	function getLista(){
		$.get("?mod=listaInscripciones&grupo=" + $("#selGrupo").val(), function( data ) {
			$("#lista").html(data);
			
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
});