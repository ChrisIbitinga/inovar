'use strict'

function validarLogin() {
    var email = getValueById('txtEmail');

    if (!/.+@.+\..+/.test(email)) {
        getById('divAlert').innerHTML = '<div class="alert red darken-3 white-text">Informe o e-mail cadastrado.</div>';
        return false;
    }

    if (getValueById('txtSenha').trim().length < 7) {
        getById('divAlert').innerHTML = '<div class="alert red darken-3 white-text">Informe uma senha válida.</div>';
        return false;
    }

    return true;
}


function validarCadastro() {

   var email = getValueById('txtEmail').value;
   if (!/.+@.+\..+/.test(email)) {
    getById('divAlert').innerHTML = '<div class="alert red darken-3 white-text">Informe um e-mail válido.</div>';
    return false;
}

var nome = getValueById('txtNome').value;
if (nome.trim().length <= 5) {


    getById('divAlert').innerHTML = '<div class="alert red darken-3 white-text ">Informe um nome válido.</div>';
    return false;
}

if (
    (getValueById('txtSenha').value.trim().length < 7 || getValueById('txtSenhaConfirmar').value.trim().length < 7)
    ||
    (getValueById('txtSenha').value != getValueById('txtSenhaConfirmar').value)
    ) {
    getById('divAlert').innerHTML = '<div class="alert red darken-3 white-text">As senhas não correspondem ou são inválidas.</div>';
return false;
}

return true;
}




function validarEditar() {

    if (getValueById('txtNome').trim().length <= 5) {
        getById('divAlert').innerHTML = '<div class="alert red darken-3 white-text">Informe um nome válido.</div>';
        return false;
    }

    return true;
}

function validarSenha() {
    if (
        (getValueById('txtSenha').trim().length < 7 || getValueById('txtSenhaConfirmar').trim().length < 7)
        ||
        (getValueById('txtSenha') != getValueById('txtSenhaConfirmar'))
        ) {
        getById('divAlert').innerHTML = '<div class="alert red darken-3 white-text">As senhas não correspondem ou são inválidas.</div>';
    return false;
}

return true;
}

function validarEmail() {
    var email = getValueById('txtEmail');

    if (!/.+@.+\..+/.test(email)) {
        getById('divAlert').innerHTML = '<div class="alert red darken-3 white-text">Informe o e-mail cadastrado.</div>';
        return false;
    }

    return true;
}

function validarRedefinirSenhaExterno() {
    if (
        (getValueById('txtSenha').trim().length < 7 || getValueById('txtSenhaConfirmar').trim().length < 7)
        ||
        (getValueById('txtSenha') != getValueById('txtSenhaConfirmar'))
        ) {
        getById('divAlert').innerHTML = '<div class="alert red darken-3 white-text">As senhas não correspondem ou são inválidas.</div>';
    return false;
}

if (getValueById('txtToken').trim().length < 10) {
    getById('divAlert').innerHTML = '<div class="alert red darken-3 white-text">Token inválido.</div>';
    return false;
}

return true;
}