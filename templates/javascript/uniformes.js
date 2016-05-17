$(document).ready(function(){
	getLista();
	
	$("#panelTabs li a[href=#add]").click(function(){
		$("#frmAdd").get(0).reset();
		$("#id").val("");
		$("form:not(.filter) :input:visible:enabled:first").focus();
		$("#selTipo").prop("disabled", false);
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
			selProveedor: "required",
			selTipo: "required",
			txtLista: {
				required: true,
				number: "Solo se aceptan números",
				min: 0
			},
			txtVenta: {
				required: true,
				number: "Solo se aceptan números",
				min: 0
			}
		},
		wrapper: 'span', 
		messages: {
			"txtClave": {
				remote: "Esta clave ya fue asignada por otro artículo"
			}
		},
		submitHandler: function(form){
			var obj = new TUniforme;
			obj.add(
				$("#id").val(), 
				$("#selProveedor").val(),
				$("#selTipo").val(),
				$("#txtClave").val(),
				$("#txtNombre").val(),
				$("#txtLista").val(),
				$("#txtVenta").val(),
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
		$.get("listaUniformes", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TUniforme;
					obj.del($(this).attr("uniforme"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idUniforme);
				$("#selProveedor").val(el.idProveedor);
				$("#selTipo").val(el.idTipo);
				$("#txtClave").val(el.clave);
				$("#txtNombre").val(el.nombre);
				$("#txtLista").val(el.preciolista);
				$("#txtVenta").val(el.precioventa);
				$("#selTipo").prop("disabled", true);
				
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("[action=existencias]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#winExistencias").modal();
				listaTallas(el.idUniforme);
			});
			
			$("#tblUniformes").DataTable({
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
	
	function listaTallas(uniforme){
		$.post("listaTallasUniformes", {
			"uniforme": uniforme
		}, function(html) {
			$("#winExistencias").find(".modal-body").html(html);
			$("#winExistencias").find(".cantidad").change(function(){
				var data = jQuery.parseJSON($(this).attr("datos"));
				var el = $(this);
				var obj = new TUniforme;
				
				obj.setExistencias(data.idUniforme, data.idTalla, el.val(), {
					before: function(){
						el.prop("disabled", true);
					},
					after: function(resp){
						el.prop("disabled", false);
						
						if (resp.band != true)
							alert("Ocurrió un error al establecer las existencias");
					}
				});
			});
		});
	}
});