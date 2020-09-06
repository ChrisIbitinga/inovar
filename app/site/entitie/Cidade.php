<?php

namespace app\site\entitie;

class Cidade
{
    private $id_cidade;
    private $nome_cidade;
    private $slug_cidade;

    public function __construct($id_cidade = null, $nome_cidade = null, $slug_cidade = null)
    {
        $this->id_cidade = $id_cidade;
        $this->nome_cidade = $nome_cidade;
        $this->slug_cidade = $slug_cidade;
    }

    public function getId()
    {
        return $this->id_cidade;
    }

    public function getNome()
    {
        return $this->nome_cidade;
    }

    public function getSlug()
    {
        //Obtemos o valor da propriedade
        $str = $this->slug_cidade;

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
}
