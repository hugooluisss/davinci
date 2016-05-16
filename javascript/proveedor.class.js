TProveedor = function(){
	var self = this;
	
	this.add = function(id,	nombre, telefono, email, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cproveedores', {
				"id": id,
				"nombre": nombre,
				"telefono": telefono,
				"email": email,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('cproveedores', {
			"id": id,
			"action": "del"
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar al proveedor");
			}
		}, "json");
	};
};