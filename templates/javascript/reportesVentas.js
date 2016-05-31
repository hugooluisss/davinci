$(document).ready(function(){
	$("#ventas #txtInicio").datepicker( "option", "dateFormat", "yyyy-mm-dd" );
	$("#ventas #txtFin").datepicker( "option", "dateFormat", "yyyy-mm-dd" );
	
	var ventana = new Object;
	$("#inventarioUniformes").find("input#btnEnviar").click(function(){
		$("#inventarioUniformes").find("input#btnEnviar").prop("disabled", true);
		
		$.post("creportes", {
			"action": "generarInventarioUniformes",
			"preciolista": function(){
				return confirm("¿Deseas incluir el precio de lista?")
			}
		}, function(resp){
			$("#inventarioUniformes").find("input#btnEnviar").prop("disabled", false);
			
			if (resp.band == true)
				openDocumento(resp.doc);
			else
				alert("Ocurrió un error al generar el documento");
		}, "json");
	});
	
	$("#inventarioLibros").find("input#btnEnviar").click(function(){
		$("#inventarioLibros").find("input#btnEnviar").prop("disabled", true);
		
		$.post("creportes", {
			"action": "generarInventarioLibros",
			"preciolista": function(){
				return confirm("¿Deseas incluir el precio de lista?")
			}
		}, function(resp){
			$("#inventarioLibros").find("input#btnEnviar").prop("disabled", false);
			
			if (resp.band == true)
				openDocumento(resp.doc);
			else
				alert("Ocurrió un error al generar el documento");
		}, "json");
	});
	
	$("#ventas").find("input#btnEnviar").click(function(){
		$("#ventas").find("input#btnEnviar").prop("disabled", true);
		
		$.post("creportes", {
			"action": "generarVentas",
			"inicio": $("#ventas").find("#txtInicio").val(),
			"fin": $("#ventas").find("#txtFin").val()
		}, function(resp){
			$("#ventas").find("input#btnEnviar").prop("disabled", false);
			
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