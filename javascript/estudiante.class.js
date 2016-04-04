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
	
	this.setMatricula = function(estudiante, matricula, fn){
		if (fn.before !== undefined)
			fn.before();
			
		$.post('index.php?mod=cestudiantes&action=changeMatricula', {
				"estudiante": estudiante,
				"matricula": matricula
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	}
	
	this.guardar = function(id, nivel, nombre, app, apm, curp, sexo, nacimiento, estadoNac, calle, noExt, noInt, colonia, codigoPostal, delegacion, estatura, peso, anio, sanguineo, cuidados, fn){
		if (fn.before !== undefined)
			fn.before();
			
		$.post('index.php?mod=cestudiantes&action=add', {
				"id": id,
				"nivel": nivel, 
				"nombre": nombre, 
				"app": app, 
				"apm": apm, 
				"curp": curp, 
				"sexo": sexo, 
				"nacimiento": nacimiento, 
				"estadoNac": estadoNac, 
				"calle": calle, 
				"noExt": noExt, 
				"noInt": noInt, 
				"colonia": colonia, 
				"codigoPostal": codigoPostal, 
				"delegacion": delegacion, 
				"estatura": estatura, 
				"peso": peso, 
				"anio": anio,
				"sanguineo": sanguineo,
				"cuidados": cuidados
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	}
	
	this.setResponsable = function(estudiante, parentesco, responsable, fn){
		if (fn.before !== undefined)
			fn.before(data);
			
		$.post('index.php?mod=cestudiantes&action=setParentesco', {
				"parentesco": parentesco,
				"responsable": responsable,
				"estudiante": estudiante
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	}
	
	this.del = function(id, fn){
		$.post('index.php?mod=cestudiantes&action=del', {
			"id": id
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar al estudiante");
			}
		}, "json");
	};
	
	this.getData = function(id, fn){
		if (fn.before !== undefined)
			fn.before();
			
		$.post('index.php?mod=cestudiantes&action=getData', {
				"estudiante": id
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	}
	
	this.inscribe = function(id, grupo, fn){
		if (fn.before !== undefined)
			fn.before();
			
		$.post('index.php?mod=cinscripciones&action=inscribir', {
				"estudiante": id,
				"grupo": grupo
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	}
	
	this.quitarInscripcion = function(inscripcion, fn){
		if (fn.before !== undefined)
			fn.before();
			
		$.post('index.php?mod=cinscripciones&action=delInscribir', {
				"inscripcion": inscripcion
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	}
	
	this.setFolioInscripcion = function(inscripcion, folio, fn){
		if (fn.before !== undefined)
			fn.before();
			
		$.post('index.php?mod=cinscripciones&action=setFolio', {
				"inscripcion": inscripcion,
				"folio": folio
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	}
	
	this.generarFichaTecnica = function(estudiante, fn){
		if (fn.before != undefined) fn.before();
		
		$.get('?mod=cestudiantes&action=fichaPDF&id=' + estudiante, function(data){
			if (fn.after != undefined) fn.after(data);
			
			if (data.band == false)
				console.log("Ocurrió un error al generar la ficha técnica del estudiante");
			
		}, "json");
	}
	
	this.addAsistencia = function(inscripcion, fecha, fn){
		if (fn.before != undefined) fn.before();
		
		$.post('?mod=casistencias&action=add', {
			"inscripcion": inscripcion,
			"fecha": fecha
		}, function(data){
			if (fn.after != undefined) fn.after(data);
			
			if (data.band == false)
				console.log("Ocurrió un error al registrar la asistencia");
			
		}, "json");
	}
	
	this.dropAsistencia = function(inscripcion, fecha, fn){
		if (fn.before != undefined) fn.before();
		
		$.post('?mod=casistencias&action=del', {
			"inscripcion": inscripcion,
			"fecha": fecha
		}, function(data){
			if (fn.after != undefined) fn.after(data);
			
			if (data.band == false)
				console.log("Ocurrió un error al eliminar la asistencia");
			
		}, "json");
	}
}