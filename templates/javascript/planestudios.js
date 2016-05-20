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
			txtClave: "required",
		},
		wrapper: 'span',
		submitHandler: function(form){
			var obj = new TPlanEstudios;
			obj.add(
				$("#id").val(), 
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
		$.get("listaPlanes", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TPlanEstudios;
					obj.del($(this).attr("plan"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idPlan);
				$("#txtNombre").val(el.nombre);
				$("#txtClave").val(el.clave);
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("[action=asignaturas]").click(function(){
				var el = $(this).attr("plan");
				
				location.href = "?mod=asignaturas&plan=" + el;
			});
			
			$("#tblPlanes").DataTable({
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