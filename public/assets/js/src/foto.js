'use strict'

function validarFoto()
{
	var nome = getValueById('flFoto').value;
	var imovel = getValueById('slImovel').value;


    if (nome.trim().length <= 0 ) {
        getById('divAlert').innerHTML = '<div class="alert red darken-3 white-text">Selecione uma imagem.</div>';
        return false;
    }
    if (imovel <= 0 || imovel == null ) {
        getById('divAlert').innerHTML = '<div class="alert red darken-3 white-text">Escolha o id do imóvel</div>';
        return false;
    }

    return true;
}