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
			txtClave: "required",
			txtNombre: "required",
			selGrado: "required",
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TAsignatura;
			obj.add(
				$("#id").val(), 
				$("#plan").val(),
				$("#selGrado").val(),
				$("#txtClave").val(),
				$("#txtNombre").val(),
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
		$.post("listaAsignaturas", {
			"plan": $("#plan").val()
		}, function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TAsignatura;
					obj.del($(this).attr("asignatura"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idAsignatura);
				$("#txtClave").val(el.clave);
				$("#txtNombre").val(el.nombre);
				$("#selGrado").val(el.idGrado);
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("#tblAsignaturas").DataTable({
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