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
			txtClave: {
				required: true,
				remote: {
					url: "./clibros",
					type: "post",
					data: {
						action: "validaClave",
						id: function(){
							return $("#id").val();
						}
					}
				}
			},
			txtNombre: "required",
			selEditorial: "required",
			selAsignatura: "required",
			txtLista: {
				required: true,
				number: "Solo se aceptan números",
				min: 0
			},
			txtVenta: {
				required: true,
				number: "Solo se aceptan números",
				min: 0
			},
			txtExistencias: {
				required: true,
				number: "Solo se aceptan números",
				min: 0
			}
		},
		wrapper: 'span',
		messages:{
			txtClave: {
				remote: "Esta clave ya está siendo usada..."
			}
		},
		submitHandler: function(form){
			var obj = new TLibro;
			obj.add(
				$("#id").val(), 
				$("#selEditorial").val(),
				$("#selAsignatura").val(),
				$("#txtClave").val(),
				$("#txtNombre").val(),
				$("#txtLista").val(),
				$("#txtVenta").val(),
				$("#txtExistencias").val(),
				{
					after: function(datos){
						if (datos.band == true){
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
		$.get("listaLibros", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TLibro;
					obj.del($(this).attr("libro"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idLibro);
				$("#txtClave").val(el.clave);
				$("#txtNombre").val(el.nombre);
				$("#selEditorial").val(el.idEditorial);
				$("#txtLista").val(el.preciolista);
				$("#txtVenta").val(el.precioventa);
				$("#txtExistencias").val(el.existencias);
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("#tblLibros").DataTable({
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