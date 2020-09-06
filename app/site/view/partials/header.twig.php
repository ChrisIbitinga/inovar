<header>
	

	<!-- info bar-->
	<div class="row blue-grey darken-3 mb-0 bar-info">
		<div class="container">
			<div class="row">
				<div class="col s12 m6">
					<div class="info">
						<i class="material-icons">mail</i> 
						<span class="">contato.inovarimoveisbotucatu@gmail.com </span>
					</div>
				</div>
				<div class="col s12 m6 ">
					<div class="info flex-end">
						<i class="material-icons">phone</i> 
						<span class="">(14) 9 9999-9999 </span>
					</div>
				</div>
			</div>
		</div>
	</div>



	<!-- MENU -->
	<nav class="blue-grey darken-2">
		<div class="container">
			<div class="nav-wrapper">
				<a href="{{BASE}}" class="brand-logo">
					<img src="{{BASE}}assets/img/logo-branco.png" alt=" Logo Inovar  Imóveis Botucatu">
				</a>
				<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

				<ul id="dropdown1" class="dropdown-content">

					<li><a href="{{BASE}}categoria/ver/locacao">Locação</a></li>
					<li><a href="{{BASE}}categoria/ver/venda">Venda</a></li>

				</ul>
				<ul id="dropdown2" class="dropdown-content">
					<li><a href="{{BASE}}login/main">Login</a></li>

					{% if userName != null %}
					<li><a href="{{BASE}}login/editar">Editar</a></li>
					<li><a href="{{BASE}}login/senha">Alterar senha</a></li>
					<li><a href="{{BASE}}login/logout" onclick="return confirm('Deseja realmente sair?')">Sair</a></li>
					{% endif %}
				</ul>
				<ul class="right hide-on-med-and-down">
					<li><a href="{{BASE}}">Inicio</a></li>
					<li><a href="{{BASE}}about/">Quem somos</a></li>
					<li><a class="dropdown-trigger left" href="{{BASE}}categoria" data-target="dropdown1">Finalidade<i class="material-icons right">arrow_drop_down</i></a></li>
					{% if  userNivel != 'user' and userName != null %}
					<li><a href="{{BASE}}dashboard/main">Painel</a></li>
					{% endif %}
					<li><a class="dropdown-trigger left" href="#!" data-target="dropdown2"> 
						{% if userName == null %}
						Entrar
						<i class="material-icons right amber-text">locked</i></a></li>

						{% else %}
						Olá {{userName}}
						<i class="material-icons right">lock_open</i></a></li>
						{% endif %}


					</ul>

				</div>



			</div>



		</nav>
		<!-- SIDENAV -->
		<ul class="sidenav" id="mobile-demo">
			<li><a href="sass.html">Sass</a></li>
			<li><a href="badges.html">Components</a></li>
			<li><a href="collapsible.html">Javascript</a></li>
			<li><a href="mobile.html">Mobile</a></li>
		</ul>

	</header>