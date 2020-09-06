
{% extends 'partials/body.twig.php' %}

{% block title %} 
Listar categorias
{% endblock %}


{% block body %}
<div class="container">
	<div class="content">
		<div class="row"></div>
		
		<div class="row">
			<h4>Lista de Categorias</h4>
		</div>
		<div class="row">
			<div class="col s12">
				<a href="{{BASE}}finalidade/nova" class="btn  waves-effect waves-light amber darken-2">Nova 
					<i class="material-icons right">add</i>
				</a>
				<a href="{{BASE}}dashboard" class="btn  waves-effect waves-light teal">Painel 
					<i class="material-icons right">home</i>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<ul class="collection">
					{% for finalidade in finalidades %}
					
					<li class="collection-item avatar">
						<i class="material-icons circle teal darken-2">collections_bookmark</i>
						<span class="title"><span class="teal-text text-darken-3 bold-text">Categoria:</span> {{finalidade.nome}}</span>
						<p><span class="teal-text text-darken-3 bold-text">Slug:</span>
						<a href="{{BASE}}finalidade/ver/{{finalidade.slug}}">{{finalidade.slug}}</a> 
						</p>
						<a href="{{BASE}}finalidade/editar/{{finalidade.id}}" class="secondary-content"><i class="material-icons">edit</i></a>
					</li>
					{% endfor %}
				</ul>
			</div>
			<div class="col  s12 p-t-1">
				<a href="{{BASE}}finalidade/lista"  class="amber-text text-darken-2 waves-effect waves-light right">Voltar
					<i class="material-icons left">arrow_back</i>
				</a>
			</div>	
		</div>
	</div>
</div>

{% endblock %}






