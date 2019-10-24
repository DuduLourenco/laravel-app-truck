function validarCPF(cpf) {
	cpf = cpf.replace(/[^\d]+/g, '');
	if (cpf == '') return false;
	// Elimina CPFs invalidos conhecidos	
	if (cpf.length != 11 ||
		cpf == "00000000000" ||
		cpf == "11111111111" ||
		cpf == "22222222222" ||
		cpf == "33333333333" ||
		cpf == "44444444444" ||
		cpf == "55555555555" ||
		cpf == "66666666666" ||
		cpf == "77777777777" ||
		cpf == "88888888888" ||
		cpf == "99999999999")
		return false;
	// Valida 1o digito	
	add = 0;
	for (i = 0; i < 9; i++)
		add += parseInt(cpf.charAt(i)) * (10 - i);
	rev = 11 - (add % 11);
	if (rev == 10 || rev == 11)
		rev = 0;
	if (rev != parseInt(cpf.charAt(9)))
		return false;
	// Valida 2o digito	
	add = 0;
	for (i = 0; i < 10; i++)
		add += parseInt(cpf.charAt(i)) * (11 - i);
	rev = 11 - (add % 11);
	if (rev == 10 || rev == 11)
		rev = 0;
	if (rev != parseInt(cpf.charAt(10)))
		return false;
	return true;
}

function validaData(dateString) {
	var regEx = /^\d{4}-\d{2}-\d{2}$/;
	if (!dateString.match(regEx)) return false;  // Invalid format
	var d = new Date(dateString);
	var dNum = d.getTime();
	if (!dNum && dNum !== 0) return false; // NaN value, Invalid date
	return d.toISOString().slice(0, 10) === dateString;
}

function mensagemAlerta($mensagem) {
	bootbox.alert({
		message: $mensagem,
		backdrop: true,
		size: 'small'
	});
}

function formataData(data, tipo) {
	switch (tipo) {
		default:
			var dia  = data.split("/")[0];
        	var mes  = data.split("/")[1];
			var ano  = data.split("/")[2];
			dataFormatada = ano + '-' + ("0"+mes).slice(-2) + '-' + ("0"+dia).slice(-2);
			break;
		case 2:
			var ano  = data.split("-")[0];
        	var mes  = data.split("-")[1];
			var dia  = data.split("-")[2];
			dataFormatada = ("0"+dia).slice(-2) + '/' + ("0"+mes).slice(-2) + '/' + ano;
			break;
	}
	return dataFormatada;
}

function arredonda(numero, casasDecimais) {
    casasDecimais = typeof casasDecimais !== 'undefined' ?  casasDecimais : 2;
    return + (Math.floor(numero + ('e+' + casasDecimais)) + ('e-' + casasDecimais));
}

