<?php

namespace app\site\model;

use app\site\entitie\Cidade;

use app\core\Model;

class CidadeModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new Model();
    }

    public function insert(Cidade $cidade)
    {
        $sql = 'INSERT INTO cidade (nome_cidade, slug_cidade) VALUES (:nome_cidade, :slug_cidade)';
        $params  = [
            ':nome_cidade' => $cidade->getNome(),
            ':slug_cidade' => $cidade->getSlug()
        ];

        if (!$this->pdo->ExecuteNonQuery($sql, $params))
            return -1;

        return $this->pdo->GetLastID();
    }

    public function update(Cidade $cidade)
    {
        $sql = 'UPDATE cidade SET nome_cidade = :nome_cidade, slug_cidade = :slug_cidade WHERE id_cidade = :id_cidade';
        $params  = [
            ':id_cidade' => $cidade->getId(),
            ':nome_cidade' => $cidade->getNome(),
            ':slug_cidade' => $cidade->getSlug()
        ];

        return $this->pdo->ExecuteNonQuery($sql, $params);
    }

    public function getById(int $id_cidade)
    {
        $sql = 'SELECT * FROM cidade WHERE id_cidade = :id_cidade';

        return $this->collection($this->pdo->ExecuteQueryOneRow($sql, [
            ':id_cidade' => $id_cidade
        ]));
    }

    public function getBySlug(string $slug_cidade)
    {
        $sql = 'SELECT nome_cidade FROM cidade WHERE slug_cidade = :slug_cidade';

        return $this->collection($this->pdo->ExecuteQueryOneRow($sql, [
            ':slug_cidade' => $slug_cidade
        ]));
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM cidade ORDER BY nome_cidade ASC';

        $dt = $this->pdo->ExecuteQuery($sql);

        $list = [];

        foreach ($dt as $dr)
            $list[] = $this->collection($dr);

        return $list;
    }

    private function collection($param)
    {
        return new Cidade(
            $param['id_cidade'] ?? null,
            $param['nome_cidade'] ?? null,
            $param['slug_cidade'] ?? null
        );
    }
}