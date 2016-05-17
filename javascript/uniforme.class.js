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
		if (fn.before !== undefined) fn.before();
		
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
	
	this.setExistencias = function(uniforme, talla, cantidad, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cuniformes', {
			"uniforme": uniforme,
			"talla": talla,
			"cantidad": cantidad,
			"action": "setExistencias"
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				console.log("Ocurrió un error al actualizar las existencias de la talla");
			}
		}, "json");
	}
};