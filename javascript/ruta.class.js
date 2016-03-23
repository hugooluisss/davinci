TRuta = function(){
	var self = this;
	
	this.add = function(id,	ciclo, nombre, descripcion, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('index.php?mod=crutas&action=add', {
				"id": id,
				"nombre": nombre,
				"descripcion": descripcion,
				"ciclo": ciclo
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		if (fn.before != undefined)
			fn.before();
				
		$.post('index.php?mod=crutas&action=del', {
			"id": id,
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar la ruta");
			}
		}, "json");
	};
	
	this.addEstudiante = function(id, estudiante, fn){
		if (fn.before != undefined)
			fn.before();
			
		$.post('index.php?mod=crutas&action=addEstudiante', {
			"id": id,
			"estudiante": estudiante
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al agregar al estudiante");
			}
		}, "json");
	}
	
	this.delEstudiante = function(id, estudiante, fn){
		if (fn.before != undefined)
			fn.before();
			
		$.post('index.php?mod=crutas&action=delEstudiante', {
			"id": id,
			"estudiante": estudiante
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al borrar al estudiante");
			}
		}, "json");
	}
};