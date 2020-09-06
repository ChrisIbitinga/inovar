<?php

namespace app\site\entitie;

class Categoria
{
    private $id_categoria;
    private $nome_categoria;
    private $slug_categoria;

    public function __construct($id_categoria = null, $nome_categoria = null, $slug_categoria = null)
    {
        $this->id_categoria = $id_categoria;
        $this->nome_categoria = $nome_categoria;
        $this->slug_categoria = $slug_categoria;
    }

    public function getId()
    {
        return $this->id_categoria;
    }

    public function getNome()
    {
        return $this->nome_categoria;
    }

    public function getSlug()
    {
        //Obtemos o valor da propriedade
        $str = $this->slug_categoria;

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
