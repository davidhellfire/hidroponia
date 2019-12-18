$(function(){
	var senha = $('#senha').val();
	var senha2 = $('#senha2').val();
	if(senha===senha2){
		console.log('senha', senha);
	}else alert('senhas nao coincidem ');
	
	/*$('#senha2').on("focusout", function(e){
		if(senha!=null && senha2 !=null){
			if(senha!=senha2){
				console.log('senhas nao coincidem ');
			}
		}
	});*/
});

