

{% extends 'partials/body.twig.php' %}

{% block title %} 
Pesquisa
{% endblock %}


{% block body %}

<div class="container">
	<div class="row"></div>
	<div class="content white z-depth-3">
		<div class="row"></div>

		<div class="row">
			<div class="col s12">
				<h3 class="title"> Resultados</h3>
			</div>
			<div class="underline"></div>
		</div>
		<div class="row">

			

			{% for pesqIimoveis in pesqIimovel %}

			{% if pesqIimoveis != null %}


			<div class="col s12 m4">
				<div class="card hoverable">
					<div class="card-image waves-effect waves-block waves-light ">
						{% if pesqIimoveis != null%}
						<img class="responsive-img hoverable" src="{{HOST}}/resources/thumb/{{pesqIimoveis.thumb}}" alt="{{pesqIimoveis.thumb}}"  title="{{pesqIimoveis.slug}}">
						{% else %}
						<img class="responsive-img" src="{{HOST}}/resources/imagens/no-available.png" alt="{{pesqIimoveis.slug}}" title="{{pesqIimoveis.slug}}">
						{% endif %}
					</div>
					<div class="card-content">
						<span class="card-title activator blue-grey-text text-darken-4">{{pesqIimoveis.finalidade_nome}}<i class="material-icons right ">search
						</i></span>
						<p>
						</p>
						<p class="grey-text text-darken-2">{{pesqIimoveis.nome_tipo}}</p>
						<!-- <p class="grey-text text-darken-2">{{listaImoveis.bairro}}</p> -->
						<p class="grey-text text-darken-2">{{pesqIimoveis.valor}}</p>
						<hr>
						<i class="material-icons amber-text text-darken-2">star</i>
						<i class="material-icons amber-text text-darken-2">star</i>
						<i class="material-icons amber-text text-darken-2">star</i>
						<i class="material-icons amber-text text-darken-2">star</i>
						<i class="material-icons amber-text text-darken-2">star</i>
						<br>

						<p><a class="btn btn-block blue-grey darken-2" href="{{BASE}}imovel/ver/{{pesqIimoveis.slug}}/{{pesqIimoveis.id}}">Ver detalhes</a></p>
					</div>
					<div class="card-reveal">
						<span class="card-title grey-text text-darken-4">{{pesqIimoveis.valor}}<i class="material-icons right">close</i></span>
						<p>
							{{pesqIimoveis.bairro}}
						</p>
						<div class="box-card-info">
							<i class="material-icons">hotel</i> - {{pesqIimoveis.quarto}} Quarto(s)
						</div>
						<div class="box-card-info">
							<i class="material-icons">hot_tub</i> - {{pesqIimoveis.banheiro}} banheiro(s)
						</div>
						<div class="box-card-info">
							<i class="material-icons">time_to_leave
							</i> - {{pesqIimoveis.garagem}} vaga(s)
						</div>
					</div>
					
				</div>

			</div>
			{% else %}
			<div class="row content white z-depth-3">
				<div class="col s12 m6">
					<div class="card red darken-1">
						<div class="card-content white-text">
							<span class="card-title">Ops!</span>
							<p>Não encontramos um  resultado com essas descrições, tente novamente com outras caracteristicas</p>
						</div>
						<div class="card-action">
							<a href="{{BASE}}">Voltar</a>
						</div>
					</div>
				</div>
			</div>
			{% endif %}


			{% endfor %}

		</div>
	</div><!-- fecha content white-->
</div> <!--fecha containeer-->




{% endblock %}

{% block script %}
<script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{BASE}}assets/js/owl.carousel.min.js"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace('txtAdicionais');
</script>
<script src="{{BASE}}assets/js/src/initi-materialize.js"></script>
{% endblock %}
