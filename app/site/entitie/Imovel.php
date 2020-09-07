<?php

namespace app\site\entitie;
use app\site\entitie\Tipo;
use app\site\entitie\Finalidade;
use app\site\entitie\Categoria;
use app\site\entitie\Usuario;
use app\site\entitie\Cidade;

class Imovel
{
	private $id;
	private $id_tipo;
	private $id_destinacao;
	private $id_categoria;
	private $id_usuario;
	private $id_cidade;
	private $data_cadastro;
	private $endereco;
	private $numero;
	private $valor;
	private $bairro;
	private $sala;
	private $quarto;
	private $banheiro;
	private $garagem;
	private $slug;
	private $adicionais;
	private $status;
    private $thumb;


	public function __construct
	(
		$id = null, $id_tipo = null, $id_destinacao = null, $id_categoria = null, $id_usuario = null, 
		$id_cidade = null, $data_cadastro = null, $endereco = null, $numero = null, $valor = null, $bairro = null, 
		$sala = null, $quarto = null, $banheiro = null, $garagem = null, $slug =  null, $adicionais = null, $status = 1,
         $thumb = null
	)

	{


		 $this->id            =  $id ;
		 $this->id_tipo       =  $id_tipo ?? new Tipo();
		 $this->id_destinacao =  $id_destinacao ?? new Finalidade();
		 $this->id_categoria  =  $id_categoria ?? new Categoria();
		 $this->id_usuario    =  $id_usuario ?? new Usuario();
		 $this->id_cidade     =  $id_cidade ?? new Cidade();
		 $this->data_cadastro =  $data_cadastro;
		 $this->endereco      =  $endereco;
		 $this->numero        =  $numero ;
		 $this->bairro        =  $bairro ;
		 $this->valor         =  $valor;
		 $this->sala          =  $sala;
		 $this->quarto        =  $quarto;
		 $this->banheiro      =  $banheiro ;
		 $this->garagem       =  $garagem;
		 $this->slug          =  $slug;
		 $this->adicionais    =  $adicionais;
		 $this->status        =  $status;
         $this->thumb         =  $thumb;

	}


	

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIdTipo()
    {
        return $this->id_tipo;
    }

    /**
     * @return mixed
     */
    public function getIdDestinacao()
    {
        return $this->id_destinacao;
    }

    /**
     * @return mixed
     */
    public function getIdCategoria()
    {
        return $this->id_categoria;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @return mixed
     */
    public function getIdCidade()
    {
        return $this->id_cidade;
    }

  
    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @return mixed
     */
    public function getSala()
    {
        return $this->sala;
    }

    /**
     * @return mixed
     */
    public function getQuarto()
    {
        return $this->quarto;
    }

    /**
     * @return mixed
     */
    public function getBanheiro()
    {
        return $this->banheiro;
    }

    /**
     * @return mixed
     */
    public function getGaragem()
    {
        return $this->garagem;
    }

    /**
     * @return mixed
     */
   public function getSlug()
	{
        //Obtemos o valor da propriedade
		$str = $this->slug;

        //Removemos o espaço no começo e fim
		$str = trim($str);

        //Colocamos as letras na minúscula
		$str = strtolower($str);

        //Trocamos alguns carácteres por traço
		$str = str_replace([
			' ', '.', ',', '+', '*'
		], '-', $str);

        //Retornamos a string tratada
		return $str;
	}

    /**
     * @return mixed
     */
    public function getAdicionais()
    {
        return $this->adicionais;
    }

    /**
     * @return mixed
     */
    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getThumb()
    {
        return $this->thumb;
    }
}
