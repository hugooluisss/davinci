TEditorial = function(){
	var self = this;
	
	this.add = function(id,	nombre, comentarios, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('ceditoriales', {
				"id": id,
				"nombre": nombre,
				"comentarios": comentarios,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('ceditoriales', {
			"id": id,
			"action": "del"
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar la editorial");
			}
		}, "json");
	};
};