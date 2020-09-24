<footer class="page-footer  blue-grey darken-4">
	<div class="container">
		<div class="row">
			<div class="col s12 m4 ">
				<div class="brand-logo">
					<a href="{{BASE}}"><img src="{{BASE}}public/assets/img/logo-branco.png" alt="" class="responsive-img"></a>
				</div>
				<p>Ajudando a realizar o seu sonho</p>
			</div>
			<div class="col s12 m4 center">
				<h6 class="title-small grey-text text-lighten-3"><i class="material-icons">touch_app
</i>Atalhos</h6>
				<ul>
					<li><a class="amber-text" href="{{BASE}}">Home</a></li>

					{% for listaFinalidades in listaFinalidade %}
					<li><a class="amber-text" href="{{BASE}}imovel/buscar/{{listaFinalidades.id}}">{{listaFinalidades.nome}}</a></li>
					{% endfor %}
				</ul>
			</div>
			<div class="col s12 m4 center">
				<h6 class="title-small grey-text text-lighten-3"> <i class="material-icons">share</i> Siga</h6>
				<ul>
					<li><a class="amber-text" href="#!">Facebook</a></li>
					<li><a class="amber-text" href="#!">Instagram</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			© 2020 Inovar Imóveis Botucatu
			<a class="grey-text text-lighten-3  right" href="#!">Desenvolvido por Ib Web Sites</a>
		</div>
	</div>
</footer>

{% block script %}

<script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{BASE}}assets/js/owl.carousel.min.js"></script>
<script src="{{BASE}}assets/js/src/initi-materialize.js"></script>
<script src="{{BASE}}assets/js/owl-script.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="{{BASE}}assets/js/script.min.js"></script>
<script src="{{BASE}}vendor/materialize/js/materialize.min.js"></script>


{% endblock %}







