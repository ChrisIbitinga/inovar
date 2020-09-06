
{% extends 'partials/body.twig.php' %}


{% block title %}
Cadastrar Nova Finalidade
{% endblock %}


{% block body %}

<div class="container">
	<div class="row"></div>
	<div class="content white z-depth-3	p-1">
		<div class="row">
			<div class="col s12">
				<h4>Nova Finalidade</h4>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m6 hide-on-mobile-only">
				<img class="responsive-img" src="{{BASE}}/assets/img/cadastrar-usuario.jpg" alt="">
			</div>
			<div class="col s12 m6 ">
				<form class="form-login" action="{{BASE}}finalidade/insert" method="post" id="frmCadastro"
				 onsubmit="return validarCadastro(false);">
					<div class="input-field col s12">
						<i class="material-icons prefix">layers</i> 
						<input id="txtNome" type="text" name="txtNome" placeholder="Diária"  class="validate">
						<label for="txtNome">Nome</label>
					</div>
					<div class="input-field col s12">
						<i class="material-icons prefix">layers_clearv</i> 
						<input id="txtSlug" type="text" name="txtSlug" placeholder="diaria"  class="validate">
						<label for="txtSlug">Slug</label>
					</div>
					
						<div class="col s12">
							<div class="col s6">
								<a href="{{BASE}}finalidade/lista"  class="amber-text text-darken-2 waves-effect waves-light right">Voltar
									<i class="material-icons left">arrow_back</i>
								</a>
							</div>
							<div class="col s6">

								<button type="submit" class="btn waves-effect waves-light right"  name="action">Gravar
									<i class="material-icons right">save</i>
								</button>
							</div>
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

<script src="{{BASE}}assets/js/categoria.min.js"></script>
{% endblock %}