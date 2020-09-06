

{% extends 'partials/body.twig.php' %}

{% block title %} 
Login
{% endblock %}


{% block body %}


	<div class="container">
		<div class="row"></div>
		<div class="row block">
			<div class="col s12 m6 ">
				<img src="{{BASE}}public/assets/img/login.jpg" class="responsive-img"></img>
			</div><!-- end col img-->

			<div class="col s12 m6">
				<form class="form-login white" action="{{BASE}}login/auth" method="post" id="frmLogin" onsubmit="return validarLogin();">

					<div class="input-field col s12">
						<i class="material-icons prefix">mail</i> 
						<input id="txtEmail" type="email" name="txtEmail"  class="validate" autofocus="true">
						<label for="txtEmail">E-mail</label>
					</div>

					<div class="input-field col s12">
						<i class="material-icons prefix">locked</i> 
						<input id="txtSenha" type="password" name="txtSenha"  class="validate">
						<label for="txtSenha">Senha</label>
					</div>

					<div class="box-btn">
						<button type="submit" class="btn waves-effect waves-light " type="submit" name="action">Logar
							<i class="material-icons right">fingerprint</i>
						</button>
					</div>

					<div class="login-links">
						<a class="indigo-text bold p-1" href="{{BASE}}login/cadastrar">Ainda não é cadastrado ?</a>
					</div>

					<div class="divAlert" id="divAlert">
						<div class="alert amber darken-2 white-text">Preencha todos os campos...</div>
					</div>
				</form>
			</div><!-- end col form-->
		</div><!-- end block-->

	</div><!-- end container-->








{% endblock %}
