TAsignatura = function(){
	var self = this;
	
	this.add = function(id,	plan, grado, clave, nombre, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('casignaturas', {
				"action": "add",
				"id": id,
				"plan": plan,
				"grado": grado,
				"nombre": nombre,
				"clave": clave
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('casignaturas', {
			"action": "del",
			"id": id,
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar la asignatura");
			}
		}, "json");
	};
};