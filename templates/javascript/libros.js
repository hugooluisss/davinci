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
					url: "./cuniformes",
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
			txtExistencia: {
				required: true,
				number: "Solo se aceptan números",
				min: 0
			}
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TLibro;
			obj.add(
				$("#id").val(), 
				$("#selEditorial").val(),
				$("#txtClave").val(),
				$("#txtNombre").val(),
				$("#txtLista").val(),
				$("#txtVenta").val(),
				$("#txtExistencia").val(),
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
		$.post("listaLibros", {
			"plan": $("#plan").val()
		}, function( data ) {
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