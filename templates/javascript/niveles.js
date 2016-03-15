$(document).ready(function(){
	$(".consecutivo").change(function(){
		var el = $(this);
		
		if (el.val() == ''){
			alert("Este campo no puede quedar vacio");
			el.focus();
			el.val(el.attr("anterior"));
		}
	});
});