TTipoPrenda = function(){
	var self = this;
	
	this.add = function(id,	nombre, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('index.php?mod=cTipoPrendas&action=add', {
				"id": id,
				"nombre": nombre
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('index.php?mod=cTipoPrendas&action=del', {
			"id": id,
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar el tipo de prenda");
			}
		}, "json");
	};
};