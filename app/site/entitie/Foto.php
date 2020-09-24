<?php 

namespace app\site\entitie;


class Foto
{

private $id_foto;
private $nome_foto;
private $id_imovel;


public function __construct($id_foto = null, $nome_foto = null, $id_imovel = null)
{
  

     $this->id_foto     = $id_foto;
     $this->nome_foto   = $nome_foto;
     $this->id_imovel   = $id_imovel;;

}



    /**
     * @return mixed
     */
    public function getIdImovel()
    {
        return $this->id_imovel;
    }

    /**
     * @return mixed
     */
    public function getIdFoto()
    {
        return $this->id_foto;
    }

    /**
     * @return mixed
     */
    public function getNomeFoto()
    {
        return $this->nome_foto;
    }
}








