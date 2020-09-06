<?php

namespace app\site\entitie;

class Tipo
{
    private $id_tipo;
    private $nome_tipo;
    private $slug_tipo;

    public function __construct($id_tipo = null, $nome_tipo = null, $slug_tipo = null)
    {
        $this->id_tipo = $id_tipo;
        $this->nome_tipo = $nome_tipo;
        $this->slug_tipo = $slug_tipo;
    }

    public function getId()
    {
        return $this->id_tipo;
    }

    public function getNome()
    {
        return $this->nome_tipo;
    }

    public function getSlug()
    {
        //Obtemos o valor da propriedade
        $str = $this->slug_tipo;

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