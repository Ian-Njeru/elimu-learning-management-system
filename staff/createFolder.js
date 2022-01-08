$(document).ready(function(){
	$("#cFolder").submit(function(e){
		$("#createFolder").attr("disabled", true);
		return true;
	});
});