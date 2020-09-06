
{% extends 'partials/body.twig.php' %}


{% block title %}
 Cadastrar usuário
{% endblock %}


{% block body %}


<div class="container">
	<div class="row"></div>
	<div class="content white z-depth-3 p-1">
		<div class="row">
			<div class="col s12 m6">
				<img class="responsive-img" src="{{BASE}}/assets/img/cadastrar-usuario.jpg" alt="">
			</div>
			<div class="col s12 m6">
				<form class="form-login white" action="{{BASE}}login/insert" method="post" id="frmCadastro" onsubmit="return validarCadastro();">
                    <div class="input-field col s12">
						<i class="material-icons prefix">mail</i> 
						<input  id="txtEmail" type="email" name="txtEmail"   class="validate" autofocus="true">
						<label for="txtEmail">E-mail</label>
					</div>

					<div class="input-field col s12">
						<i class="material-icons prefix">persona</i> 
						<input id="txtNome" type="text" name="txtNome"  class="validate">
						<label for="txtNome">Nome</label>
					</div>


					<div class="input-field col s12">
						<i class="material-icons prefix">locked</i> 
						<input id="txtSenha" type="password" name="txtSenha"  class="validate">
						<label for="txtSenha">Senha</label>
					</div>

					<div class="input-field col s12">
						<i class="material-icons prefix">error_outline</i> 
						<input id="txtSenhaConfirmar" type="password" name="txtSenhaConfirmar"  class="validate">
						<label for="txtSenhaConfirmar">Confirmar Senha</label>
					</div>


					<div class="box-btn">
						<button type="submit" class="btn waves-effect waves-light " name="action">Gravar
							<i class="material-icons right">save</i>
						</button>
					</div>
                     <br>
					<div class="divAlert" id="divAlert">
						<div class="alert amber darken-1 white-text">Preencha todos os campos...</div>
					</div>

				</form>
			</div>
		</div>
	</div>
	<div class="row"></div>
</div>




{% endblock %}


{% block script %}

<script src="{{BASE}}assets/js/src/usuario.js"></script>
{% endblock %}