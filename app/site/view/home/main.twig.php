

{% extends 'partials/body.twig.php' %}

{% block title %} 
Home
{% endblock %}


{% block body %}
{% set tipo = "" %}
{% set finalidade = "" %}
{% set categoria = "" %}


<div class="hero">

	<div class="row">
		<div class="call-to-action-hero">
			<div class="container">
				<div class="row">
					<div class="col s12 center">
						<p><i class="material-icons white-text">home</i></p>
						<h2 class="text-upper white-text font-700">Inovar imóveis Botucatu</h2>
						<p class="white-text">Realizando seus sonhos </p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="container">

			<div class="bar-search ">
				<div class="col s12">
					<form action="{{BASE}}imovel/pesquisar/" method="get" >

							<!-- <div class="col s12 m3 input-field center">
								<select>
									<option value="" disabled selected>Ex: Botucatu</option>
									<option  value="1">Botucatu</option>
								</select>
							</div> -->

							<div class="col s12 m3 input-field center ">

								<!-- SELECT TIPO -->

								<select id="slTipo" name="slTipo">

									{% for listaTipos in listaTipo %}
									<option  value="{{listaTipos.id}}">{{listaTipos.nome}}</option>	
									
									{% endfor %}
								</select>

							</div>

							<!-- SELECT FINALIDADE -->
							<div class="col s12 m3 input-field center ">

								<!-- SELECT FINALIDADE -->

								<select id="slFinalidade" name="slFinalidade">
									
									{% for listaFinalidades in listaFinalidade %}
									<option  value="{{listaFinalidades.id}}">{{listaFinalidades.nome}}</option>	

									{% endfor %}
								</select>

							</div>

							<!-- SELECT FINALIDADE -->
							<div class="col s12 m3 input-field center ">

								<!-- SELECT CATEGORIA -->

								<select id="slCategoria" name="slCategoria">
									
									{% for listaCategorias in listaCategoria %}
									<option  value="{{listaCategorias.id}}">{{listaCategorias.nome}}</option>	

									{% endfor %}
								</select>

							</div>

							<div class="col s12 m3 input-field center ">
								<button type="submit"  class="btn btn-large blue-grey darken-2">Pesquisar</button>
							</div>
						</form>	
					</div>

				</div>	<!--bar-search-->

			</div><!--CONTAINER-->

		</div><!-- ROW-->

	</div><!--end hero-->


	<!-- SECTION WELCOME -->


	<section class="p-t-2">
		<div class="container p-t-2">
			<div class="row p-t-2">
				<div class="col s12 m6">
					<img src="{{BASE}}assets/img/hero.jpg" alt="" class="responsive-img">
				</div>
				<div class="col s12 m6">

					<blockquote>
						Bem vindo (a).



					</blockquote>
					<h1 class="title">Inovar Imóveis Botucatu</h1>

					<p>
						A inovar imóveis Botucattu já a anos com experiência no ramo imobiliário, lança seu site 
						para lhes ajudar a realizar o sonho da casa própia. <br>
						Contando com corretor especializado no mercado regional, oferecemos um trabalho de 
						qualidade e com todo respeito que você merece. <br>
						As melhores oportuniades de imóveis estarão em nosso site, pesquise, escolha e entre em contato com nosso corretor na mesma hora. 
					</p>
					<button class="btn btn-large blue-grey darken-4">Saber mais</button>
				</p>
			</div>
		</div>
	</div>
</section>

<!-- section Highlighted  -->

<section class=" grey lighten-3">

	<div class="container p-t-2">
		<div class="row">
			<div class="col s12 center">
				<h3 class="title">Destaques Inovar</h3>
			</div>
		</div>
		<div class="row">


			{% for listaImoveis in listaImovel %}


			<div class="col s12 m4">
				<div class="card hoverable">
					<div class="card-image waves-effect waves-block waves-light ">
						{% if listaImoveis != null%}

						<img class="responsive-img hoverable" src="{{HOST}}/resources/thumb/{{listaImoveis.thumb}}" alt="{{listaImoveis.thumb}}"  title="{{listaImoveis.slug}}">
						{% else %}
						<img class="responsive-img" src="{{HOST}}/resources/imagens/no-available.png" alt="{{listaImoveis.slug}}" title="{{listaImoveis.slug}}">
						{% endif %}
					</div>
					<div class="card-content">
						<span class="card-title activator blue-grey-text text-darken-4">{{listaImoveis.finalidade_nome}}<i class="material-icons right ">search
						</i></span>
						<p>
						</p>
						<p class="grey-text text-darken-2">{{listaImoveis.nome_tipo}}</p>
						<!-- <p class="grey-text text-darken-2">{{listaImoveis.bairro}}</p> -->
						<p class="grey-text text-darken-2">{{listaImoveis.valor}}</p>
						<hr>
						<i class="material-icons amber-text text-darken-2">star</i>
						<i class="material-icons amber-text text-darken-2">star</i>
						<i class="material-icons amber-text text-darken-2">star</i>
						<i class="material-icons amber-text text-darken-2">star</i>
						<i class="material-icons amber-text text-darken-2">star</i>
						<br>

						<p><a class="btn btn-block blue-grey darken-2" href="{{BASE}}imovel/ver/{{listaImoveis.slug}}/{{listaImoveis.id}}">Ver detalhes</a></p>
					</div>
					<div class="card-reveal">
						<span class="card-title grey-text text-darken-4">{{item.valor}}<i class="material-icons right">close</i></span>
						<p>
							{{listaImoveis.bairro}}
						</p>
						<div class="box-card-info">
							<i class="material-icons">hotel</i> - {{listaImoveis.quarto}} Quarto(s)
						</div>
						<div class="box-card-info">
							<i class="material-icons">hot_tub</i> - {{listaImoveis.banheiro}} banheiro(s)
						</div>
						<div class="box-card-info">
							<i class="material-icons">time_to_leave
							</i> - {{listaImoveis.garagem}} vaga(s)
						</div>
					</div>
				</div>
			</div>


			{% endfor %}


			<div class="row">
				<div class="col s12 center p-t-1">
					<br>
					<a href="{{BASE}}imovel/mostrarTodos" class="btn btn-large amber darken-2">Ver todos</a>
				</div>
			</div>
		</div>
	</div>


</section>


<div class="parallax-container">
	<div class="parallax"><img src="{{BASE}}assets/img/botucatu.jpg" alt="Cidade de botucatu Imobiliaria Inovar Imoveis"></div>
</div>

<!-- SECTION INDICAÇÂO -->


<section>
	<div class="row p-t-1">
		<div class="col s12 center">
			<h3 class="title">Oportunidades</h3>
		</div>
	</div>


	<div class="row">

		<div class="container owl-carousel">
			{% for listaImoveis in listaImovel %}
			<div class="col s12 ">
				<div class="col s12 m6 l6">
					<img src="{{BASE}}public/resources/thumb/{{listaImoveis.thumb}}" alt="{{listaImoveis.endereco}}">
				</div>
				<div class="col s12 m12 l6">
					<blockquote>
						Fique de olho.
					</blockquote>
					<h4>Indicação do corretor</h4>
					<p>{{listaImoveis.bairro}}</p>
					<p>{{listaImoveis.valor}}</p>
					<div class="row">
						<div class="col s12 m4">
							<i class="material-icons">hotel</i> <br> <span> {{listaImoveis.quarto}} Quarto(s)</span>
						</div>
						<div class="col s12 m4">
							<i class="material-icons">hot_tub</i> <br> <span> {{listaImoveis.banheiro}} Banheiro(s)</span>
						</div>
						<div class="col s12 m4">
							<i class="material-icons">time_to_leave</i> <br> <span> {{listaImoveis.garagem}} Vaga(s)</span>
						</div>
					</div>
					<div class="row">
						<i class="material-icons amber-text text-darken-2">star</i>
						<i class="material-icons amber-text text-darken-2">star</i>
						<i class="material-icons amber-text text-darken-2">star</i>
						<i class="material-icons amber-text text-darken-2">star</i>
						<i class="material-icons amber-text text-darken-2">star</i>
						<br>
					</div>
					<hr>
					<br>
					<p class=""><a class="btn btn-block blue-grey darken-2" href="{{BASE}}imovel/ver/{{listaImoveis.slug}}/{{listaImoveis.id}}">Ver detalhes</a></p>
				</div>
			</div>
			
			{% endfor %}
		</div>
		
	</div>



	<div class="container">
		<div class="row">
			<div class="col s12">

				<button class="btn waves-effect waves-light customNextBtn amber darken-2" type="submit" name="action">Proximo
					<i class="material-icons left">fast_rewind</i>
				</button>
				<button class="btn waves-effect waves-light customPrevBtn  amber darken-2" type="submit" name="action">Anterior
					<i class="material-icons right">fast_forward</i>
				</button>
			</div>
		</div>
	</div>

</section>

<!-- SECTION ULTIMAS -->


<section class=" grey lighten-3 p-t-2"><br>
	<div class="container">
		<div class="row p-t-1">
			<div class="col s12 center">
				<h3 class="title">Últimas adicionadas</h3>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m6">

				

				{% for ultimosImoveis in ultimoImovel %}


				<div class="lista-new z-depth-2">
					<div class="lista-img">
						{% if ultimosImoveis != null%}

						<img class="responsive-img hoverable" src="{{HOST}}/resources/thumb/{{ultimosImoveis.thumb}}" alt="{{ultimosImoveis.thumb}}"  title="{{ultimosImoveis.slug}}">
						{% else %}
						<img class="responsive-img" src="{{HOST}}/resources/imagens/no-available.png" alt="{{ultimosImoveis.slug}}" title="{{ultimosImoveis.slug}}">
						{% endif %}
					</div>
					<div class="lista-content">
						<span class="bold"> {{ ultimosImoveis.nome_tipo}}</span>
						<span class="bold"> {{ ultimosImoveis.data_cadastro | date(DATE_TIME)}}</span>
						<span class= "blue-grey-text text-darken-4 bold">{{ ultimosImoveis.valor}}</span>
						<span >{{ ultimosImoveis.bairro }}</span>
					</div>	
					<div class="lista-action">
						<a class="amber-text text-darken-2" href="{{BASE}}imovel/ver/{{ultimosImoveis.slug}}/{{ultimosImoveis.id}}"><i class="material-icons">send</i></a>	
					</div>
				</div>
				{% endfor %}


			</div>
			<div class="col s12 m6 hoverable">

				<img src="{{BASE}}public/assets/img/casa-ultimos.jpeg" alt="" class="responsive-img">
				<ul class="collapsible">
					<li>
						<div class="collapsible-header"><i class="material-icons">account_box</i>Corretor</div>
						<div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
					</li>
					<li>
						<div class="collapsible-header"><i class="material-icons">mail</i>E-mail</div>
						<div class="collapsible-body"><span class="">contato@inovarimoveisbotucatu.com </span></div>
					</li>
					<li>
						<div class="collapsible-header"><i class="material-icons">phone</i>Telefone</div>
						<div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
					</li>
					
				</ul>


			</div>
		</div>
	</div>
</section>








{% endblock %}
