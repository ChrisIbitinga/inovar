<?php

namespace app\site\model;

use app\site\entitie\Imovel;
use app\site\entitie\Tipo;
use app\site\entitie\Finalidade;
use app\site\entitie\Categoria;
use app\site\entitie\Cidade;
use app\site\entitie\Usuario;

use app\core\Model;

class ImovelModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new Model();
    }



    //  to be continued

    public function insert(Imovel $imovel)
    {
        $sql = 'INSERT INTO imovel 
        (id_tipo, id_destinacao, id_categoria, id_usuario, id_cidade, data_cadastro, endereco, numero, valor, bairro,  sala, quarto, banheiro, garagem, slug, adicionais, status, thumb)
        VALUES 
        (:idtipo, :iddestinacao, :idcategoria, :idusuario, :idcidade, :datacadastro, :endereco,

        :numero, :valor, :bairro, :sala, :quarto, :banheiro, :garagem, :slug, :adicionais, :status, :thumb)';


        $params  = [
            ':idtipo'       => $imovel->getIdTipo()->getId(),
            ':iddestinacao' => $imovel->getIdDestinacao()->getId(),
            ':idcategoria'  => $imovel->getIdCategoria()->getId(),
            ':idusuario'    => $imovel->getIdUsuario()->getId(),
            ':idcidade'     => $imovel->getIdCidade()->getId(),
            ':datacadastro' => $imovel->getDataCadastro(),
            ':endereco'     => $imovel->getEndereco(),
            ':numero'       => $imovel->getNumero(),
            ':valor'        => $imovel->getValor(),
            ':bairro'       => $imovel->getBairro(),
            ':sala'         => $imovel->getSala(),
            ':quarto'       => $imovel->getQuarto(),
            ':banheiro'     => $imovel->getBanheiro(),
            ':garagem'      => $imovel->getGaragem(),
            ':slug'         => $imovel->getSlug(),
            ':adicionais'   => $imovel->getAdicionais(),
            ':status'       => $imovel->getStatus(),
            ':thumb'        => $imovel->getThumb()
        ];
        

        if (!$this->pdo->ExecuteNonQuery($sql, $params))
            return -1;

        return $this->pdo->GetLastID();
    }

    public function update(Imovel $imovel, int $userId)
    {
        $sql = 'UPDATE imovel SET
        id_tipo = :idtipo, id_destinacao = :iddestinacao, id_categoria = :idcategoria, id_usuario =:idusuario, id_cidade = :idcidade, data_cadastro = :datacadastro, endereco = :endereco, numero = :numero, valor = :valor, bairro = :bairro, sala =:sala, quarto = :quarto, banheiro = :banheiro, garagem = :garagem, slug = :slug, adicionais = :adicionais, status = :status WHERE id = :id';
        $params  = [
           ':idtipo'        => $imovel->getTipo()->getId(),
           ':iddestinacao'  => $imovel->getFinalidade()->getId(),
           ':idcategoria'   => $imovel->getCategoria()->getId(),
           ':idusuario'     => $userId,
           ':idcidade'      => $imovel->getCidade()->getId(),
           ':datacadastro'  => $imovel->getDataCadastro(),
           ':endereco'      => $imovel->getEndereco(),
           ':numero'        => $imovel->getNumero(),
           ':valor'         => $imovel->getValor(),
           ':bairro'        => $imovel->getBairro(),
           ':sala'          => $imovel->getSala(),
           ':quarto'        => $imovel->getQuarto(),
           ':banheiro'      => $imovel->getBanheiro(),
           ':garagem'       => $imovel->getGaragem(),
           ':slug'          => $imovel->getSlug(),
           ':adicionais'    => $imovel->getAdicionais(),
           ':status'        => $imovel->getStatus()
       ];

       return $this->pdo->ExecuteNonQuery($sql, $params);
   }

   public function updateThumb(string $thumb, int $idImovel, int $userId)
   {
    $sql = 'UPDATE imovel SET thumb = :thumb WHERE id = :imovelid AND id_usuario = :usuarioid';
    $params = [
        ':imovelid'   => $idImovel,
        ':thumb'     => $thumb,
        ':usuarioid' => $userId
    ];

    return $this->pdo->ExecuteNonQuery($sql, $params);
}


public function getThumbById(int $idImovel, int $userId)
{
    $sql = 'SELECT id, thumb FROM imovel WHERE id = :imovelid AND id_usuario = :usuarioid';

    $dr = $this->pdo->ExecuteQueryOneRow($sql, [
        ':imovelid' => $idImovel,
        ':usuarioid' => $userId
    ]);

    return (object)[
        'id'    => $dr['id'] ?? null,
        'thumb' => $dr['thumb'] ?? null
    ];
}

public function getSlugImovel(string $slug)
{

   $sql = 'SELECT i.id, i.id_tipo, i.id_destinacao, i.id_categoria, i.id_usuario, i.id_cidade, i.data_cadastro, i.endereco,
   i.numero, i.valor, i.bairro, i.sala, i.quarto, i.banheiro, i.garagem, i.slug, i.adicionais, i.status, i.thumb, 
   t.id_tipo, t.nome_tipo,
   f.id_finalidade, f.nome_finalidade,
   c.id_categoria, c.nome_categoria, 
   u.id, u.id,
   d.id_cidade,  d.nome_cidade
   from imovel i
   inner join tipo t
   inner join finalidade f
   inner join categoria c 
   inner join usuario u  
   inner join cidade d
   on c.id_categoria = i.id_categoria
   WHERE LOWER(c.slug_categoria) = :slug AND i.status = :status ORDER BY i.data_cadastro' ;

   $param = [
    ':slug'   => $slug,
            ':status' => 1//ativo
        ];
        
        $dt = $this->pdo->ExecuteQuery($sql, $param);

        $list = [];

        foreach ($dt as $dr)
            $list[] = $this->collection($dr);

        return $list;
    }




    public function getById(int $id)
    {
        $sql = 'SELECT * FROM imovel WHERE id = :id';

        return $this->collection($this->pdo->ExecuteQueryOneRow($sql, [
            ':id' => $id
        ]));
    }


    public function getAll()
    {
        $sql = 'SELECT * FROM imovel ORDER BY data_cadastro DESC';

        $dt = $this->pdo->ExecuteQuery($sql);

        $list = [];

        foreach ($dt as $dr)
            $list[] = $this->collection($dr);

        return $list;
    }

    public function getBySlug(string $slug)
    {
     $sql = 'SELECT DISTINCT i.id, i.data_cadastro, i.endereco, i.numero, i.valor, i.bairro, i.sala, i.quarto, i.banheiro, i.garagem, i.slug, i.adicionais, i.status, i.thumb,
         t.nome_tipo as tipo_nome, 
         f.nome_finalidade as finalidade_nome, 
         c.nome_categoria as  categoria_nome, 
         u.nome as usuario_nome, 
         d.nome_cidade as cidade_nome
     FROM imovel i  
     inner join tipo t
     ON t.id_tipo  = i.id_tipo 
     inner join finalidade f
     ON f.id_finalidade  = i.id_destinacao
     inner join categoria c
     ON c.id_categoria = i.id_categoria 
     inner join usuario u  
     ON u.id  = i.id_usuario
     inner join cidade d
     ON d.id_cidade  = i.id_cidade
     WHERE LOWER(i.slug) =  :slug
     GROUP BY id_destinacao

     ';
     $params = [
        ':slug' => $slug
    ];

    $dr = $this->pdo->ExecuteQueryOneRow($sql, $params);

    return $this->collection($dr);


}





public function getLasts(int $quantidade = 12)

{


$sql = 'SELECT DISTINCT i.id, i.data_cadastro, i.endereco, i.numero, i.valor, i.bairro, i.sala, i.quarto, i.banheiro, i.garagem, i.slug, i.adicionais, i.status, i.thumb,
         t.nome_tipo as nome_tipo, 
         f.nome_finalidade as nome_finalidade, 
         c.nome_categoria as  nome_categoria, 
         u.nome as nome_usuario, 
         d.nome_cidade as nome_cidade
     FROM imovel i  
     inner join tipo t
     ON t.id_tipo  = i.id_tipo 
     inner join finalidade f
     ON f.id_finalidade  = i.id_destinacao
     inner join categoria c
     ON c.id_categoria = i.id_categoria 
     inner join usuario u  
     ON u.id  = i.id_usuario
     inner join cidade d
     ON d.id_cidade  = i.id_cidade
      where i.status = :status
    group by i.data_cadastro
    ASC LIMIT :quantidade';


    $param = [
        ':quantidade'   => $quantidade,
            ':status' => 1//ativo
        ];
        
        $dt = $this->pdo->ExecuteQuery($sql, $param);

        $list = [];

        foreach ($dt as $dr)
            $list[] = $this->collection($dr);

        return $list;




    }


    private function collection($param)
    {
        return new Imovel(
            $param['id'] ?? null,
            new Tipo(
              $param['id_tipo'] ?? null,
              $param['nome_tipo'] ?? null
          ),
            new Finalidade(
             $param['id_finalidade'] ?? null,
              $param['nome_finalidade'] ?? null
          ),
           new Categoria(
               $param['id_categoria'] ?? null,
              $param['nome_categoria'] ?? null
            ),
            new Usuario(
             $param['id_usuario'] ?? null,
              $param['nome_usuario'] ?? null
          ),
            new Cidade(
              $param['id_cidade'] ?? null,
              $param['nome_cidade'] ?? null
          ),

            
            $param['data_cadastro'] ?? null,
            $param['endereco'] ?? null,
            $param['numero'] ?? null,
            $param['valor'] ?? null,
            $param['bairro'] ?? null,
            $param['sala'] ?? null,
            $param['quarto'] ?? null,
            $param['banheiro'] ?? null,
            $param['garagem'] ?? null,
            $param['slug'] ?? null,
            html_entity_decode($param['adicionais'] ?? null),
            $param['status'] ?? null,
            $param['thumb'] ?? null,

        );
    }
}
