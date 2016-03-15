TCuidado = function(){
	var self = this;
	
	this.add = function(id,	nombre, descripcion, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('index.php?mod=ccuidados&action=add', {
				"id": id,
				"nombre": nombre,
				"descripcion": descripcion
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('index.php?mod=ccuidados&action=del', {
			"id": id,
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar el tipo de cuidado");
			}
		}, "json");
	};
};