<?php

namespace app\site\controller;

use app\core\Controller;
use app\site\entitie\Foto;
use app\site\model\FotoModel;

use app\site\entitie\Imovel;
use app\site\model\ImovelModel;

class FotoController extends Controller
{

	private $fotoModel;
	private $imovelModel;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
    	$this->fotoModel = new FotoModel();
    	$this->imovelModel = new ImovelModel();
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        // $this->view('categoria/main', [
        //     'categorias' => $this->categoriaModel->getAll()
        // ]);
    }

    public function insert()
{
    \app\classes\Security::protect();

  $imovel = post('slImovel', FILTER_SANITIZE_NUMBER_INT);
   // $id = post('slImovel', FILTER_SANITIZE_NUMBER_INT);



if($imovel <= 0 || $imovels = null){
     $this->showMessage('Erro ao cadastrar', 'Você não selecionou o id do imovel.', 500);
        return;
}


    $result = $this->fotoModel->insert($foto);

    if ($result === -1)
    {
        $this->showMessage('Erro ao cadastrar', 'Houve um erro ao tentar cadastrar, tente novamente mais tarde.', 500);
        return;
    }
    if (!\app\classes\Upload::validate($_FILES['flFoto']))
        return $this->showMessage('Imagem inválida', 'A imagem está no formato inválido.', 422);

     $imageName = \app\classes\Upload::upload($_FILES['flFoto']);

    if ($imageName == null || $imageName == 'error')
        return $this->showMessage('Erro ao upload imagem', 'Houve um erro ao tentar fazer o upload da imagem, tente novamente mais tarde.', 500);

    // if (!$this->imovelModel->updateThumb($imageName, $idImovel, $userId))
    // {
    //     unlink(IMAGE_PATH . $imageName);
    //     $this->showMessage('Erro ao alterar thumb', 'Não foi possível alterar a thumb, por favor, tente novamente mais tarde.', 500);
    // }

    redirect(BASE . 'dashboard/' . $idImovel);
}



public function nova()
{
    \app\classes\Security::protect();

    $imovel = $this->imovelModel->getAll();

    $this->view('foto/nova', [
    'imovel' => $imovel
    ]);
}

    // public function nova()
    // {
    // 	\app\classes\Security::protect();
    // 	$foto = $this->fotoModel->getAllHome();

    // 	$listaImovel = $this->imovelModel->getAllHome();
    // 	$this->view('foto/nova', [
    // 		'listaImovel' => $todos,
    // 		'listafotos' => $fotos
    // 	]);

    // }

    public function foto($idImovel = null)
{
    \app\classes\Security::protect();

    $idImovel = filter_var($idImovel, FILTER_SANITIZE_STRING);


    $foto = $this->fotoModel->getFotoById($idImovel, $userId);
     $userId  = \app\classes\Session::getValue('id');

    $this->view('foto/foto', [
        'idImovel' => $idImovel,
        'foto'   => $foto->foto != null ? HOST . '/'. IMAGE_PATH . $foto->foto : null
    ]);
}


    // public function insert()
    // {
    // 	\app\classes\Security::protect();

    // 	$foto = $this->getInput();

    // 	dd($foto);

    // 	if (!$this->validate($foto, false)) {
    // 		$this->showMessage('Formulário inválido', 'Os dados fornecidos são inválidos', 422);
    // 		return;
    // 	}

    // 	$result = $this->fotoModel->insert($foto);

    // 	if ($result === -1) {
    // 		$this->showMessage('Erro ao cadastrar', 'Houve um erro ao tentar cadastrar, tente novamente mais tarde.', 500);
    // 		return;
    // 	}

    // 	redirect(BASE . 'foto/editar/' . $result);
    // }

    public function editar($id = 0)
    {
    	\app\classes\Security::protect();

    	$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

    	if ($id <= 0)
    		return  $this->showMessage('ID inválido', 'O ID informado é inválido.', 422);

    	$foto = $this->fotoModel->getById($id);

    	if ($foto->getIdFoto() == null || $foto->getIdFoto() <= 0)
    		return  $this->showMessage('Categoria não encontrada', 'A categoria que você procura não foi encontrada.', 404);

    	$this->view('foto/editar', [
    		'foto' => $foto
    	]);
    }


    public function update($id = 0)
    {
    	\app\classes\Security::protect();

    	$foto = $this->getInput($id);

    	if (!$this->validate($foto, true)) {
    		$this->showMessage('Formulário inválido', 'Os dados fornecidos são inválidos', 422);
    		return;
    	}

    	if (!$this->fotoModel->update($foto))
    		return $this->showMessage('Erro ao alterar inválido', 'Houve um erro ao tentar alterar, tente novamente mais tarde.', 500);

    	redirect(BASE . 'dashboard/' . $id);
    }


    private function validate(Foto $foto, bool $validateId = true)
    {
    	if ($validateId && $foto->getIdFoto() <= 0)
    		return false;

    	if (strlen(trim($foto->getNomeFoto())) < 2)
    		return false;

    	if (strlen(trim($foto->getIdImovel())) < 2)
    		return false;

    	return true;
    }






    private function getInput()
    {
    	return  new Foto(
    		null,
    		post('flFoto', FILTER_SANITIZE_STRING),
    		post('slImovel', FILTER_SANITIZE_NUMBER_INT)
    		
    	);
    }
}



