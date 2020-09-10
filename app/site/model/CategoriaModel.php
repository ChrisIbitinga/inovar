<?php

namespace app\site\model;

use app\site\entitie\Categoria;
use app\site\entitie\Imovel;

use app\core\Model;

class CategoriaModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new Model();
    }

    public function insert(Categoria $categoria)
    {
        $sql = 'INSERT INTO categoria (nome_categoria, slug_categoria) VALUES (:nome_categoria, :slug_categoria)';
        $params  = [
            ':nome_categoria' => $categoria->getNome(),
            ':slug_categoria' => $categoria->getSlug()
        ];

        if (!$this->pdo->ExecuteNonQuery($sql, $params))
            return -1;

        return $this->pdo->GetLastID();
    }

    public function update(Categoria $categoria)
    {
        $sql = 'UPDATE categoria SET nome_categoria = :nome_categoria, slug_categoria = :slug_categoria WHERE id_categoria = :id_categoria';
        $params  = [
            ':id_categoria' => $categoria->getId(),
            ':nome_categoria' => $categoria->getNome(),
            ':slug_categoria' => $categoria->getSlug()
        ];

        return $this->pdo->ExecuteNonQuery($sql, $params);
    }

    public function getPorId($id_imovel)
    {
          $sql = 'SELECT DISTINCT c.id_categoria, c.nome_categoria, i.id, i.id_categoria FROM categoria c
          inner join imovel i
          on c.id_categoria = i.id_categoria
           WHERE i.id = :id_imovel';

           return $this->collection($this->pdo->ExecuteQueryOneRow($sql, [
            ':id_imovel' => $id_imovel
        ]));

    }


    public function getById(int $id_categoria)
    {
        $sql = 'SELECT * FROM categoria WHERE id_categoria = :id_categoria';

        return $this->collection($this->pdo->ExecuteQueryOneRow($sql, [
            ':id_categoria' => $id_categoria
        ]));
    }

    public function getBySlug(string $slug_categoria)
    {
        $sql = 'SELECT nome_categoria FROM categoria WHERE slug_categoria = :slug_categoria';

        return $this->collection($this->pdo->ExecuteQueryOneRow($sql, [
            ':slug_categoria' => $slug_categoria
        ]));
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM categoria ORDER BY nome_categoria ASC';

        $dt = $this->pdo->ExecuteQuery($sql);

        $list = [];

        foreach ($dt as $dr)
            $list[] = $this->collection($dr);

        return $list;
    }

    private function collection($param)
    {
        return new Categoria(
            $param['id_categoria'] ?? null,
            $param['nome_categoria'] ?? null,
            $param['slug_categoria'] ?? null,
            new Imovel(
             $param['id'] ?? null,
            )

        );
    }
}