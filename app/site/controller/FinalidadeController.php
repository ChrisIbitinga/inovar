<?php

namespace app\site\controller;

use app\core\Controller;
use app\site\entitie\Finalidade;
use app\site\model\FinalidadeModel;

class FinalidadeController extends Controller
{
    private $finalidadeModel;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->finalidadeModel = new FinalidadeModel();
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $this->view('finalidade/main', [
            'finalidades' => $this->finalidadeModel->getAll()
        ]);
    }

    public function ver(string $slug = '')
    {
        $slug = filter_var($slug, FILTER_SANITIZE_STRING);
        $slug = strtolower($slug);

        $livros = (new \app\site\model\LivroModel())->getSlugLivros($slug);
        $finalidade = $this->finalidadeModel->getBySlug($slug);

        $this->view('categoria/ver', [
            'livros'    => arrayTree($livros, 4),
            'finalidade' => $finalidade
        ]);
    }

    public function lista()
    {
        \app\classes\Security::protect();
        $this->view('finalidade/lista-finalidade', [
            'finalidades' => $this->finalidadeModel->getAll()
        ]);
    }

    public function inputSelectFinalidade()
    {
        \app\classes\Security::protect();
        $selectFinalidade =  $this->finalidadeModel->getAll();
    }

    public function nova()
    {
        \app\classes\Security::protect();
        $this->view('finalidade/nova');
    }

    public function editar($id = 0)
    {
        \app\classes\Security::protect();

        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        if ($id <= 0)
            return  $this->showMessage('ID inválido', 'O ID informado é inválido.', 422);

        $finalidade = $this->finalidadeModel->getById($id);

        if ($finalidade->getId() == null || $finalidade->getId() <= 0)
            return  $this->showMessage('Categoria não encontrada', 'A categoria que você procura não foi encontrada.', 404);

        $this->view('finalidade/editar', [
            'finalidade' => $finalidade
        ]);
    }

    /*#### INTERNAL ####*/

    public function insert()
    {
        \app\classes\Security::protect();

        $finalidade = $this->getInput();

        if (!$this->validate($finalidade, false)) {
            $this->showMessage('Formulário inválido', 'Os dados fornecidos são inválidos', 422);
            return;
        }

        $result = $this->finalidadeModel->insert($finalidade);

        if ($result === -1) {
            $this->showMessage('Erro ao cadastrar', 'Houve um erro ao tentar cadastrar, tente novamente mais tarde.', 500);
            return;
        }

        redirect(BASE . 'categoria/editar/' . $result);
    }

    public function update($id = 0)
    {
        \app\classes\Security::protect();

        $finalidade = $this->getInput($id);

        if (!$this->validate($finalidade, true)) {
            $this->showMessage('Formulário inválido', 'Os dados fornecidos são inválidos', 422);
            return;
        }

        if (!$this->finalidadeModel->update($finalidade))
            return $this->showMessage('Erro ao alterar inválido', 'Houve um erro ao tentar alterar, tente novamente mais tarde.', 500);

        redirect(BASE . 'dashboard/' . $id);
    }

    private function validate(Finalidade $finalidade, bool $validateId = true)
    {
        if ($validateId && $finalidade->getId() <= 0)
            return false;

        if (strlen(trim($finalidade->getNome())) < 2)
            return false;

        if (strlen(trim($finalidade->getSlug())) < 2)
            return false;

        return true;
    }

    private function getInput($id = null)
    {
        return new Finalidade(
            filter_var($id, FILTER_SANITIZE_NUMBER_INT),
            post('txtNome'),
            post('txtSlug')
        );
    }
}