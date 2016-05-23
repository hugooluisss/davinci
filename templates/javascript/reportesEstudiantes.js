$(document).ready(function(){
	var ventana = new Object;
	$("#cuidados").find("input#btnEnviar").click(function(){
		$("#cuidados").find("input#btnEnviar").prop("disabled", true);
		
		$.post("creportes", {
			"action": "generarCuidados",
			"grupo": $("#cuidados").find("#selGrupo").val()
		}, function(resp){
			$("#cuidados").find("input#btnEnviar").prop("disabled", false);
			
			if (resp.band == true)
				openDocumento(resp.doc);
			else
				alert("Ocurrió un error al generar el documento");
		}, "json");
	});
	
	function openDocumento(documento){
		if (ventana == undefined || ventana == null)
			ventana = window.open(documento,'_blank');
		else{
			try{
				ventana.location.href = documento;
			}catch(er){
				ventana = window.open(documento,'_blank');
			}
			
			
		}
		
		ventana.focus();
	}
});