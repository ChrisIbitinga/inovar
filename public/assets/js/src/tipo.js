'use strict'

function validarTipo()
{
	var nome= getValueById('txtNome').value;
	var slug = getValueById('txtSlug').value;


    if (nome.trim().length < 5 ) {
        getById('divAlert').innerHTML = '<div class="alert red darken-3 white-text">Informe o nome do tipo corretamente.</div>';
        return false;
    }
    if (slug.trim().length < 5 ) {
        getById('divAlert').innerHTML = '<div class="alert red darken-3 white-text">Informe o slug do tipo corretamente.</div>';
        return false;
    }

    return true;
}