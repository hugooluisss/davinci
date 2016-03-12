TEstudiante = function(){
	var self = this;
	
	this.getMatricula = function(nivel, ingreso, genero, fn){
		if (fn.before !== undefined)
			fn.before(data);
			
		$.post('index.php?mod=cestudiantes&action=calcularMatricula', {
				"ingreso": ingreso,
				"genero": genero,
				"nivel": nivel
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	}
}