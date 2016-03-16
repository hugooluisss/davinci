$(document).ready(function(){
	$(".consecutivo").change(function(){
		var el = $(this);
		
		if (el.val() == ''){
			alert("Este campo no puede quedar vacio");
			el.focus();
			el.val(el.attr("anterior"));
		}else if (isNaN(el.val())){
			alert("Solo números entéros");
			el.focus();
			el.val(el.attr("anterior"));
		}else{
			var obj = new TNivel();
			obj.update(el.attr("idNivel"), el.val(), {
				before: function(){
					el.prop("disabled", true);
				},
				after: function(resp){
					el.prop("disabled", false);
					
					if (resp.band == false){
						alert("Upps... el servidor no pudo actualizar el valor del consecutivo");
						el.val(el.attr("anterior"));
					}else{
						el.attr("anterior", el.val());
					}
				}
			});
		}
	});
});