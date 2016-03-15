TGrupo = function(){
	var self = this;
	
	this.add = function(id, ciclo, grado, nombre, estado, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('index.php?mod=cgrupos&action=add', {
				"id": id,
				"nombre": nombre,
				"estado": estado,
				"ciclo": ciclo,
				"grado": grado
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('index.php?mod=cgrupos&action=del', {
			"id": id,
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar el grupo");
			}
		}, "json");
	};
};