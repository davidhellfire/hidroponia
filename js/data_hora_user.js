/*now = new Date;//objeto para data
var mes = 1+now.getMonth()//soma 1 ao mês pois JS trata de zero a 11 (janeiro ate dezembro)
document.write ('<h3 align="center"><strong>Dia: '+now.getDate()+'/'+mes+'/'+now.getFullYear()+' '+now.getHours()+':'+ now.getMinutes()+':'+now.getSeconds()+' - Usuário: User</strong></h3>');*/
	
	// Função para formatar 1 em 01
	const zeroFill = n => {
		return ('0' + n).slice(-2);
	}

			// Cria intervalo
			const interval = setInterval(() => {
				// Pega o horário atual
				const now = new Date();

				// Formata a data conforme dd/mm/aaaa hh:ii:ss
				const dataHora = zeroFill(now.getUTCDate()) + '/' + zeroFill((now.getMonth() + 1)) + '/' + now.getFullYear() + ' ' + zeroFill(now.getHours()) + ':' + zeroFill(now.getMinutes()) + ':' + zeroFill(now.getSeconds());

				// Exibe na tela usando a div#data-hora
				document.getElementById('data-hora').innerHTML = dataHora;
			}, 1000);