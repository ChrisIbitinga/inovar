<?php

namespace app\site\model;

use app\site\entitie\Tipo;

use app\core\Model;

class TipoModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new Model();
    }

    public function insert(Tipo $tipo)
    {
        $sql = 'INSERT INTO tipo (nome_tipo, slug_tipo) VALUES (:nome_tipo, :slug_tipo)';
        $params  = [
            ':nome_tipo' => $tipo->getNome(),
            ':slug_tipo' => $tipo->getSlug()
        ];

        if (!$this->pdo->ExecuteNonQuery($sql, $params))
            return -1;

        return $this->pdo->GetLastID();
    }

    public function update(Tipo $tipo)
    {
        $sql = 'UPDATE tipo SET nome_tipo = :nome_tipo, slug_tipo = :slug_tipo WHERE id_tipo = :id_tipo';
        $params  = [
            ':id_tipo'   => $tipo->getId(),
            ':nome_tipo' => $tipo->getNome(),
            ':slug_tipo' => $tipo->getSlug()
        ];

        return $this->pdo->ExecuteNonQuery($sql, $params);
    }

    public function getById(int $id_tipo)
    {
        $sql = 'SELECT * FROM tipo WHERE id_tipo = :id_tipo';

        return $this->collection($this->pdo->ExecuteQueryOneRow($sql, [
            ':id_tipo' => $id_tipo
        ]));
    }

      public function getPorId($id_imovel)
    {
          $sql = 'SELECT DISTINCT t.id_tipo, t.nome_tipo, i.id, i.id_tipo FROM tipo t
          inner join imovel i
          on t.id_tipo = i.id_tipo
           WHERE i.id = :id_imovel';

           return $this->collection($this->pdo->ExecuteQueryOneRow($sql, [
            ':id_imovel' => $id_imovel
        ]));

    }

    public function getBySlug(string $slug_tipo)
    {
        $sql = 'SELECT nome_tipo FROM tipo WHERE slug_tipo = :slug_tipo';

        return $this->collection($this->pdo->ExecuteQueryOneRow($sql, [
            ':slug_tipo' => $slug
        ]));
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM tipo ORDER BY nome_tipo ASC';



        $dt = $this->pdo->ExecuteQuery($sql);

        $list = [];

        foreach ($dt as $dr)
            $list[] = $this->collection($dr);

        return $list; dd($list);
    }

    private function collection($param)
    {
        return new Tipo(
            $param['id_tipo'] ?? null,
            $param['nome_tipo'] ?? null,
            $param['slug_tipo'] ?? null
        );
    }
}
