function validaCns(cns){
	if (cns.trim().length != 15){
		return(false);
	}

	let soma;
	let resto, dv;
	let pis = '';
	let resultado = '';
	pis = cns.substring(0,11);

	soma = ((parseInt(pis.substring(0,1))) * 15) +
	((parseInt(pis.substring(1,2))) * 14) +
	((parseInt(pis.substring(2,3))) * 13) +
	((parseInt(pis.substring(3,4))) * 12) +
	((parseInt(pis.substring(4,5))) * 11) +
	((parseInt(pis.substring(5,6))) * 10) +
	((parseInt(pis.substring(6,7))) * 9) +
	((parseInt(pis.substring(7,8))) * 8) +
	((parseInt(pis.substring(8,9))) * 7) +
	((parseInt(pis.substring(9,10))) * 6) +
	((parseInt(pis.substring(10,11))) * 5);

	resto = soma % 11;
	dv = 11 - resto;

	if (dv == 11){
		dv = 0;
	}

	if (dv == 10){
		soma = ((parseInt(pis.substring(0,1))) * 15) +
		((parseInt(pis.substring(1,2))) * 14) +
		((parseInt(pis.substring(2,3))) * 13) +
		((parseInt(pis.substring(3,4))) * 12) +
		((parseInt(pis.substring(4,5))) * 11) +
		((parseInt(pis.substring(5,6))) * 10) +
		((parseInt(pis.substring(6,7))) * 9) +
		((parseInt(pis.substring(7,8))) * 8) +
		((parseInt(pis.substring(8,9))) * 7) +
		((parseInt(pis.substring(9,10))) * 6) +
		((parseInt(pis.substring(10,11))) * 5) + 2;

		resto = soma % 11;
		dv = 11 - resto;
		resultado = pis + "001" + String.valueOf(parseInt(dv));
	}
	else{
		resultado = pis + "000" + String.valueOf(parseInt(dv));
	}

	if (!cns == resultado){
		return(false);
	}
	else{
		return(true);
	}
}

function validaCnsProv(cns){
	if (cns.trim().length != 15){
		return(false);
	}

	let dv;
	let resto,soma;

	soma = ((parseInt(cns.substring(0,1))) * 15) +
	((parseInt(cns.substring(1,2))) * 14) +
	((parseInt(cns.substring(2,3))) * 13) +
	((parseInt(cns.substring(3,4))) * 12) +
	((parseInt(cns.substring(4,5))) * 11) +
	((parseInt(cns.substring(5,6))) * 10) +
	((parseInt(cns.substring(6,7))) * 9) +
	((parseInt(cns.substring(7,8))) * 8) +
	((parseInt(cns.substring(8,9))) * 7) +
	((parseInt(cns.substring(9,10))) * 6) +
	((parseInt(cns.substring(10,11))) * 5) +
	((parseInt(cns.substring(11,12))) * 4) +
	((parseInt(cns.substring(12,13))) * 3) +
	((parseInt(cns.substring(13,14))) * 2) +
	((parseInt(cns.substring(14,15))) * 1);

	resto = soma % 11;

	if (resto != 0){
		return(false);
	}
	else{
		return(true);
	}
}
