

{% extends 'partials/body.twig.php' %}

{% block title %} 
Home
{% endblock %}


{% block body %}


<div class="container">

	<div class="row"></div>

	<div class="content white z-depth-3 block p-1">

		<div class="row">
			<div class="col s12">
				<h2 class="title">Dashboard</h2>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<ul id="slide-out" class="sidenav">
					<li><div class="user-view">
						<div class="background blue-grey darken-3">
							<!-- <img src="{{BASE}}public/assets/img/bg-side.jpg" class="responsive-img"></img> -->
						</div>
						<a href="#user">
							<img class="circle" src="{{BASE}}assets/img/logo-branco.png" alt=" Logo Inovar  Imóveis Botucatu">
						</a>

						<a href="#name"><span class="white-text bold">{{userName}}</span></a>
						<br>
					</div></li>
					<li><a class="bold" href="{{BASE}}finalidade/nova"><i class="material-icons right">monetization_on</i>Adicionar Finalidade</a></li>
					<li><a class="bold" href="{{BASE}}categoria/nova"><i class="material-icons right">business</i>Adicionar Categoria</a></li>
					<li><a class="bold" href="{{BASE}}tipo/novo"><i class="material-icons right">chrome_reader_mode</i>Adicionar Tipo</a></li>
					<li><a class="bold" href="{{BASE}}imovel/novo"><i class="material-icons right">home</i>Adicionar Imóvel</a></li>
					<li><a href="{{BASE}}login/logout" class="btn red darken-2" onclick="return confirm('Deseja realmente sair?')">Logout</a></li>
				</ul>
				<a href="#" data-target="slide-out" class="sidenav-trigger btn btn-large waves-effect waves-ligh amber darken-1"><i class="material-icons right">create_new_folder</i>Cadastrar novos parâmetros</a>
			</div>
			
		</div>

		
		<br>
		<div class="row">
			<div class="col s12">
				<h2 class="title blue-grey-text text-darken-1">Itens Cadastrados</h2>
			</div>
		</div>

		<div class="row">
			


			<div class="col s12 m4">
				<ul class="collection with-header">
					<li class="collection-header blue-grey darken-2  white-text"><h4>Finalidades</h4></li>
					{% for finalidade in finalidades %}
					<a href="{{BASE}}finalidade/editar/{{finalidade.id}}" class="collection-item  blue-grey-text text-darken-3">{{finalidade.nome}}</a>
					{% endfor %}
				</ul>
			</div>

			<div class="col s12 m4">
				<ul class="collection with-header">
					<li class="collection-header blue-grey darken-2  white-text"><h4>Categorias</h4></li>
					{% for categoria in categorias %}
					<a href="{{BASE}}categoria/editar/{{categoria.id}}" class="collection-item blue-grey-text text-darken-3">{{categoria.nome}}</a>
					{% endfor %}
				</ul>
			</div>

			<div class="col s12 m4">
				<ul class="collection with-header">
					<li class="collection-header blue-grey darken-2  white-text"><h4>Tipos</h4></li>
					{% for tipo in tipos %}
					<a href="{{BASE}}tipo/editar/{{tipo.id}}" class="collection-item blue-grey-text text-darken-3">{{tipo.nome}}</a>
					{% endfor %}
				</ul>
			</div>
		</div>



		<div class="row">
			<div class="col s12">
				<ul class="collection with-header">
					<li class="collection-header blue-grey darken-2  white-text"><h4>Imoveis</h4></li>
						{% for imovel in imoveis %}

					<li class="collection-item">

						<li class="collection-item avatar">
							<i class="material-icons circle teal darken-2">home</i>
							<span class="title"><span class="teal-text text-darken-3 bold-text">Id:</span> {{imovel.id}}</span>

							<p><span class="teal-text text-darken-3 bold-text">Status:</span>
								{{imovel.status == 1 ? 'Ativo' : 'Inativo'}}
							</p>

							<p><span class="teal-text text-darken-3 bold-text">Slug:</span>
								<a href="{{BASE}}imovel/ver/{{imovel.slug}}/ss{{imovel.id}}" target="_blank">{{imovel.slug}}</a> 
							</p>
							<input type="hidden" name="id_imovel" id="id_imovel" value="{{imove.id}}">
							<p><span class="teal-text text-darken-3 bold-text">Data de Cadastro:</span> {{imovel.dataCadastro | date(DATE_TIME)}}</p>

							<div class="secondary-content teal-text">

								<span>
									<a href="{{BASE}}imovel/thumb/{{imovel.id}}" class=" teal-text"><i class="material-icons">camera_alt</i>
									</a>
								</span>
                                
                                
								<span>
									<a href="{{BASE}}imovel/editar/{{imovel.id}}" class="m-l-1 amber-text text-darken-2"><i class="material-icons">edit</i></a>	
								</span>
							</div>


						</li>
					</li>
					{% endfor %}
				</ul>
			</div>
		</div>
		

	</div> <!-- ennnnnd content -->	
	<div class="row"></div>
</div>





{% endblock %}







