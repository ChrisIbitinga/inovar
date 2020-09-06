<?php

namespace app\site\entitie;

class Finalidade
{
    private $id_finalidade;
    private $nome_finalidade;
    private $slug_finalidade;

    public function __construct($id_finalidade = null, $nome_finalidade = null, $slug_finalidade = null)
    {
        $this->id_finalidade = $id_finalidade;
        $this->nome_finalidade = $nome_finalidade;
        $this->slug_finalidade = $slug_finalidade;
    }

    public function getId()
    {
        return $this->id_finalidade;
    }

    public function getNome()
    {
        return $this->nome_finalidade;
    }

    public function getSlug()
    {
        //Obtemos o valor da propriedade
        $str = $this->slug_finalidade;

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