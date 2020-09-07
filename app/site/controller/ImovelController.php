<?php

namespace app\site\controller;

use app\core\Controller;
use app\site\entitie\Tipo;
use app\site\entitie\Finalidade;
use app\site\entitie\Categoria;
use app\site\entitie\Usuario;
use app\site\entitie\Cidade;
use app\site\entitie\Imovel;
use app\site\model\ImovelModel;

class ImovelController extends Controller
{

   private $imovelModel;



   public function __construct()
   {
    $this->imovelModel = new ImovelModel();

} 

public function index()
{
    $this->showMessage('Página inexistente', 'A página que você procura não existe ou foi abduzida', 404);
}



public function ver(string $slug = '')
{
    $slug = filter_var($slug, FILTER_SANITIZE_STRING);

    $imovel = $this->imovelModel->getBySlug($slug);
      // dd($imovel);

    if ($imovel->getSlug() == null)
        return $this->showMessage('Imovel não encontrado', 'Droga', 404);


    $this->view('imovel/ver', [
        'imovel' => $imovel
        
    ]);
    dd($imovel);

}





public function novo()
{
    \app\classes\security::protect();

    $this->view('imovel/novo', [
        'tipos'       => (new \app\site\model\TipoModel())->getAll(),
        'finalidades' => (new \app\site\model\FinalidadeModel())->getAll(),
        'categorias' => (new \app\site\model\CategoriaModel())->getAll(),
        'cidades'     => (new \app\site\model\CidadeModel())->getAll()
    ]);
}

public function editar($idImovel = null)
{
    \app\classes\security::protect();

    $idImovel = filter_var($idImovel, FILTER_SANITIZE_NUMBER_INT);
    $userId  = \app\classes\Session::getValue('id');

    $imovel = $this->imovelModel->getById($idImovel, $userId);

    if ($imovel->getId() <= 0 || $imovel->getId() == null)
        return $this->showMessage('Imovel inválido', 'O Imovel que você procura para editar não foi encontrado.', 422);

    $this->view('imovel/editar', [
        'imovel' => $imovel,
        'tipo'       => (new \app\site\model\TipoModel())->getAll(),
        'finalidade' => (new \app\site\model\FinalidadeModel())->getAll(),
        'categoria' => (new \app\site\model\CategoriaModel())->getAll(),
        'cidade'     => (new \app\site\model\CidadeModel())->getAll(),
        'usuarios'     => (new \app\site\model\UsuarioModel())->getAll()
    ]);
}

public function thumb($idImovel = null)
{
    \app\classes\security::protect();

    $idImovel = filter_var($idImovel, FILTER_SANITIZE_STRING);
    $userId  = \app\classes\Session::getValue('id');

    $imovel = $this->imovelModel->getThumbById($idImovel, $userId);

    $this->view('imovel/thumb', [
        'idImovel' => $idImovel,
        'thumb'   => $imovel->thumb != null ? HOST . '/'. IMAGE_PATH . $imovel->thumb : null
    ]);
}

public function updateThumb($idImovel)
{
    \app\classes\security::protect();

    $idImovel = filter_var($idImovel, FILTER_SANITIZE_STRING);
    $userId = \app\classes\Session::getValue('id');

    $imovel = $this->imovelModel->getThumbById($idImovel, $userId);

    if ($idImovel == null || $imovel->id <= 0)
        return $this->showMessage('Imovel não encontrado', 'O imovel que você procura para alterar não pode ser encontrado.', 404);

    if (!\app\classes\Upload::validate($_FILES['flThumb']))
        return $this->showMessage('Imagem inválida', 'A imagem está no formato inválido.', 422);

    $imageName = \app\classes\Upload::upload($_FILES['flThumb']);
    if ($imageName == null || $imageName == 'error')
        return $this->showMessage('Erro ao upload imagem', 'Houve um erro ao tentar fazer o upload da imagem, tente novamente mais tarde.', 500);

    if (!$this->imovelModel->updateThumb($imageName, $idImovel, $userId))
    {
        unlink(IMAGE_PATH . $imageName);
        $this->showMessage('Erro ao alterar thumb', 'Não foi possível alterar a thumb, por favor, tente novamente mais tarde.', 500);
    }

    unlink(IMAGE_PATH  . $imovel->thumb);

    redirect(BASE . 'dashboard/' . $idImovel);
}


public function insert()
{
    \app\classes\security::protect();

    $imovel = $this->getInput();
        // dd($imovel);

    if (!$this->validate($imovel, false))
    {
        $this->showMessage('Formulário inválido 1', 'Os dados fornecidos são inválidos', 422);
        return;
    }

    $result = $this->imovelModel->insert($imovel);

    if ($result === -1)
    {
        $this->showMessage('Erro ao cadastrar', 'Houve um erro ao tentar cadastrar, tente novamente mais tarde.', 500);
        return;
    }

    redirect(BASE . 'imovel/editar/' . $result);
}

public function update($id = 0)
{
    \app\classes\security::protect();

    $imovel = $this->getInput($id);
    $userId  = \app\classes\Session::getValue('id');

    if (!$this->validate($imovel, true))
        return $this->showMessage('Formulário inválido 2', 'Os dados fornecidos são inválidos ou incompletos.', 422);

    if (!$this->validate($imovel, true)) {
        $this->showMessage('Formulário inválido 3', 'Os dados fornecidos são inválidos', 422);
        return;
    }

    if (!$this->imovelModel->update($imovel))
        return $this->showMessage('Erro ao alterar inválido', 'Houve um erro ao tentar alterar, tente novamente mais tarde.', 500);

    if (!$this->imovelModel->update($imovel, $userId))
        $this->showMessage('Erro ao alterar', 'Houve um erro ao tentar alterar, tente novamente mais tarde.', 500);


    redirect(BASE . 'imovel/editar/' . $id);
}



private function validate(Imovel $imovel, bool $validateId = true)
{
    if ($validateId && $imovel->getId() <= 0)

        return false;

    // if ($imovel->getIdTipo()->getId() <= 0 || $imovel->getIdTipo()->getId() == null)
    //     return false;

    // if ($imovel->getIdDestinacao()->getId() <= 0 || $imovel->getIdDestinacao()->getId() == null)
    //     return false;

    // if ($imovel->getIdCategoria()->getId() <= 0 || $imovel->getIdCategoria()->getId() == null)
    //     return false;

    // if ($imovel->getIdUsuario()->getId() <= 0 || $imovel->getIdUsuario()->getId() == null)
    //     return false;


    if (strlen(trim($imovel->getEndereco())) < 4)
        return false;

    if (strlen(trim($imovel->getNumero())) < 1)
        return false;

    if (strlen(trim($imovel->getValor())) < 4)
        return false;

    if (strlen(trim($imovel->getBairro())) < 3)
        return false;

    if (strlen(trim($imovel->getSala())) < 1)
        return false;

    if (strlen(trim($imovel->getQuarto())) < 1)
        return false;

    if (strlen(trim($imovel->getBanheiro())) < 1)
        return false;

    if (strlen(trim($imovel->getGaragem())) < 1)
        return false;

    if (strlen(trim($imovel->getSlug())) < 3)
        return false;

    if ($imovel->getStatus() < 1 || $imovel->getStatus() > 2)
        return false;



    return true;
}


private function getInput($id = null)
{
    return new Imovel(

        filter_var($id, FILTER_SANITIZE_NUMBER_INT),

        new Tipo(
            post('slTipo', FILTER_SANITIZE_NUMBER_INT)
        ),
        new Finalidade(
            post('slFinalidade', FILTER_SANITIZE_NUMBER_INT)
        ),
        new Categoria(
            post('slCategoria', FILTER_SANITIZE_NUMBER_INT)
        ),
        new Cidade(
            post('slCidade', FILTER_SANITIZE_NUMBER_INT)
        ),
        new Usuario(
            \app\classes\Session::getValue('id')
        ),
        
        getCurrentDate(),
        post('txtEndereco', FILTER_SANITIZE_STRING),
        post('txtNumero', FILTER_SANITIZE_STRING),
        post('txtValor', FILTER_SANITIZE_STRING),
        post('txtBairro', FILTER_SANITIZE_STRING),
        post('txtSala', FILTER_SANITIZE_STRING),
        post('txtQuarto', FILTER_SANITIZE_STRING),
        post('txtBanheiro', FILTER_SANITIZE_STRING),
        post('txtGaragem', FILTER_SANITIZE_STRING),
        post('txtSlug', FILTER_SANITIZE_STRING),
        post('txtAdicionais', FILTER_SANITIZE_SPECIAL_CHARS),
        post('slStatus', FILTER_SANITIZE_NUMBER_INT),
        null

    );
}


}








/* #### INTERNAL ####  */















