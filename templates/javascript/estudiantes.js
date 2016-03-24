$(document).ready(function(){
	listaResponsables();
	listaEstudiantes();
	
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
		$("#txtCURP").val($("#txtCURP").val().toUpperCase());
		
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
			txtDireccion: "required",
			txtNoInt: {
				required: true
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
			txtDireccion: "Escribe la dirección",
			txtNoInt: {
				required: "Es requerido"
			},
			txtCodigoPostal: "Solo se aceptan números",
			txtDelegacion: "Escribe la delegación o municipio donde viven",
			selSanguineo: "Selecciona un grupo sanguineo"
		},
		submitHandler: function(form){
			var obj = new TEstudiante;
			
			var cuidados = new Array();
			$(".cuidados:checked").each(function(){
				var cuidado = new Object();
				
				cuidado.id = $(this).val();
				cuidados.push(cuidado);
			});
			
			obj.guardar($("#frmAdd #id").val(), $("#frmAdd #selNivel").val(), $("#frmAdd #txtNombre").val(), $("#frmAdd #txtApp").val(), $("#frmAdd #txtApm").val(), $("#frmAdd #txtCURP").val(), $("#frmAdd #selSexo").val(), $("#frmAdd #txtNacimiento").val(), $("#frmAdd #selEstadoNacimiento").val(), $("#frmAdd #txtDireccion").val(), $("#frmAdd #txtNoExt").val(), $("#frmAdd #txtNoInt").val(), $("#frmAdd #txtColonia").val(), $("#frmAdd #txtCodigoPostal").val(), $("#frmAdd #txtDelegacion").val(), $("#frmAdd #txtEstatura").val(), $("#frmAdd #txtPeso").val(), $("#frmAdd #selIngreso").val(), $("#frmAdd #selSanguineo").val(), JSON.stringify(cuidados), {
				before: function(){
					$("#frmAdd input, #frmAdd select").prop("disabled", true);
				},
				after: function(result){
					$("#frmAdd input, #frmAdd select").prop("disabled", false);
					$("#txtMatricula").prop("disabled", true);
					
					if (result.band == true){
						alert("Estudiante Agregado");
						
						if ($("#frmAdd #txtMatricula").val() != result.matricula){
							$("#txtMatricula").val(result.matricula);
							alert("La matrícula asignada al estudiante fue la " + $("#txtMatricula").val());
						}
						
						obj.setResponsable(result.identificador, 1, $("#frmAdd #txtPapa").attr("identificador"), {
							after: function(resp){
								if (resp.band != true){
									alert("No se pudo establecer la relación con el papá");
								}
								
							}
						});
						
						obj.setResponsable(result.identificador, 2, $("#frmAdd #txtMama").attr("identificador"), {
							after: function(resp){
								if (resp.band != true){
									alert("No se pudo establecer la relación con la mamá");
								}
								
							}
						});
						
						obj.setResponsable(result.identificador, 3, $("#frmAdd #txtTutor").attr("identificador"), {
							after: function(resp){
								if (resp.band != true){
									alert("No se pudo establecer la relación con el tutor");
								}
								
							}
						});
								
						
						$("#frmAdd")[0].reset();
						$(".cuidados").prop("checked", false);
						$("#frmAdd #txtPapa").attr("identificador", "");
						$("#frmAdd #txtMama").attr("identificador", "");
						$("#frmAdd #txtTutor").attr("identificador", "");
					}else
						alert("Upps ocurrió un error: " + result.mensaje);
				}
			});
        }
    });

    $(".responsable").click(function(){
    	var el = $(this);
    	$("#winResponsables #tipoParentesco").val(el.attr('tipo'));
    	$("#winResponsables").modal();
    });
    
    $("#frmAddParentesco input[type=reset]").click(function(){
    	$("#winResponsables #id").val("");
    	$("#winResponsables").modal("hide");
    });
    
    $("#frmAddParentesco").validate({
		debug: true,
		rules: {
			selParentesco: "required",
			txtNombre: "required",
			txtApp: "required",
			txtTelefono: {
				number: true,
				phoneMX: true
			},
			txtTelefonoContacto: {
				number: true,
				phoneMX: true
			},
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
			txtTelefono: {
				number: "Solo se aceptan números",
				phoneMX: "El número telefónico no está correcto"
			},
			txtTelefonoContacto: {
				number: "Solo se aceptan números",
				phoneMX: "El número telefónico no está correcto"
			},
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
						listaResponsables();
						$('#tabResponsables a[href="#listaResponsables"]').tab('show');
						
						if ($("#frmAddParentesco #id").val() == '')
							if (confirm("¿Deseas establecer el parentesco con el estudiante?")){
								var nombre = $("#frmAddParentesco #txtNombre").val() + ' ' + $("#frmAddParentesco #txtApp").val() + ' ' + $("#frmAddParentesco #txtApm").val();
								var identificador = resp.identificador;
								setParentesco(identificador, nombre);
							}
							
						$("#frmAddParentesco")[0].reset();
					}else
						alert("Ocurrió un error al registrar al responsable");
				}
			});
        }
    });
    
    function listaResponsables(){
	    $.get("listaResponsablesEstudiante", function( data ) {
			$("#listaResponsables").html(data);
			
			$("[action=eliminarResponsable]").click(function(){
				var el = $(this);
				if(confirm("¿Seguro?")){
					var obj = new TResponsable;
					obj.del($(this).attr("responsable"), {
						before: function(){
							$(el).prop("disabled", true);
						},
						after: function(data){
							$(el).prop("disabled", false);
							if (data.band == false)
								alert("No se pudo eliminar al responsable");
							listaResponsables();
						}
					});
				}
			});
			
			$("[action=modificarResponsable]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#frmAddParentesco #id").val(el.idResponsable);
				$("#frmAddParentesco #txtNombre").val(el.nombre);
				$("#frmAddParentesco #txtApp").val(el.app);
				$("#frmAddParentesco #txtApm").val(el.apm);
				$("#frmAddParentesco #txtOcupacion").val(el.ocupacion);
				$("#frmAddParentesco #txtEmpresa").val(el.empresa);
				$("#frmAddParentesco #txtTelefono").val(el.telefono);
				$("#frmAddParentesco #txtExtension").val(el.extension);
				$("#frmAddParentesco #txtTelefonoContacto").val(el.telefonoContacto);
				$("#frmAddParentesco #txtCelular").val(el.celular);
				$("#frmAddParentesco #txtCorreo").val(el.correo);
				
				$('#tabResponsables a[href="#nuevoResponsable"]').tab('show');
			});
			
			$("[action=seleccionar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				var nombre = el.nombre + ' ' + el.app + ' ' + el.apm;
				var identificador = el.idResponsable;
				setParentesco(identificador, nombre);
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
    
    function setParentesco(identificador, nombre){
	    switch($("#winResponsables #tipoParentesco").val()){
			case '1':
				$("#frmAdd #txtPapa").val(nombre);
				$("#frmAdd #txtPapa").attr("identificador", identificador);
			break;
			case '2':
				$("#frmAdd #txtMama").val(nombre);
				$("#frmAdd #txtMama").attr("identificador", identificador);
			break;
			case '3':
				$("#frmAdd #txtTutor").val(nombre);
				$("#frmAdd #txtTutor").attr("identificador", identificador);
			break;
		}
		
		$("#winResponsables").modal("hide");
    }
    
    function listaEstudiantes(){
	    $.get("listaEstudiantes", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TEstudiante;
					obj.del($(this).attr("estudiante"), {
						after: function(data){
							listaEstudiantes();
						}
					});
				}
			});
			
			$("#dvInfo").hide();
			
			$("[action=modificar]").click(function(){
				var obj = new TEstudiante;
				var el = $(this);
				obj.getData(el.attr("estudiante"), {
					before: function(){
						$("#dvInfo").show(600);
					},
					after: function(el){
						$("#frmAdd #id").val(el.idEstudiante);
						$("#frmAdd #txtNombre").val(el.nombre);
						$("#frmAdd #txtApp").val(el.app);
						$("#frmAdd #txtApm").val(el.apm);
						$("#frmAdd #txtNombre").val(el.nombre);
						$("#frmAdd #txtMatricula").val(el.matricula);
						$("#frmAdd #selNivel").val(el.idNivel);
						$("#frmAdd #selIngreso").val(el.anio);
						$("#frmAdd #txtCURP").val(el.curp);
						$("#frmAdd #selSexo").val(el.sexo);
						$("#frmAdd #txtNacimiento").val(el.nacimiento);
						$("#frmAdd #selEstadoNacimiento").val(el.idEstadoNac);
						$("#frmAdd #txtEstatura").val(el.estatura);
						$("#frmAdd #txtPeso").val(el.peso);
						$("#frmAdd #selSanguineo").val(el.idSanguineo);
						
						$("#frmAdd #txtDireccion").val(el.calle);
						$("#frmAdd #txtNoInt").val(el.noInt);
						$("#frmAdd #txtNoExt").val(el.noExt);
						$("#frmAdd #txtCodigoPostal").val(el.codigoPostal);
						$("#frmAdd #txtDelegacion").val(el.delegacion);
						
						$("#frmAdd #txtPapa").val(el.responsables.papa.nombre);
						$("#frmAdd #txtMama").val(el.responsables.mama.nombre);
						$("#frmAdd #txtTutor").val(el.responsables.tutor.nombre);
						
						$("#frmAdd #txtPapa").attr("identificador", el.responsables.papa.idResponsable);
						$("#frmAdd #txtMama").attr("identificador", el.responsables.mama.idResponsable);
						$("#frmAdd #txtTutor").attr("identificador", el.responsables.tutor.idResponsable);
						
						$("#dvInfo").hide(600);
						
						$('#panelTabs a[href="#add"]').tab('show');
						el.cuidados.forEach(function(el){
							$(".cuidados[value=" + el.idCuidado + "]").prop("checked", true);
						});
						
					}
				});
			});
			
			$("[action=matricula]").click(function(){
				var el = $(this);
				
				var matricula = prompt("Matricula nueva", el.attr("matricula"));
				
				if (matricula == '')
					alert("Es necesario especificar una matrícula para hacer el cambio");
				else if(matricula == el.attr("matricula"))
					alert("No se realizará el cambio por que la nueva matrícula es la misma que la actual");
				else{
					var obj = new TEstudiante;
					
					obj.setMatricula(el.attr("estudiante"), matricula, {
						before: function(){
							
						},
						after: function(resp){
							if (resp.band == true)
								listaEstudiantes();
							else
								alert("Ocurrió un error al realizar el cambio de matrícula, verifique que no esté ocupada por otro estudiante");
						}
					});
				}
				
			});
			
			$("[action=fotografia]").click(function(){
				var el = $(this);
				$("#fotoEstudiante").val(el.attr("estudiante"));
				$("#winFotografia .elementos").empty();
				$("#winFotografia").modal();
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


$(document).ready(function(){
	$('#upload').fileupload({
		// This function is called when a file is added to the queue
		add: function (e, data) {
		    var tpl = $('<li class="working list-group-item">'+
			            '<input type="text" value="0" data-width="48" data-height="48" data-fgColor="#0788a5" data-readOnly="1" data-bgColor="#3e4043" />'+'<p></p><span></span></li>' );
			            
		     // Append the file name and file size
		    tpl.find('p').text("img_" + $("#fotoEstudiante").val() + ".JPG").append('<i>' + formatFileSize(data.files[0].size) + '</i>');
		
		     // Add the HTML to the UL element
			data.context = tpl.appendTo($('#upload .elementos'));
			
			// Initialize the knob plugin. This part can be ignored, if you are showing progress in some other way.
			tpl.find('input').knob();
			
			// Listen for clicks on the cancel icon
			tpl.find('span').click(function(){
				if(tpl.hasClass('working')){
					jqXHR.abort();
				}
				tpl.fadeOut(function(){
					tpl.remove();
				});
			});
		
			// Automatically upload the file once it is added to the queue
			var jqXHR = data.submit();
		},
		progress: function(e, data){
		    // Calculate the completion percentage of the upload
		    var progress = parseInt(data.loaded / data.total * 100, 10);
		
		    // Update the hidden input field and trigger a change
		    // so that the jQuery knob plugin knows to update the dial
		    data.context.find('input').val(progress).change();
		
		    if(progress == 100){
		        data.context.removeClass('working');
		        data.context.find('canvas').remove();
		        data.context.find('input').remove();
		        data.context.prepend($("<img />",{
		        	src: 'repositorio/estudiantes/img_' + $("#fotoEstudiante").val() + ".JPG"
		        }));
		        
		        alert("La imagen se subió con éxito, la página será recargada");
		        location.reload(true);
		    }
		},
		fail: function(){
			alert("Ocurrió un problema en el servidor, contacta al administrador del sistema");
			
			console.log("Error en el servidor al subir el archivo, checa permisos de la carpeta repositorio");
		}
	});
	
	//Helper function for calculation of progress
	function formatFileSize(bytes) {
		if (typeof bytes !== 'number') {
		    return '';
		}
		
		if (bytes >= 1000000000) {
		    return (bytes / 1000000000).toFixed(2) + ' GB';
		}
		
		if (bytes >= 1000000) {
		    return (bytes / 1000000).toFixed(2) + ' MB';
		}
		return (bytes / 1000).toFixed(2) + ' KB';
	}
});