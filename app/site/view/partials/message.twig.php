
{% extends 'partials/body.twig.php' %}


{% block title %}
{{title}}
{% endblock %}


{% block body %}

<div class="container ">
	<div class="row"></div>
	<div class="content white z-depth-3 p-1 block">





		<div class="row">
			<div class="col s12">
				<h3>{{title}}</h3>

				<h5>{{message}}</h5>

				<h6>Código de resposta: {{httpcode}}</h6>
			</div>
		</div>
		<div class="row">
			<div class="col  s12 p-t-1">
				<a href="javascript:history.back()" class="btn btn-large  waves-effect waves-light">Voltar
					<i class="material-icons right">arrow_back</i>
				</a>
			</div>	

		</div>
		
	</div>
	<div class="row"></div>
</div>

{% endblock %}




{% block script %}

<script src="{{BASE}}assets/js/usuario.min.js"></script>
{% endblock %}