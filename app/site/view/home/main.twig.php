

{% extends 'partials/body.twig.php' %}

{% block title %} 
Home
{% endblock %}


{% block body %}

<div class="hero">



	<div class="row">
		<div class="call-to-action-hero">
			<div class="container">
				<div class="row">
					<div class="col s12 center">
						<p><i class="material-icons white-text">home</i></p>
						<h2 class="text-upper white-text font-700">Inovar imóveis Botucatu</h2>
						<p class="white-text">Realizando seus sonhos</p>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="container">
			<div class="bar-search ">
				<form class="f-1" id="frmPesquisa" name="frmPesquisa"  action="">

							<!-- <div class="col s12 m3 input-field center">
								<select>
									<option value="" disabled selected>Ex: Botucatu</option>
									<option  value="1">Botucatu</option>
								</select>
							</div> -->
							
							<div class="col s12 m3 input-field center">
								<select id="slTipo" name="slTipo">
									<option value="" disabled selected>Ex: Casa</option>
									{% for tipo in tipos %}
									<option  value="{{tipo.id}}">{{tipo.nome}}</option>
									{% endfor %}
								</select>
							</div>


							<div class="col s12 m3 input-field center">
								<select id="slFinalidade" name="slFinalidade">
									<option value="" disabled selected>Ex: A venda</option>
									{% for finalidade in finalidades %}
									<option  value="{{finalidade.id}}">{{finalidade.nome}}</option>
									{% endfor %}
								</select>
							</div>

							<div class="col s12 m3 input-field center">
								<select id="slCategoria" name="slCategoria">
									<option value="" disabled selected>Ex: Comercial</option>
									{% for categoria in categorias %}
									<option  value="{{categoria.id}}">{{categoria.nome}}</option>
									{% endfor %}
								</select>
							</div>

							<div class="col s12 m3 input-field center">
								<button type="submite" class="btn btn-large blue-grey darken-2">Pesquisar</button>
							</div>
						</form>
					</div>	
				</div>
			</div>
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


				

				{% for imovel in imoveis %}
				{%for item in imovel %}

				<div class="col s12 m4">
					<div class="card hoverable">
						<div class="card-image waves-effect waves-block waves-light ">
							{% if item.thumb != null%}

							<img class="responsive-img hoverable" src="{{HOST}}/resources/thumb/{{item.thumb}}" alt="{{item.slug}}"  title="{{item.slug}}">
							{% else %}
							<img class="responsive-img" src="{{HOST}}/resources/imagens/no-available.png" alt="{{item.slug}}" title="{{item.slug}}">
							{% endif %}
						</div>
						<div class="card-content">
							<span class="card-title activator blue-grey-text text-darken-4">{{item.slug}}<i class="material-icons right ">search
							</i></span>
							<p class="grey-text text-darken-2">{{imovel.valor}}</p>
							<hr>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<br>

							<p><a class="btn btn-block blue-grey darken-2" href="#">Ver detalhes</a></p>
						</div>
						<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">{{item.valor}}<i class="material-icons right">close</i></span>
							<p>Nações unidas 442</p>
							<div class="box-card-info">
								<i class="material-icons">hotel</i> - 4 Quarto(s)
							</div>
							<div class="box-card-info">
								<i class="material-icons">hot_tub</i> - 2 suite(s)
							</div>
							<div class="box-card-info">
								<i class="material-icons">time_to_leave
								</i> - 2 vaga(s)
							</div>
						</div>
					</div>
				</div>

				{% endfor %}
				{% endfor %}



				<!-- <div class="col s12 m4">
					<div class="card hoverable">
						<div class="card-image waves-effect waves-block waves-light ">
							<img src="assets/img/casa2.png" alt="" class="activator responsive-img">
						</div>
						<div class="card-content">
							<span class="card-title activator blue-grey-text text-darken-4">Venda<i class="material-icons right">search
							</i></span>
							<p class="grey-text text-darken-2">R$ 280.000,00</p>
							<hr>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<br>

							<p><a class="btn btn-block blue-grey darken-2" href="#">Ver detalhes</a></p>
						</div>
						<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">Jd Das Orquideas<i class="material-icons right">close</i></span>
							<p>Nações unidas 442</p>
							<div class="box-card-info">
								<i class="material-icons">hotel</i> - 4 Quarto(s)
							</div>
							<div class="box-card-info">
								<i class="material-icons">hot_tub</i> - 2 suite(s)
							</div>
							<div class="box-card-info">
								<i class="material-icons">time_to_leave
								</i> - 2 vaga(s)
							</div>
						</div>
					</div>
				</div>



				<div class="col s12 m4">
					<div class="card hoverable">
						<div class="card-image waves-effect waves-block waves-light ">
							<img src="assets/img/casa3.png" alt="" class="activator responsive-img">
						</div>
						<div class="card-content">
							<span class="card-title activator blue-grey-text text-darken-4">Venda<i class="material-icons right">search
							</i></span>
							<p class="grey-text text-darken-2">R$ 250.000,00</p>
							<hr>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<br>

							<p><a class="btn btn-block blue-grey darken-2" href="#">Ver detalhes</a></p>
						</div>
						<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">Jd Das Orquideas<i class="material-icons right">close</i></span>
							<p>Nações unidas 442</p>
							<div class="box-card-info">
								<i class="material-icons">hotel</i> - 4 Quarto(s)
							</div>
							<div class="box-card-info">
								<i class="material-icons">hot_tub</i> - 2 suite(s)
							</div>
							<div class="box-card-info">
								<i class="material-icons">time_to_leave
								</i> - 2 vaga(s)
							</div>
						</div>
					</div>
				</div>


				<div class="col s12 m4">
					<div class="card hoverable">
						<div class="card-image waves-effect waves-block waves-light ">
							<img src="assets/img/casa4.png" alt="" class="activator responsive-img">
						</div>
						<div class="card-content">
							<span class="card-title activator blue-grey-text text-darken-4">Locação<i class="material-icons right">search
							</i></span>
							<p class="grey-text text-darken-2">R$ 1.800,00</p>
							<hr>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<br>

							<p><a class="btn btn-block blue-grey darken-2" href="#">Ver detalhes</a></p>
						</div>
						<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">Jd Das Orquideas<i class="material-icons right">close</i></span>
							<p>Nações unidas 442</p>
							<div class="box-card-info">
								<i class="material-icons">hotel</i> - 4 Quarto(s)
							</div>
							<div class="box-card-info">
								<i class="material-icons">hot_tub</i> - 2 suite(s)
							</div>
							<div class="box-card-info">
								<i class="material-icons">time_to_leave
								</i> - 2 vaga(s)
							</div>
						</div>
					</div>
				</div>

				<div class="col s12 m4">
					<div class="card hoverable">
						<div class="card-image waves-effect waves-block waves-light ">
							<img src="assets/img/casa5.png" alt="" class="activator responsive-img">
						</div>
						<div class="card-content">
							<span class="card-title activator blue-grey-text text-darken-4">Venda<i class="material-icons right">search
							</i></span>
							<p class="grey-text text-darken-2">R$ 280.000,00</p>
							<hr>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<br>

							<p><a class="btn btn-block blue-grey darken-2" href="#">Ver detalhes</a></p>
						</div>
						<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">Jd Das Orquideas<i class="material-icons right">close</i></span>
							<p>Nações unidas 442</p>
							<div class="box-card-info">
								<i class="material-icons">hotel</i> - 4 Quarto(s)
							</div>
							<div class="box-card-info">
								<i class="material-icons">hot_tub</i> - 2 suite(s)
							</div>
							<div class="box-card-info">
								<i class="material-icons">time_to_leave
								</i> - 2 vaga(s)
							</div>
						</div>
					</div>
				</div>



				<div class="col s12 m4">
					<div class="card hoverable">
						<div class="card-image waves-effect waves-block waves-light ">
							<img src="assets/img/casa1.png" alt="" class="activator responsive-img">
						</div>
						<div class="card-content">
							<span class="card-title activator blue-grey-text text-darken-4">Venda<i class="material-icons right">search
							</i></span>
							<p class="grey-text text-darken-2">R$ 250.000,00</p>
							<hr>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<i class="material-icons amber-text text-darken-2">star</i>
							<br>

							<p><a class="btn btn-block blue-grey darken-2" href="#">Ver detalhes</a></p>
						</div>
						<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">Jd Das Orquideas<i class="material-icons right">close</i></span>
							<p>Nações unidas 442</p>
							<div class="box-card-info">
								<i class="material-icons">hotel</i> - 4 Quarto(s)
							</div>
							<div class="box-card-info">
								<i class="material-icons">hot_tub</i> - 2 suite(s)
							</div>
							<div class="box-card-info">
								<i class="material-icons">time_to_leave
								</i> - 2 vaga(s)
							</div>
						</div>
					</div>
				</div>
			-->




			<div class="row">
				<div class="col s12 center p-t-1">
					<br>
					<button class="btn btn-large amber darken-2">Ver todos</button>
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
			<div class=" ">
				<div class="col s12 m6">
					<img src="{{BASE}}assets/img/botucatu.jpg" alt="Cidade de botucatu Imobiliaria Inovar Imoveis">
				</div>
				<div class="col s12 m6">
					<blockquote>
						Fique de olho.
					</blockquote>
					<h4>Indicação do corretor</h4>
					<p>
						<span>Jd Do Bosque II</span>
						<p>
							Rua Presidente Vargas 455
						</p>
						<p>
							<h6>R$ 190.000,00</h6>
						</p>
						<span class="box-icons">
							<span class="box">
								<i class="material-icons">hotel</i> <span> 4 Quarto(s)</span>
							</span>
							<span class="box">
								<i class="material-icons">hot_tub</i> <span> 3 Banheiro(s)</span>
							</span>
							<span class="box">
								<i class="material-icons">time_to_leave</i> <span> 3 Vaga(s)</span>
							</span>
						</span>
					</p>
					<p>
						<button class="btn btn-large blue-grey darken-4">Saber mais</button>
					</p>
				</div>
			</div>

			<div class=" ">
				<div class="col s12 m6">
					<img src="assets/img/casa4.png" class="responsive-img" alt="">
				</div>
				<div class="col s12 m6">
					<blockquote>
						Fique de olho.
					</blockquote>
					<h4>Indicação do corretor</h4>
					<p>
						<span>Jd Do Bosque II</span>
						<p>
							Rua Presidente Vargas 455
						</p>
						<p>
							<h6>R$ 190.000,00</h6>
						</p>
						<span class="box-icons">
							<span class="box">
								<i class="material-icons">hotel</i> <span> 4 Quarto(s)</span>
							</span>
							<span class="box">
								<i class="material-icons">hot_tub</i> <span> 3 Banheiro(s)</span>
							</span>
							<span class="box">
								<i class="material-icons">time_to_leave</i> <span> 3 Vaga(s)</span>
							</span>
						</span>
					</p>
					<p>
						<button class="btn btn-large blue-grey darken-4">Saber mais</button>
					</p>
				</div>
			</div>

			<div class=" ">
				<div class="col s12 m6">
					<img src="assets/img/casa5.png" class="responsive-img" alt="">
				</div>
				<div class="col s12 m6">
					<blockquote>
						Fique de olho.
					</blockquote>
					<h4>Indicação do corretor</h4>
					<p>
						<span>Jd Do Bosque II</span>
						<p>
							Rua Presidente Vargas 455
						</p>
						<p>
							<h6>R$ 190.000,00</h6>
						</p>
						<span class="box-icons">
							<span class="box">
								<i class="material-icons">hotel</i> <span> 4 Quarto(s)</span>
							</span>
							<span class="box">
								<i class="material-icons">hot_tub</i> <span> 3 Banheiro(s)</span>
							</span>
							<span class="box">
								<i class="material-icons">time_to_leave</i> <span> 3 Vaga(s)</span>
							</span>
						</span>
					</p>
					<p>
						<button class="btn btn-large blue-grey darken-4">Saber mais</button>
					</p>
				</div>
			</div>
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

<section>
	<div class="container">
		<div class="row">
			s
		</div>
		<div class="row">
			<div class="col s12 m6 center">

			</div>
			<div class="col s12 m6 center">

			</div>
		</div>
	</div>
</section>


<section class=" grey lighten-3 p-t-2"><br>
	<div class="container">
		<div class="row">
			<div class="col s12 m6">

				<div class="lista-new z-depth-2">
					<div class="lista-img">
						<img src="assets/img/casa2.png" alt="" class="activator responsive-img">
					</div>
					<div class="lista-content">
						<span class="bold"> 10/08/2020 </span>
						<span class= "blue-grey-text text-darken-4 bold">Venda  250.000,00</span>
						<span >Jd. Santa Helena</span>
					</div>	
					<div class="lista-action">
						<a class="amber-text text-darken-2" href=""><i class="material-icons">send</i></a>	
					</div>
				</div>

				<div class="lista-new z-depth-2">
					<div class="lista-img">
						<img src="assets/img/casa4.png" alt="" class="activator responsive-img">
					</div>
					<div class="lista-content">
						<span class="bold"> 10/08/2020 </span>
						<span class= "blue-grey-text text-darken-4 bold">Venda  250.000,00</span>
						<span >Jd. Santa Helena</span>
					</div>	
					<div class="lista-action">
						<a class="amber-text text-darken-2" href=""><i class="material-icons">send</i></a>	
					</div>
				</div>

				<div class="lista-new z-depth-2">
					<div class="lista-img">
						<img src="assets/img/casa3.png" alt="" class="activator responsive-img">
					</div>
					<div class="lista-content">
						<span class="bold"> 10/08/2020 </span>
						<span class= "blue-grey-text text-darken-4 bold">Venda  250.000,00</span>
						<span >Jd. Santa Helena</span>
					</div>	
					<div class="lista-action">
						<a class="amber-text text-darken-2" href=""><i class="material-icons">send</i></a>
					</div>
				</div>

				<div class="lista-new z-depth-2">
					<div class="lista-img">
						<img src="assets/img/casa4.png" alt="" class="activator responsive-img">
					</div>
					<div class="lista-content">
						<span class="bold"> 10/08/2020 </span>
						<span class= "blue-grey-text text-darken-4 bold">Venda  250.000,00</span>
						<span >Jd. Santa Helena</span>
					</div>	
					<div class="lista-action">
						<a class="amber-text text-darken-2" href=""><i class="material-icons">send</i></a>
					</div>
				</div>

				<div class="lista-new z-depth-2">
					<div class="lista-img">
						<img src="assets/img/casa1.png" alt="" class="activator responsive-img">
					</div>
					<div class="lista-content">
						<span class="bold"> 10/08/2020 </span>
						<span class= "blue-grey-text text-darken-4 bold">Venda  250.000,00</span>
						<span >Jd. Santa Helena</span>
					</div>	
					<div class="lista-action">
						<a class="amber-text text-darken-2" href=""><i class="material-icons">send</i></a>
					</div>
				</div>

				<div class="lista-new z-depth-2">
					<div class="lista-img">
						<img src="assets/img/casa3.png" alt="" class="activator responsive-img">
					</div>
					<div class="lista-content">
						<span class="bold"> 10/08/2020 </span>
						<span class= "blue-grey-text text-darken-4 bold">Venda  250.000,00</span>
						<span >Jd. Santa Helena</span>
					</div>	
					<div class="lista-action">
						<a class="amber-text text-darken-2" href=""><i class="material-icons">send</i></a>
					</div>
				</div>


			</div>
			<div class="col s12 m6">

				<div class="card">
					<div class="card-image">
						<img src="assets/img/casa4.png" alt="" class="activator responsive-img">
						<span class="card-title">Card Title</span>
					</div>
					<div class="card-content">
						<p>I am a very simple card. I am good at containing small bits of information.
						I am convenient because I require little markup to use effectively.</p>
					</div>
					<div class="card-action">
						<a href="#">This is a link</a>
					</div>
				</div>


			</div>
		</div>
	</div>
</section>








{% endblock %}
