TLibro = function(){
	var self = this;
	
	this.add = function(id,	editorial, clave, nombre, preciolista, precioventa, existencias, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('clibros', {
				"action": "add",
				"id": id,
				"editorial": editorial,
				"nombre": nombre,
				"clave": clave,
				"precioLista": preciolista,
				"previoVenta": precioventa,
				"existencias": existencias
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('clibros', {
			"action": "del",
			"id": id,
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar el libro");
			}
		}, "json");
	};
};