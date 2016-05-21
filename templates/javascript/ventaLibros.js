$(document).ready(function(){
	getLista();
	$("#frmAdd #txtFecha").datepicker( "option", "dateFormat", "yyyy-mm-dd" );
	
	$('.nav a[href="#add"]').click(function(){
		$("#frmAdd")[0].reset();
		$("#frmAddProductos")[0].reset();
		$("#frmAdd #id").val("");
		showDetalle();
	});
	
	$("#btnBuscarPadres").click(function(){
		$("#winPadres").modal();
		
		$.get("responsablesVenta", function(html){
			$("#winPadres .modal-body").html(html);
			
			$("#winPadres #tblPadres button[action=seleccionar]").click(function(){
				var el =  jQuery.parseJSON($(this).attr("responsable"));
				
				$("#txtResponsable").val(el.nombre);
				$("#txtResponsable").attr("idResponsable", el.idResponsable);
				$("#winPadres").modal("hide");
			});
			
			$("#tblPadres").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": true
			});
		});
	});
	
	$("#frmAdd").validate({
		debug: false,
		rules: {
			txtFecha: "required",
			txtResponsable: "required"
		},
		errorElement : 'span',
		errorLabelContainer: '.errorTxt',
		submitHandler: function(form){
			var obj = new TVenta;
			obj.guardar(
				$("#id").val(), 
				$("#txtResponsable").attr("idResponsable"), 
				2,
				$("#txtFecha").val(),
				{
					before: function(){
						$("#frmAdd").prop("disabled", true);
					},
					after: function(datos){
						$("#frmAdd").prop("disabled", false);
						
						if (datos.band){
							alert("Listo... puedes ingresar los artículos vendidos");
							$("#frmAdd #id").val(datos.id);
							showDetalle();
							//getLista();
						}else{
							alert("Upps... " + datos.mensaje);
						}
					}
				}
			);
        }

    });
    
    function showDetalle(){
		if($("#frmAdd #id").val() == ''){
			$("#frmAddProductos").hide();
			$("#frmAddProductos").hide();
			$("#lstMovimiento").hide();
		}else{
			$("#frmAddProductos").show();
			$("#lstMovimiento").show();
			getListaMovimientos();
		}
	}
	
	$("#btnBuscarProductos").click(function(){
		$("#winLibros").modal();
		
		$.get("listaLibrosVender", function(html){
			$("#winLibros .modal-body").html(html);
			
			$("#winLibros #tblLibros button[action=seleccionar]").click(function(){
				var el =  jQuery.parseJSON($(this).attr("producto"));
				
				$("#frmAddProductos #txtClave").val(el.clave);
				$("#frmAddProductos #txtClave").attr("idLibro", el.idLibro);
				$("#frmAddProductos #txtDescripcion").val(el.nombre + " (" + el.clave + ")");
				$("#frmAddProductos #txtPrecio").val(el.precioventa);
				$("#frmAddProductos #txtCantidad").val(1);
				
				$("#winLibros").modal("hide");
				
				$("#frmAddProductos #txtPrecio").focus();
			});
			
			$("#tblLibros").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": true
			});
		});
	});
	
	function getLista(){
		$.get("listaVentasLibros", function(html){
			$("#dvLista").html(html);
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#frmAdd #id").val(el.idVenta);
				$("#frmAdd #txtResponsable").val(el.nombre);
				$("#frmAdd #txtResponsable").attr("idResponsable", el.idResponsable);
				$("#frmAdd #selPagos").val(el.pagos);
				$("#frmAdd #txtFecha").val(el.fecha);
				
				showDetalle();
				
				$('.nav a[href="#add"]').tab('show');
			});
			
			$("#dvLista [action=pagos]").click(function(){
				$("#winPagos").modal();
				$("#winPagos #venta").val($(this).attr("venta"));
				listaPagos($(this).attr("venta"));
			});
			
			$("#dvLista [action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TVenta ;
					obj.del($(this).attr("venta"), {
						after: function(data){
							if (data.band == false)
								alert("Ocurrió un error al eliminar la venta");
							getLista();
						}
					});
				}
			});
			
			$("#tblVentas").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": true,
				"order": [[ 0, "desc" ]]
			});
		});
	}
	
	function getListaMovimientos(){
		$.post("listaMovimientos", {"venta": $("#frmAdd #id").val()}, function(html){
			$("#lstMovimiento").html(html);
			
			$("#lstMovimiento [action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TVenta;
					obj.delMovimiento($(this).attr("movimiento"), {
						after: function(data){
							if (data.band == false)
								alert("Ocurrió un error al eliminar el elemento");
							getListaMovimientos();
						}
					});
				}
			});
			
			$("#tblMovimientos").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": false,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": true
			});
			
			$("#btnAplicar").click(function(){
		    	if(confirm("¿Seguro de querer aplicar la venta?")){
			    	var objVenta = new TVenta;
			    	objVenta.aplicar($("#id").val(), {
			    		before: function(){
				    		$("#btnAplicar").prop("disabled", true);
			    		}, after: function(resp){
				    		$("#btnAplicar").prop("disabled", false);
				    		
				    		if (resp.band == false)
				    			alert("La venta no se aplicó, ocurrió un error");
				    		else{
					    		$("#frmAdd")[0].reset();
								$("#frmAddProductos")[0].reset();
								$("#frmAdd #id").val("");
								showDetalle();
								getLista();
								alert("La venta se aplicó con éxito");
				    		}
			    		}
			    	});
		    	}
		    });
		});
		
		getLista();
	}
	
	$("#frmAddProductos").validate({
		debug: false,
		rules: {
			txtDescripcion: "required",
			txtCantidad: {
				required: true,
				digits: true,
				min: 1
			},
			txtPrecio: {
				required: true,
				number: true,
				min: 1
			}
		},
		errorElement : 'span',
		errorLabelContainer: '.errorTxt',
		submitHandler: function(form){
			var adicional = new Object;
			
			adicional.idLibro = $("#txtClave").attr("idLibro");
			
			var obj = new TVenta;
			obj.addMovimiento(
				"",
				$("#id").val(), 
				$("#txtClave").val(), 
				$("#txtDescripcion").val(),
				$("#txtCantidad").val(),
				$("#txtPrecio").val(),
				JSON.stringify(adicional),
				{
					before: function(){
						$("#frmAddProductos").prop("disabled", true);
					},
					after: function(datos){
						$("#frmAddProductos").prop("disabled", false);
						
						if (datos.band){
							getListaMovimientos();
							$("#frmAddProductos")[0].reset();
						}else{
							alert("Upps... " + datos.mensaje);
						}
					}
				}
			);
        }

    });
});