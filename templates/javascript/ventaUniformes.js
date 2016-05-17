$(document).ready(function(){
	//getLista();
	$("#frmAdd #txtFecha").datepicker( "option", "dateFormat", "yyyy-mm-dd" );
	
	$('.nav a[href="#add"]').click(function(){
		$("#frmAdd")[0].reset();
		$("#frmAddProductos")[0].reset();
		$("#frmAdd #id").val("");
		//showDetalle();
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
});