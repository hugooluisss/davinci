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
			selEstado: "required",
			selCiclo: "required",
			selGrado: "required",
		},
		wrapper: 'span', 
		messages: {
			txtNombre: "Es necesario un nombre",
			txtEstado: "Es necesario definir el estado",
			selCiclo: "Todo grupo pertenece a un ciclo",
			selGrado: "Todo grupo pertenece tiene un grado"
		},
		submitHandler: function(form){
			var obj = new TGrupo;
			obj.add(
				$("#id").val(),
				$("#selCiclo").val(),
				$("#selGrado").val(),
				$("#txtNombre").val(),
				$("#selEstado").val(),
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
		$.get("listaGrupos", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TGrupo;
					obj.del($(this).attr("grupo"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idGrupo);
				$("#txtNombre").val(el.nombre);
				$("#selEstado").val(el.estado);
				$("#selCiclo").val(el.idCiclo);
				$("#selGrado").val(el.idGrado);
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("#tblGrupos").DataTable({
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