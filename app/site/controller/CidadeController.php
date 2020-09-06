

<?php

namespace app\site\controller;

use app\core\Controller;
use app\site\entitie\Cidade;
use app\site\model\CidadeModel;

class CidadeController extends Controller
{
    private $cidadeModel;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->cidadeModel = new CidadeModel();
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $this->view('cidade/main', [
            'cidades' => $this->cidadeModel->getAll()
        ]);
    }

    public function ver(string $slug = '')
    {
        $slug = filter_var($slug, FILTER_SANITIZE_STRING);
        $slug = strtolower($slug);

        $imoveis = (new \app\site\model\ImovelModel())->getSlug($slug);
        $cidades = $this->cidadeModel->getBySlug($slug);

        $this->view('cidade/ver', [
            'imoveis'    => arrayTree($livros, 4),
            'cidade' => $cidade
        ]);
    }

    public function lista()
    {
        \app\classes\security::protect();
        $this->view('cidade/lista-cidade', [
            'cidades' => $this->cidadeModel->getAll()
        ]);
    }

    public function nova()
    {
        \app\classes\security::protect();
        $this->view('cidade/nova');
    }

    public function editar($id = 0)
    {
        \app\classes\security::protect();

        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        if ($id <= 0)
            return  $this->showMessage('ID inválido', 'O ID informado é inválido.', 422);

        $cidade = $this->cidadeModel->getById($id);

        if ($cidadeModel->getId() == null || $cidade->getId() <= 0)
            return  $this->showMessage('Categoria não encontrada', 'A categoria que você procura não foi encontrada.', 404);

        $this->view('cidade/editar', [
            'cidade' => $cidade
        ]);
    }

    /*#### INTERNAL ####*/

    public function insert()
    {
        \app\classes\security::protect();

        $cidade = $this->getInput();

        if (!$this->validate($cidade, false)) {
            $this->showMessage('Formulário inválido', 'Os dados fornecidos são inválidos', 422);
            return;
        }

        $result = $this->cidadeModel->insert($cidade);

        if ($result === -1) {
            $this->showMessage('Erro ao cadastrar', 'Houve um erro ao tentar cadastrar, tente novamente mais tarde.', 500);
            return;
        }

        redirect(BASE . 'cidade/editar/' . $result);
    }

    public function update($id = 0)
    {
        \app\classes\security::protect();

        $cidade = $this->getInput($id);

        if (!$this->validate($cidade, true)) {
            $this->showMessage('Formulário inválido', 'Os dados fornecidos são inválidos', 422);
            return;
        }

        if (!$this->cidadeModel->update($cidade))
            return $this->showMessage('Erro ao alterar inválido', 'Houve um erro ao tentar alterar, tente novamente mais tarde.', 500);

        redirect(BASE . 'dashboard/' . $id);
    }

    private function validate(Categoria $categoria, bool $validateId = true)
    {
        if ($validateId && $cidade->getId() <= 0)
            return false;

        if (strlen(trim($cidade->getNome())) < 2)
            return false;

        if (strlen(trim($cidade->getSlug())) < 2)
            return false;

        return true;
    }

    private function getInput($id = null)
    {
        return new Categoria(
            filter_var($id, FILTER_SANITIZE_NUMBER_INT),
            post('txtNome'),
            post('txtSlug')
        );
    }
}
