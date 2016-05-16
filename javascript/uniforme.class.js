TUniforme = function(){
	var self = this;
	
	this.add = function(id,	proveedor, tipo, clave, nombre, lista, venta, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cuniformes', {
				"id": id,
				"proveedor": proveedor,
				"tipo": tipo,
				"clave": clave,
				"nombre": nombre,
				"precioLista": lista,
				"precioVenta": venta,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('cuniformes', {
			"id": id,
			"action": "del"
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar el uniforme");
			}
		}, "json");
	};
};