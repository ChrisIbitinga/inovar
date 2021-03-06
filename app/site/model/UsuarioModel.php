<?php

namespace app\site\model;

use app\site\entitie\Usuario;

use app\core\Model;

class UsuarioModel
{
    private $pdo;
    private $dadosUser;

    public function __construct()
    {
        $this->pdo = new Model();

    }

    public function insert(Usuario $usuario)
    {
        $sql = 'INSERT INTO usuario (nome, email, senha, status, nivel) VALUES (:nome, :email, :senha, :status,:nivel)';

        $params = [
            ':nome'   => $usuario->getNome(),
            ':email'  => $usuario->getEmail(),
            ':senha'  => $usuario->getSenha(),
            ':status' => $usuario->getStatus(),
            ':nivel'  =>  $usuario->getNivel()
        ];

        return $this->pdo->ExecuteNonQuery($sql, $params);
    }

    public function update(Usuario $usuario)
    {
        $sql = 'UPDATE usuario SET nome = :nome WHERE id = :id';

        $params = [
            ':id'  => $usuario->getId(),
            ':nome'   => $usuario->getNome()
        ];

        return $this->pdo->ExecuteNonQuery($sql, $params);
    }

    public function updatePasswordByToken(string $senha, string $token)
    {
        $sql = 'UPDATE usuario SET senha = :senha, token = null WHERE token = :token';

        $params = [
            ':token' => $token,
            ':senha' => $senha
        ];

        return $this->pdo->ExecuteNonQuery($sql, $params);
    }

    public function updatePassword(string $senha, int $usuarioId)
    {
        $sql = 'UPDATE usuario SET senha = :senha WHERE id = :usuarioid';

        $params = [
            ':usuarioid' => $usuarioId,
            ':senha'     =>$senha
        ];

        return $this->pdo->ExecuteNonQuery($sql, $params);
    }

    public function updateToken(int $id, string $token){
        $sql = 'UPDATE usuario SET token = :token WHERE id = :id';
        $params = [
            ':token' => $token,
            ':id' => $id
        ];

        return $this->pdo->ExecuteNonQuery($sql, $params);
    }

    public function checaEmailExiste(string $email)
    {
        $sql = 'SELECT id FROM usuario WHERE email = :email';

        $dr = $this->pdo->ExecuteQueryOneRow($sql, [
            ':email' => $email
        ]);

        if (isset($dr['id']))
            return true;

        return false;
    }

    public function obterPorId(int $usuarioId)
    {
        $sql = 'SELECT nome, email FROM usuario WHERE id = :id';

        $dr = $this->pdo->ExecuteQueryOneRow($sql, [
            ':id' => $usuarioId
        ]);

        return $this->collection($dr);
    }

    public function dadosPorEmail(string $email)
    {
        $sql = 'SELECT id, nome, senha, email FROM usuario WHERE email = :email AND status = :status';

        $dr = $this->pdo->ExecuteQueryOneRow($sql, [
            ':email'  => $email,
            ':status' => 1
        ]);

        return $this->collection($dr);
    }

    public function dadosPorNivel(string $email)
    {

        $sql = 'SELECT id, nome, email, senha, status, nivel FROM usuario WHERE email = :email AND status = :status';

        $dr = $this->pdo->ExecuteQueryOneRow($sql, [
            ':email'  => $email,
            ':status' => 1,

        ]);

        return $this->collection($dr);
    }
    
    /**
     * Retorna os dados do usuário através do e-mail para redefinir sua senha
     *
     * @param  string $email
     * @return Usuario
     */
    public function dadosPorEmailRedefinir(string $email)
    {
        $sql = 'SELECT id, nome, email FROM usuario WHERE email = :email AND status = :status';

        $dr = $this->pdo->ExecuteQueryOneRow($sql, [
            ':email'  => $email,
            ':status' => 1
        ]);

        return $this->collection($dr);
    }
    public function getUsuarios()
    {
        $sql = 'SELECT * FROM usuario ORDER BY nome DESC';

        $dt = $this->pdo->ExecuteQuery($sql);

        $list = [];

        foreach ($dt as $dr)
            $list[] = $this->collection($dr);

        return $list;
    }


    public function getAll()
    {
        $sql = 'SELECT * FROM usuario ORDER BY nome ASC';



        $dt = $this->pdo->ExecuteQuery($sql);

        $list = [];

        foreach ($dt as $dr)
            $list[] = $this->collection($dr);

        return $list; dd($list);
    }
    private function collection($param)
    {
        return new Usuario(
            $param['id'] ?? null,
            $param['nome'] ?? null,
            $param['email'] ?? null,
            $param['senha'] ?? null,
            $param['status'] ?? null,
            $param['token'] ?? null,
            $param['nivel'] ?? null
        );
    }
}