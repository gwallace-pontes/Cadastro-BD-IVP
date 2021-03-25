//var InputCondo = ""
//var InputIds = "";
//----Pegar os dados dos prédios----
function capturar () {
    InputCondo = document.getElementById('InputCondo').value;
    InputIds = document.getElementById('InputIdsValue').value;
	document.getElementById('valorDigitadoCondos').innerHTML = InputCondo; 
    document.getElementById('valorDigitadoIds').innerHTML = InputIds;
}
$("#BlocosClone").attr("placeholder", "Insira o bloco do condominio" + $("#valorDigitadoIds").html());

//----Dupilicar os campos----
function duplicarCampos(){
	var clone = document.getElementById('origem').cloneNode(true);
	var destino = document.getElementById('destino');
	destino.appendChild (clone);
	
	var camposClonados = clone.getElementsByTagName('input');
	
	for(i=0; i<camposClonados.length;i++){
		camposClonados[i].value = '';
	}
	
	
	
}

function removerCampos(id){
	var node1 = document.getElementById('destino');
	node1.removeChild(node1.childNodes[0]);
}

