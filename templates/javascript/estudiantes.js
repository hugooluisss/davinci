$(document).ready(function(){
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
			txtDelegacion: "required"
			
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
			txtDelegacion: "Escribe la delegación o municipio donde viven"
		},
		submitHandler: function(form){
			alert("POk");
        }
    });

});