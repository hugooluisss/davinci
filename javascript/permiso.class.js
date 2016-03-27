TPermiso = function(){
	var self = this;
	
	this.add = function(id,	estudiante, fecha, dias, comentarios, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('index.php?mod=cpermisos&action=add', {
				"id": id,
				"estudiante": estudiante,
				"comentario": comentarios,
				"fecha": fecha,
				"dias": dias
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('index.php?mod=cpermisos&action=del', {
			"id": id,
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar el permiso");
			}
		}, "json");
	};
};