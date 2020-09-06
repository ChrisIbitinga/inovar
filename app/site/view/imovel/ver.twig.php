

{% extends 'partials/body.twig.php' %}

{% block title %} 
{{livro.titulo}}
{% endblock %}


{% block body %}

<div class="container"> <div class="row"></div>
<div class="content white z-depth-3">
	<div class="row"></div>

	<div class="row">
		<div class="col s12 m6">
			{% if imovel.thumb != null%}
			<img class="responsive-img hoverable" src="{{HOST}}/resources/thumb/{{imovel.thumb}}" alt="{{imovel.slug}}"  title="{{imovel.slug}}">
			{% else %}
			<img class="responsive-img" src="{{HOST}}/resources/imagens/no-available.png" alt="{{imovel.slug}}" title="{{imovel.slug}}">
			{% endif %}
		</div>
		{{imovel.endereco}}
		
		<p>
			{{imovel.dataCadastro}}
		</p>
		<p>
			{{imovel.slug}}
		</p>
		<p>
		  {{imovel.categoria.nomeCategoria}}
		</p>




	</div>


















</div>
</div>


{% endblock %}

{% block script %}
<script src="{{BASE}}assets/js/jquery.min.js"></script>
<script src="{{BASE}}assets/js/comentario.min.js"></script>
{% endblock %}
