TCiclo = function(){
	var self = this;
	
	this.add = function(id,	consecutivo, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('index.php?mod=cniveles&action=update', {
				"id": id,
				"consecutivo": consecutivo
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
};