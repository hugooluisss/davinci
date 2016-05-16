TTalla = function(){
	var self = this;
	
	this.add = function(id,	tipo, nombre, adicional, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('ctallas', {
				"id": id,
				"tipo": tipo,
				"nombre": nombre,
				"adicional": adicional,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('ctallas', {
			"id": id,
			"action": "del"
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar la talla");
			}
		}, "json");
	};
};