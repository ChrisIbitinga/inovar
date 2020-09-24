
{% extends 'partials/body.twig.php' %}


{% block title %}
Editar Imóvel
{% endblock %}


{% block body %}

<div class="container">
	<div class="row"></div>
	<div class="content white z-depth-3	p-1">
		<div class="row">
			<div class="col s12 ">
				<h4>Editar Imóvel</h4>
			</div>
		</div>
		<div class="row">
			<div class="col s12 ">

				<!--FORMULARIO-->

				<form class="" action="{{BASE}}imovel/insert" method="post" id="frmCadastro"
				onsubmit="return validarCadastro(false);">

				<div class="row ">
					<input type="hidden" id="txtUsuario" name="txtUsuario" value="{{indentiteUser}}">
					<div class="input-field col s12 m4">
						<select id="slTipo" name="slTipo">
							<option value="" disabled selected>Ex: Casa</option>
							{% for tipo in tipos %}
							<option  value="{{tipo.id}}">{{tipo.nome}}</option>
							{% endfor %}
						</select>
					</div>

					<div class="input-field col s12 m4">
						<select id="slFinalidade" name="slFinalidade">
							<option value="" disabled selected>Ex: A venda</option>
							{% for finalidade in finalidades %}
							<option  value="{{finalidade.id}}">{{finalidade.nome}}</option>
							{% endfor %}
						</select>
					</div>

					<div class="input-field col s12 m4">
						<select id="slStatus" name="slStatus">
							<option value="" disabled selected>Ex: Ativo ou Inativo</option>
							<option  value="1">Ativo</option>
							<option  value="0">Inativo</option>
						</select>
					</div>
				</div>


				
				<div class="row">
					<div class="input-field col s12 m6">
						<select id="slCategoria" name="slCategoria">
							<option value="" disabled selected>Ex: Comercial</option>
							{% for categoria in categorias %}
							<option  value="{{categoria.id}}">{{categoria.nome}}</option>
							{% endfor %}
						</select>
					</div>

					<div class="input-field col s12 m6">
						<select id="slCidade" name="slCidade">
							<option value="" disabled selected>Ex: Botucatu</option>
							{% for cidade in cidades %}
							<option  value="{{cidade.id}}">{{cidade.nome}}</option>
							{% endfor %}
						</select>
					</div>

				</div>

				<div class="row">

					<div class="col s12 m6">
						class="material-icons prefix">map</i> 
						<input id="txtEndereco" type="text" name="txtEndereco" placeholder="Ex: Rua Trêze de Maio"  class="validate" value="">
						<label for="txtEndereco">Endereco</label>
					</div>

					<div class="col s12 m3">
						<i class="material-icons prefix">filter_2</i> 
						<input id="txtNumero" type="text" name="txtNumero" placeholder="Ex: 255 ou 255 A"  class="validate">
						<label for="txtNumero">Numero</label>
					</div>

					<div class="col s12 m3">
						<i class="material-icons prefix">attach_money</i> 
						<input id="txtValor" type="text" name="txtValor" placeholder="Ex: 200.000,00"  class="validate">
						<label for="txtValor">Valor</label>
					</div>
					
				</div>

				<div class="row">

					<div class="col s12 m6">
						<i class="material-icons prefix">assistant_photo</i> 
						<input id="txtBairro" type="text" name="txtBairro" placeholder="Ex: Centro"  class="validate">
						<label for="txtBairro">Bairro</label>
					</div>

					<div class="col s12 m3">
						<i class="material-icons prefix">weekend</i> 
						<input id="txtSala" type="text" name="txtSala" placeholder="Ex: 1"  class="validate">
						<label for="txtSala">Número de sala</label>
					</div>

					<div class="col s12 m3">
						<i class="material-icons prefix">hotel</i>  
						<input id="txtQuarto" type="text" name="txtQuarto" placeholder="Ex: 3"  class="validate">
						<label for="txtQuarto">Número de quarto</label>
					</div>

				</div>

				<div class="row">

					<div class="col s12 m3">
						<i class="material-icons prefix">airline_seat_legroom_normal</i> 
						<input id="txtBanheiro" type="text" name="txtBanheiro" placeholder="Ex: 2"  class="validate">
						<label for="txtBanheiro">Número de banheiro</label>
					</div>

					<div class="col s12 m3">
						<i class="material-icons prefix">directions_car</i>  
						<input id="txtGaragem" type="text" name="txtGaragem" placeholder="Ex: 1"  class="validate">
						<label for="txtGaragem">Vagas na Garagem</label>
					</div>

					<div class="col s12 m6">
						<i class="material-icons prefix">error_outline</i> 
						<input id="txtSlug" type="text" name="txtSlug" placeholder="Dica: use nome do bairro"  class="validate">
						<label for="txtSlug">Slug</label>
					</div>

				</div>

				<div class="row">

					<label for="txtAdicionais">Adicionais</label>
					<div class="col s12">
						<i class="material-icons prefix">feedback</i> 
						<input  onkeyup="countCharacters(this, 'spCaracteres', 500);" id="txtAdicionais" name="txtAdicionais" class="validate">
						
					</div>
				</div>

				<div class="row">
					<div class="col s12">
						<div class="col s6">
							<a href="{{BASE}}dashboard/"  class="amber-text text-darken-2 waves-effect waves-light right">Voltar
								<i class="material-icons left">arrow_back</i>
							</a>
						</div>
						<div class="col s6">

							<button type="submit" class="btn waves-effect waves-light right"  name="action">Gravar
								<i class="material-icons right">save</i>
							</button>
						</div>
					</div>
				</div>

				<br>
				<div class="divAlert" id="divAlert">
					<div class="alert amber darken-1 white-text">Preencha todos os campos...</div>
				</div>
			</form>
			<!-- END FORMULARIO-->


		</div>
	</div>
</div>
<div class="row"></div>
</div>

{% endblock %}


{% block script %}

<script src="{{BASE}}assets/js/categoria.min.js"></script>
<script src="//cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace('txtAdicionais');
</script>
{% endblock %}