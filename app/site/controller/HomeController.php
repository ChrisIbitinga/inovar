<?php

namespace app\site\controller;

use app\core\Controller;

use app\site\entitie\Tipo;
use app\site\model\TipoModel;

use app\site\entitie\Finalidade;
use app\site\model\FinalidadeModel;

use app\site\entitie\Categoria;
use app\site\model\CategoriaModel;

use app\site\entitie\Usuario;
use app\site\model\UsuarioModel;

use app\site\entitie\Cidade;
use app\site\model\CidadeModel;

use app\site\entitie\Imovel;
use app\site\model\ImovelModel;

class HomeController extends Controller
{

 private $tipoModel;
 private $finalidadeModel;
 private $categoriaModel;
 private $usuarioModel;
 private $cidadeModel;
 private $imovelModel;


 public function __construct()
 {
   $this->tipoModel = new TipoModel();
   $this->finalidadeModel = new FinalidadeModel();
   $this->categoriaModel = new CategoriaModel();
   $this->usuarioModel = new UsuarioModel();
   $this->cidadeModel = new CidadeModel();
   $this->imovelModel = new ImovelModel();
 }
    /**
     * index
     * 
     * @return void
     */




    public function index()
    {

      $todos        = $this->imovelModel->getAllHome();
      $categoria    = $this->categoriaModel->getAll();
      $tipo         = $this->tipoModel->getAll();
      $usuario      = $this->usuarioModel->getAll();
      $finalidade   = $this->finalidadeModel->getAll();
      $ultimoImovel = $this->imovelModel->getMax();
      $randImovel   = $this->imovelModel->selectRandon();
      $listaImovel  = $this->imovelModel->getAllHome();

      $this->view('home/main', [
        'listaImovel' => $todos,
        'listaCategoria' => $categoria,
        'listaTipo' => $tipo,
        'listaUsuario' => $usuario,
        'listaFinalidade' => $finalidade,
        'ultimoImovel'    => $ultimoImovel,
        'randImovel'      => $randImovel
        
      ]);
   
     

    }



    


  }