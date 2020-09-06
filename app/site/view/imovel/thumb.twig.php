
{% extends 'partials/body.twig.php' %}


{% block title %}
Alterar thumb
{% endblock %}


{% block body %}

<div class="container">
	<div class="row"></div>
	<div class="content white z-depth-3	p-1">
		<div class="row">
			<div class="col s12">
				<h4>Alterar thumb</h4>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m6 hide-on-mobile-only">
				<img class="responsive-img" src="{{BASE}}/assets/img/cadastrar-usuario.jpg" alt="">
			</div>



			<div class="col m6">
				{% if thumb != null %}
				<img src="{{thumb}}" alt="imovel" class="responsive-img">
				{% else %}
				Nenhuma thumb cadastrada
				{% endif %}
			</div>


			<div class="col s12 m6 ">
				<form action="{{BASE}}imovel/updateThumb/{{idImovel}}" method="post" id="frmThumb" onsubmit="return validarThumb();" enctype="multipart/form-data">
					<div class="row">
						<div class="col s12 ">
							<div class="file-field input-field">
						<div class="btn">
							<span>File</span>
							<input type="file" id="flThumb" name="flThumb">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" placeholder="Sem arquivo selecionado">
						</div>
					</div>
						</div>
					</div>

					




					<div class="row">
						<div class="col s12">
							<div class="col s12 m6">
								<a href="{{BASE}}dashboard"  class="amber-text text-darken-2 waves-effect waves-light right">Voltar
									<i class="material-icons left">arrow_back</i>
								</a>
							</div>
							<div class="col s12 m6">

								<button type="submit" class="btn waves-effect waves-light right" type="submit" name="action">Alterar
									<i class="material-icons right">edit</i>
								</button>
							</div>
						</div>
					</div>


					<br>
					<div class="divAlert" id="divAlert">
						<div class="alert amber bg-amber">Selecione a Thumb...</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="row"></div>
</div>

{% endblock %}


{% block script %}
<script src="{{BASE}}assets/js/livro.min.js"></script>
{% endblock %}