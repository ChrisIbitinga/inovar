

{% extends 'partials/body.twig.php' %}

{% block title %} 
{{livro.titulo}}
{% endblock %}


{% block body %}

<div class="container">
	<div class="row"></div>
	<div class="content white z-depth-3">
		<div class="row"></div>
		<div class="row">

			<div class="col s12 m6 p-1">
				
				<div class="row">


					<div class=" owl-carousel">
						{% for listaFotos in listaFoto %}
						<div class=" ">
							
							<div class="col s12 ">
								
								<img src="{{BASE}}public/resources/thumb/{{listaFotos.nome_foto}}" alt="Cidade de botucatu Imobiliaria Inovar Imoveis">
								
							</div>
							
						</div>
						{% endfor %}
					</div>
					

					<div class="">
						<div class="row p-1">
							<div class="col s12 ">

								<button class="btn waves-effect waves-light customNextBtn amber darken-2" type="submit" name="action">Proximo
									<i class="material-icons left">fast_rewind</i>
								</button>
								<button class="btn waves-effect waves-light customPrevBtn  amber darken-2" type="submit" name="action">Anterior
									<i class="material-icons right">fast_forward</i>
								</button>
							</div>
						</div>
						<div class="row p-1">
							<div class="col s12">
								<p class="bold ">
									Se tiver interesse neste imóvel, clique no botão para abrir o Whatsapp e falar com o corretor.
								</p>
								{% for listaImoveis in listaImovel %}
								<a href="https://api.whatsapp.com/send?1=pt_BR&phone=5514996058467&text=Ola%20quero%20informações%20sobre%20o%20imovel%20ref:%20{{listaImoveis.id}}%20no%20bairro%20{{listaImoveis.bairro}}" class="btn btn-large teal" target="_black">Falar com o Corretor</a>
								{% endfor %}
							</div>
						</div>
					</div>

				</div>
			</div>


			{% for listaImoveis in listaImovel %}

			

			<div class="col s12 m6">


				<ul class="collection with-header">
					<li class="collection-header">
						<h4>{{listaImoveis.nome_tipo}} -  {{listaImoveis.finalidade_nome}} 
						</h4>
					</li>

					<li class="collection-item">
						<div><span class="bold blue-grey-text text-darken-3 bold">Ref: {{listaImoveis.id}}</span>
							<a href="#!" class="secondary-content"><i class="material-icons blue-grey darken-2 white-text">attach_money</i>
							</a>
						</div>
					</li>

					<h6 class="bold"></h6>

					<li class="collection-item">
						<div>Valor: R$ <span class="bold amber-text text-darken-3">{{listaImoveis.valor}}</span>
							<a href="#!" class="secondary-content"><i class="material-icons blue-grey darken-2 white-text">attach_money</i>
							</a>
						</div>
					</li>
					<li class="collection-item">
						<div>Cidade: {{listaImoveis.nome_cidade}}
							<a href="#!" class="secondary-content"><i class="material-icons blue-grey darken-2 white-text">map</i>
							</a>
						</div>
					</li>
					<li class="collection-item">
						<div> {{listaImoveis.bairro}}
							<a href="#!" class="secondary-content"><i class="material-icons blue-grey darken-2 white-text">location_on</i>
							</a>
						</div>
					</li>
					<li class="collection-item">
						<div>Sala(s): {{listaImoveis.sala}}
							<a href="#!" class="secondary-content"><i class="material-icons blue-grey darken-2 white-text">weekend</i>
							</a>
						</div>
					</li>
					<li class="collection-item">
						<div>Quarto(s): {{listaImoveis.quarto}}
							<a href="#!" class="secondary-content"><i class="material-icons blue-grey darken-2 white-text">hotel</i>
							</a>
						</div>
					</li>
					<li class="collection-item">
						<div>Banheiro(s): {{listaImoveis.banheiro}}
							<a href="#!" class="secondary-content"><i class="material-icons blue-grey darken-2 white-text">airline_seat_legroom_normal</i>
							</a>
						</div>
					</li>
					<li class="collection-item">
						<div>Vaga(s) na garagem: {{listaImoveis.garagem}}
							<a href="#!" class="secondary-content"><i class="material-icons blue-grey darken-2 white-text">directions_car</i>
							</a>
						</div>
					</li>
					<hr>
					<h6>Mais</h6>
					<li class="collection-item">
						<div>
							<blockquote>
								{{listaImoveis.adicionais | raw }}
							</blockquote>
							
						</div>
					</li>

				</ul>
			</div>
		</div>
	</div>
</div>

{% endfor %}


{% endblock %}

{% block script %}
<script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{BASE}}assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js" charset="utf-8"></script>
	<script>
	CKEDITOR.replace('txtAdicionais');

	</script>
{% endblock %}
