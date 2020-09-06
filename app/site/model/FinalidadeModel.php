<?php

namespace app\site\model;

use app\site\entitie\Finalidade;

use app\core\Model;

class FinalidadeModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new Model();
    }

    public function insert(Finalidade $finalidade)
    {
        $sql = 'INSERT INTO finalidade (nome_finalidade, slug_finalidade) VALUES (:nome_finalidade, :slug_finalidade)';
        $params  = [
            ':nome_finalidade' => $finalidade->getNome(),
            ':slug_finalidade' => $finalidade->getSlug()
        ];

        if (!$this->pdo->ExecuteNonQuery($sql, $params))
            return -1;

        return $this->pdo->GetLastID();
    }

    public function update(Finalidade $finalidade)
    {
        $sql = 'UPDATE finalidade SET nome_cidade = :nome_cidade, slug_cidade = :slug_cidade WHERE id_cidade = :id_cidade';
        $params  = [
            ':id_cidade' => $finalidade->getId(),
            ':nome_cidade' => $finalidade->getNome(),
            ':slug_cidade' => $finalidade->getSlug()
        ];

        return $this->pdo->ExecuteNonQuery($sql, $params);
    }

    public function getById(int $id_finalidade_finalidade)
    {
        $sql = 'SELECT * FROM finalidade WHERE id_finalidade_finalidade = :id_finalidade_finalidade';

        return $this->collection($this->pdo->ExecuteQueryOneRow($sql, [
            ':id_finalidade_finalidade' => $id_finalidade_finalidade
        ]));
    }

    public function getBySlug(string $slug_finalidade)
    {
        $sql = 'SELECT nome_finalidade FROM finalidade WHERE slug_finalidade = :slug_finalidade';

        return $this->collection($this->pdo->ExecuteQueryOneRow($sql, [
            ':slug_finalidade' => $slug_finalidade
        ]));
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM finalidade ORDER BY nome_finalidade ASC';



        $dt = $this->pdo->ExecuteQuery($sql);

        $list = [];

        foreach ($dt as $dr)
            $list[] = $this->collection($dr);

        return $list; dd($list);
    }

    private function collection($param)
    {
        return new Finalidade(
            $param['id_finalidade'] ?? null,
            $param['nome_finalidade'] ?? null,
            $param['slug_finalidade'] ?? null
        );
    }
}