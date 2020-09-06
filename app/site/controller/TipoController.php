<?php

namespace app\site\controller;

use app\core\Controller;
use app\site\entitie\Tipo;
use app\site\model\TipoModel;

class TipoController extends Controller
{
    private $tipoModel;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->tipoModel = new TipoModel();
    }

    /**
     * index
     *
     * @return void


     */

    public function index()
    {
        $this->view('tipo/main', [
            'tipo' => $this->tipoModel->getAll()
        ]);
    }

    public function ver(string $slug = '')
    {
        $slug = filter_var($slug, FILTER_SANITIZE_STRING);
        $slug = strtolower($slug);

        $livros = (new \app\site\model\LivroModel())->getSlugLivros($slug);
        $tipo = $this->tipoModel->getBySlug($slug);

        $this->view('tipo/ver', [
            'livros'    => arrayTree($livros, 4),
            'tipo' => $tipo
        ]);
    }

    public function lista()
    {
        \app\classes\security::protect();
        $this->view('tipo/lista-tipo', [
            'tipos' => $this->tipoModel->getAll()
        ]);
    }

    public function inputSelectTipo()
    {
        \app\classes\security::protect();
        $selectTipo =  $this->tipoModel->getAll();
    }

    public function novo()
    {
        \app\classes\security::protect();
        $this->view('tipo/novo');
    }

    public function editar($id = 0)
    {
        \app\classes\security::protect();

        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        if ($id <= 0)
            return  $this->showMessage('ID inválido', 'O ID informado é inválido.', 422);

        $tipo = $this->tipoModel->getById($id);

        if ($tipo->getId() == null || $tipo->getId() <= 0)
            return  $this->showMessage('tipo não encontrado', 'O tipo que você procura não foi encontrada.', 404);

        $this->view('tipo/editar', [
            'tipo' => $tipo
        ]);
    }

    /*#### INTERNAL ####*/

    public function insert()
    {
        \app\classes\security::protect();

        $tipo = $this->getInput();

        if (!$this->validate($tipo, false)) {
            $this->showMessage('Formulário inválido', 'Os dados fornecidos são inválidos', 422);
            return;
        }

        $result = $this->tipoModel->insert($tipo);

        if ($result === -1) {
            $this->showMessage('Erro ao cadastrar', 'Houve um erro ao tentar cadastrar, tente novamente mais tarde.', 500);
            return;
        }

        redirect(BASE . 'tipo/editar/' . $result);
    }

    public function update($id = 0)
    {
        \app\classes\security::protect();

        $tipo = $this->getInput($id);

        if (!$this->validate($tipo, true)) {
            $this->showMessage('Formulário inválido', 'Os dados fornecidos são inválidos', 422);
            return;
        }

        if (!$this->tipoModel->update($tipo))
            return $this->showMessage('Erro ao alterar', 'Houve um erro ao tentar alterar, tente novamente mais tarde.', 500);

        redirect(BASE . 'dashboard/' . $id);
    }

    private function validate(Tipo $tipo, bool $validateId = true)
    {
        if ($validateId && $tipo->getId() <= 0)
            return false;

        if (strlen(trim($tipo->getNome())) < 2)
            return false;

        if (strlen(trim($tipo->getSlug())) < 2)
            return false;

        return true;
    }

    private function getInput($id = null)
    {
        return new Tipo(
            filter_var($id, FILTER_SANITIZE_NUMBER_INT),
            post('txtNome'),
            post('txtSlug')
        );
    }
}