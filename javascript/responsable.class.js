TResponsable = function(){
	var self = this;
	
	this.add = function(id, parentesco, nombre, app, apm, ocupacion, empresa, telefono, telefonoContacto, extension, celular, email, puesto, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('index.php?mod=cresponsables&action=add', {
				"id": id,
				"parentesco": parentesco,
				"nombre": nombre,
				"app": app,
				"apm": apm,
				"ocupacion": ocupacion,
				"empresa": empresa,
				"telefono": telefono,
				"extension": extension,
				"telefonoContacto": telefonoContacto,
				"celular": celular,
				"correo": email,
				"puesto": puesto
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('index.php?mod=cresponsables&action=del', {
			"id": id,
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar al responsable de la lista");
			}
		}, "json");
	};
};