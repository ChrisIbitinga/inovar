'use strict'

function validarCategoria()
{
	var nome= getValueById('txtNome').value;
	var slug = getValueById('txtSlug').value;


    if (nome.trim().length < 5 ) {
        getById('divAlert').innerHTML = '<div class="alert red darken-3 white-text">Informe o nome da categoria corretamente.</div>';
        return false;
    }
    if (slug.trim().length < 5 ) {
        getById('divAlert').innerHTML = '<div class="alert red darken-3 white-text">Informe o slug da categoria corretamente.</div>';
        return false;
    }

    return true;
}