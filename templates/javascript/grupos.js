$(document).ready(function(){
	getLista();
	var ventana = undefined;
	$("[data-mask]").inputmask();
	
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
			
			$("[action=asistencias]").click(function(){
				$("#winAsistencias").modal();
				$("#winAsistencias #dvLista").html("Actualizando lista...");
				
				var f = new Date();
				dia = f.getDate();
				if (dia < 10)
					dia = '0' + dia;
				$("#winAsistencias #txtFecha").val(f.getFullYear() + "-" + (f.getMonth() +1) + "-" + dia);
				$("#winAsistencias #txtFecha").focus();
				$("#grupo").val($(this).attr("grupo"));
				getListaAsistencia();
			});
			
			$("[action=imprimirAsistencias]").click(function(){
				var el = $(this);
				$("#btnImprimir").attr("grupo", el.attr("grupo"));
				$("#winImpresion").modal();
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
		
		$("#winAsistencias #txtFecha").change(function(){
			getListaAsistencia();
		});
		
		$("#btnImprimir").click(function(){
			var grupo = new TGrupo;
			grupo.generarListaAsistencia($("#btnImprimir").attr("grupo"), $("#selMes").val(), $("#selAnio").val(), true, {
				before: function(){
					$("#btnImprimir").prop("disable", true); 
					$("#selAnio").prop("disable", true); 
					$("#selMes").prop("disable", true);
				},
				after: function(data){
					$("#btnImprimir").prop("disable", false); 
					$("#selAnio").prop("disable", false); 
					$("#selMes").prop("disable", false);
					
					if (data.band == true){
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
					}else
						alert("No se pudo generar la ficha del estudiante");
				}
			});
		});
		
		$("#btnVacio").click(function(){
			var grupo = new TGrupo;
			grupo.generarListaAsistencia($("#btnImprimir").attr("grupo"), $("#selMes").val(), $("#selAnio").val(), false, {
				before: function(){
					$("#btnImprimir").prop("disable", true); 
					$("#selAnio").prop("disable", true); 
					$("#selMes").prop("disable", true);
				},
				after: function(data){
					$("#btnImprimir").prop("disable", false); 
					$("#selAnio").prop("disable", false); 
					$("#selMes").prop("disable", false);
					
					if (data.band == true){
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
					}else
						alert("No se pudo generar la ficha del estudiante");
				}
			});
		});
	};
	
	function getListaAsistencia(){
		$.post("asistencias", {
			"fecha": $("#winAsistencias #txtFecha").val(),
			"grupo": $("#grupo").val()
		}, function(data) {
			$("#winAsistencias #dvLista").html(data);
			
			$("[action=setAsistencia]").change(function(){
				var el = $(this);
				var estudiante = new TEstudiante;
				
				if (el.is(":checked")){
					estudiante.addAsistencia(el.attr("inscripcion"), $("#winAsistencias #txtFecha").val(), {
						before: function(){
							el.prop("disabled", true);
						},
						after: function(data){
							el.prop("disabled", false);
							if (data.band == false){
								alert("Ocurrió un error al establecer la asistencia del estudiante");
								el.prop("checked", false);
							}
						}
					});
				}else{
					estudiante.dropAsistencia(el.attr("inscripcion"), $("#winAsistencias #txtFecha").val(), {
						before: function(){
							el.prop("disabled", true);
						},
						after: function(data){
							el.prop("disabled", false);
							if (data.band == false){
								alert("Ocurrió un error al eliminar la asistencia del estudiante");
								el.prop("checked", true);
							}
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
	}
});