<?php 

namespace app\site\model;

use app\site\entitie\Foto;
use app\site\entitie\Imovel;

use app\core\Model;



class FotoModel
{

	private $pdo;

	public function __construct()
	{
		$this->pdo = new Model();
	}



	public function insert(Foto $foto)
	{
		$sql = 'INSERT INTO foto (nome_foto, id_imovel) VALUES (:nome_foto, :id_imovel) ';
		$params  = [
			':nome_foto' => $foto->getNomeFoto(),
			':id_imovel' => $foto->getIdImovel()
		];


		if (!$this->pdo->ExecuteNonQuery($sql, $params))
			return -1;

		return $this->pdo->GetLastID();
	}

	public function updateFoto(string $foto, int $idImovel)
	{
		$sql = 'UPDATE foto SET nome_foto = :nome_foto, id_imovel = :id_imovel WHERE id_foto = :id_foto';
		$params  = [
			':id_foto' => $foto->getIdFoto(),
			':nome_foto' => $foto->getNomeFoto(),
			':id_imovel' => $foto->getIdImovel()
		];

		return $this->pdo->ExecuteNonQuery($sql, $params);
	}

	public function getFotoById(int $idImovel, int $userId)
{
  $sql = 'SELECT id_foto, nome_foto, id_imovel FROM foto WHERE id_imovel = :imovelid';

  $dr = $this->pdo->ExecuteQueryOneRow($sql, [
    ':imovelid' => $idImovel
  ]);

  return (object)[
    'id_foto'    => $dr['id_foto'] ?? null,
    'nome_foto' => $dr['nome_foto'] ?? null
  ];
}

	public function getById(int $id_foto)
	{
		$sql = 'SELECT * FROM foto WHERE id_foto = :id_foto';

		return $this->collection($this->pdo->ExecuteQueryOneRow($sql, [
			':id_foto' => $id_foto
		]));
	}

	public function getPorId($id_imovel)
	{
		$sql = 'SELECT  o.id_foto, o.nome_foto, o.id_imovel, i.id  FROM foto o
		inner join imovel i
		on o.id_imovel = i.id
		WHERE i.id = :id_imovel';

		$param = [
			':id_imovel'   => $id_imovel
		];

		$dt = $this->pdo->ExecuteQuery($sql, $param);
		$list = [];

		foreach ($dt as $dr)
			$list[] = $dr;

		return $list;

	}


	public function getFotos($id_imovel)
	{
		$sql = 'SELECT * FROM foto WHERE id_imovel = :id_imovel';
		$param = [
			':id_imovel'   => $id_imovel
		];

		$dt = $this->pdo->ExecuteQuery($sql, $param);
		$list = [];

		foreach ($dt as $dr)
			$list[] = $dr;

		return $list;
		dd($list);
	}

	private function collection($param)
	{
		return new Foto(
			$param['id_foto'] ?? null,
			$param['nome_foto'] ?? null,
			$param['id_imovel'] ?? null
		);
	}









}


