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
			txtTelefono: {
				digits: true,
				minlength: 5,
				maxlength: 12
			},
			txtEmail: {
				required: true,
				email: true
			}
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TProveedor;
			obj.add(
				$("#id").val(), 
				$("#txtNombre").val(),
				$("#txtTelefono").val(),
				$("#txtEmail").val(),
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
		$.get("listaProveedores", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TProveedor;
					obj.del($(this).attr("proveedor"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idProveedor);
				$("#txtNombre").val(el.nombre);
				$("#txtTelefono").val(el.telefono);
				$("#txtEmail").val(el.email);
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("#tblTipos").DataTable({
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