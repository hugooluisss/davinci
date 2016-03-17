$(document).ready(function(){
	listaResponsables();
	$.each([$('#selSexo'), $('#selNivel'), $("#selIngreso")], function(index, obj) {
		obj.change(function(){
			var obj = new TEstudiante;
			
			obj.getMatricula($("#selNivel").val(), $("#selIngreso").val(), $("#selSexo").val(), {
				after: function(data){
					if (data.band == true)
						$("#txtMatricula").val(data.matricula);
					else
						$("#txtMatricula").val("");
				}
			});
		});
	});

	$("[data-mask]").inputmask();
	
	$("#txtCURP").change(function(){
		var curp = $("#txtCURP").val();
		var dia = curp[8] + curp[9];
		var mes = curp[6] + curp[7];
		var anio = curp[4] + curp[5];
		
		anio = (anio > 70?"19":"20") + anio;
		
		$("#txtNacimiento").val(anio + "/" + mes + "/" + dia);
		
		var sexo = curp[10];
		$("#selSexo").val(sexo.toUpperCase());
		
		var estado = curp[11] + curp[12];
		var estado = estado.toUpperCase();
		$("#selEstadoNacimiento option").each(function() {
			if ($(this).attr("curp") == estado)
				$(this).prop("selected", true);
		});
		
		var obj = new TEstudiante;
			
		obj.getMatricula($("#selNivel").val(), $("#selIngreso").val(), $("#selSexo").val(), {
			after: function(data){
				if (data.band == true)
					$("#txtMatricula").val(data.matricula);
				else
					$("#txtMatricula").val("");
			}
		});
	});
	
	$("#frmAdd").validate({
		debug: true,
		rules: {
			txtCURP: {
				required: true,
				pattern: /^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$/
			},
			txtNombre: "required",
			txtApp: "required",
			txtNacimiento: {
				required: true,
				date: true
			},
			selEstadoNacimiento: "required",
			txtEstatura:{
				required: true,
				number: true
			},
			txtPeso:{
				required: true,
				number: true
			},
			txtDireccion: "required",
			txtNoInt: {
				required: true,
				digits: true
			},
			txtNoExt: {
				digits: true
			},
			txtCodigoPostal: {
				digits: true
			},
			txtDelegacion: "required",
			selSanguineo: "required"
			
		},
		messages: {
			txtCURP: {
				required: "Es necesaria la CURP",
				pattern: "Esta no es una CURP válida"
			},
			txtNombre: "Es necesario este campo",
			txtApp: "Es necesario este campo",
			txtNacimiento:{
				required: "Escribe la fecha de nacimiento",
				date: "Esta fecha no es válida"
			},
			selEstadoNacimiento: "Selecciona un estado de la lista",
			txtEstatura:{
				required: "Indica la estatura",
				number: "Solo se aceptan números"
			},
			txtPeso:{
				required: "Indica el peso",
				number: "Solo se aceptan números"
			},
			txtDireccion: "Escribe la dirección",
			txtNoInt: {
				required: "Es requerido",
				digits: "Solo se aceptan números"
			},
			txtNoExt: {
				digits: "Solo se aceptan números"
			},
			txtCodigoPostal: "Solo se aceptan números",
			txtDelegacion: "Escribe la delegación o municipio donde viven",
			selSanguineo: "Selecciona un grupo sanguineo"
		},
		submitHandler: function(form){
			var obj = new TEstudiante;
			
			obj.guardar($("#frmAdd #id").val(), $("#frmAdd #selNivel").val(), $("#frmAdd #txtNombre").val(), $("#frmAdd #txtApp").val(), $("#frmAdd #txtApm").val(), $("#frmAdd #txtCURP").val(), $("#frmAdd #selSexo").val(), $("#frmAdd #txtNacimiento").val(), $("#frmAdd #selEstadoNacimiento").val(), $("#frmAdd #txtDireccion").val(), $("#frmAdd #txtNoExt").val(), $("#frmAdd #txtNoInt").val(), $("#frmAdd #txtColonia").val(), $("#frmAdd #txtCodigoPostal").val(), $("#frmAdd #txtDelegacion").val(), $("#frmAdd #txtEstatura").val(), $("#frmAdd #txtPeso").val(), $("#frmAdd #selIngreso").val(), $("#frmAdd #selSanguineo").val(), {
				before: function(){
					$("#frmAdd input, #frmAdd select").prop("disabled", true);
				},
				after: function(result){
					$("#frmAdd input, #frmAdd select").prop("disabled", false);
					$("#txtMatricula").prop("disabled", true);
					
					if (result.band == true){
						alert("Estudiante Agregado");
						
						if (result.matricula != '' || result.matricula != undefined)
							if (result.matricula != $("#txtMatricula").val()){
								alert("La matrícula asignada al estudiante fue la " + $("#txtMatricula").val())
								$("#txtMatricula").val(result.matricula);
							}
								
						
						$("#frmAdd").reset();
					}else
						alert("Upps ocurrió un error: " + result.mensaje);
				}
			});
        }
    });

    $("#btnResponsables").click(function(){
    	if ($("#frmAdd #id").val() == ''){
    		alert("Es necesario primero registrar al estudiante");
    		$("#txtCURP").focus();
    	}else
	    	$("#winResponsables").modal();
    });
    
    $("#frmAddParentesco input[type=reset]").click(function(){
    	$("#winResponsables").modal("hide");
    });
    
    $("#frmAddParentesco").validate({
		debug: true,
		rules: {
			selParentesco: "required",
			txtNombre: "required",
			txtApp: "required",
			txtCelular: {
				required: true,
				number: true,
				phoneMX: true
			},
			txtEmail: {
				email: true
			}
		},
		messages: {
			selEstadoNacimiento: "Selecciona el parentesco con el estudiante",
			txtNombre: "Es necesario este campo",
			txtApp: "Es necesario este campo",
			txtCelular: {
				required: "Es necesario este campo",
				number: "Solo acepta números",
				phoneMX: "El número telefónico no está correcto"
			},
			txtEmail:{
				email: "El correo no es correcto"
			}
		},
		submitHandler: function(form){
			var obj = new TResponsable;
			
			obj.add($("#frmAddParentesco #id").val(), $("#frmAddParentesco #selParentesco").val(), $("#frmAddParentesco #txtNombre").val(), $("#frmAddParentesco #txtApp").val(), $("#frmAddParentesco #txtApm").val(), $("#frmAddParentesco #txtOcupacion").val(), $("#frmAddParentesco #txtEmpresa").val(), $("#frmAddParentesco #txtTelefono").val(), $("#frmAddParentesco #txtTelefonoContacto").val(), $("#frmAddParentesco #txtExtension").val(), $("#frmAddParentesco #txtCelular").val(), $("#frmAddParentesco #txtCorreo").val(), {
				before: function(){
					$("#frmAddParentesco input, #frmAddParentesco select").prop("disabled", true);
				},
				after: function(resp){
					$("#frmAddParentesco input, #frmAddParentesco select").prop("disabled", false);
					
					if (resp.band == true){
						$('#tabResponsables a[href="#listaResponsables"]').tab('show');
					}else
						alert("Ocurrió un error al registrar al responsable");
				}
			});
        }
    });
    
    function listaResponsables(){
	    $.get("listaResponsablesEstudiante", function( data ) {
			$("#listaResponsables").html(data);
			
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
			
			$("#tblResponsables").DataTable({
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