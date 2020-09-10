<?php

namespace app\site\controller;
use app\core\Controller;
use app\site\entitie\finalidade;
use app\site\model\FinalidadeModel;
use app\site\entitie\Tipo;
use app\site\model\TipoModel;
use app\site\entitie\Categoria;
use app\site\model\CategoriaModel;
use app\site\entitie\Usuario;
use app\site\model\UsuarioModel;

class HomeController extends Controller
{

    private $finalidadeModel;
    private $tipoModel;
    private $categoriaModel;
    private $usuarioModel;

    public function __construct()
    {
      $this->finalidadeModel = new FinalidadeModel();
      $this->tipoModel = new TipoModel();
      $this->categoriaModel = new CategoriaModel();
      $this->usuarioModel = new UsuarioModel();
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
          'imoveis' => arrayTree($imoveis, 4),
           'categorias' => $this->categoriaModel->getAll(),
           'tipos' => $this->tipoModel->getAll(),
           'finalidades' => $this->finalidadeModel->getAll(),
           'usuarios' => $this->usuarioModel->getAll(),
       ]);
        dd($imoveis);
    }


    
      

}