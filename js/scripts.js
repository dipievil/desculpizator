function hideAll(){
	if($("#txt_desculpa").is(':visible'))
	$("#txt_culpado").hide();
	$("#txt_acao").hide();
	$("#txt_vitima").hide();
	$("#txt_desculpa").hide();		
}

function showNext(divToShow){
	$("#"+divToShow).show();
}
		
 $(function() {

});	  