TNivel = function(){
	var self = this;
	
	this.update = function(id,	consecutivo, fn){
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