<?php

namespace app\site\controller;
use app\core\Controller;
use app\site\entitie\finalidade;
use app\site\model\FinalidadeModel;
use app\site\entitie\Tipo;
use app\site\model\TipoModel;
use app\site\entitie\Categoria;
use app\site\model\CategoriaModel;

class HomeController extends Controller
{

    private $finalidadeModel;
    private $tipoModel;
    private $categoriaModel;

    public function __construct()
    {
      $this->finalidadeModel = new FinalidadeModel();
      $this->tipoModel = new TipoModel();
      $this->categoriaModel = new CategoriaModel();
    }
    /**
     * index
     * 
     * @return void
     */

 
    // ############-------------- TAREFA     INCLUIR CATEGORIA E TIPO 
    public function index()
    {

      $imoveis = (new \app\site\model\ImovelModel())->getLasts(12);
       $this->view('home/main', [
          'finalidades' => $this->finalidadeModel->getAll(),
          'tipos' => $this->tipoModel->getAll(),
          'categorias' => $this->categoriaModel->getAll(),
          'imoveis' => arrayTree($imoveis, 4)
       ]);
   dd( $imoveis);
    }


    
      

}