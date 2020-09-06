<?php

namespace app\site\controller;
use app\core\Controller;
use app\site\entitie\finalidade;
use app\site\model\FinalidadeModel;
use app\site\entitie\Tipo;
use app\site\model\TipoModel;
use app\site\entitie\Categoria;
use app\site\model\CategoriaModel;
use app\site\entitie\Imovel;
use app\site\model\ImovelModel;


class DashboardController extends Controller
{

  private $finalidadeModel;
  private $tipoModel;
  private $categoriaModel;
  private $imovelModel;

  public function __construct()
    /**
     * __construct
     * 
     * @return void
     */
    {
      \app\classes\Security::protect();
      $this->finalidadeModel = new FinalidadeModel();
      $this->tipoModel = new TipoModel();
      $this->categoriaModel = new CategoriaModel();
      $this->imovelModel = new ImovelModel();
    }
    /**
     * index
     * 
     * @return void
     */
    public function index()
    {

      $userId = \app\classes\Session::getValue('id');
      $this->view('dashboard/main', [
        'finalidades' => $this->finalidadeModel->getAll(),
        'tipos' => $this->tipoModel->getAll(),
        'categorias' => $this->categoriaModel->getAll(),
        // 'inners' => $this->imovelModel->getInnerJoin(),
        'imoveis' => $this->imovelModel->getAll()

            // 'imoveis' => (new \app\site\model\ImovelModel())->getIdUsuario($userId)
      ] 
    );

    }
    


  }