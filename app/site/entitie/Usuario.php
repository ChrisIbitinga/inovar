<?php

namespace app\site\entitie;

class Usuario{

    private $id;
    private $nome;
    private $email;
    private $senha;
    private $status;
    private $token;
    private $nivel;

    //Constructor
    public function __construct ($id = null, $nome = '', $email = '', $senha = '', $status = 2, $token = null, $nivel = 'user'){
        $this->id     = $id;
        $this->nome   = $nome;
        $this->email  = strtolower($email);
        $this->senha  = $senha;
        $this->status = $status;
        $this->token  = $token;
        $this->nivel  = $nivel;
    }
    
    public function setSenha(string $senha){
        $this->senha = $senha;
    }
    
    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getEmail(){
        return strtolower($this->email);
    }

    public function getSenha(){
        return $this->senha;
    }

    public function getStatus(){
        return $this->status;
    }

    public function getToken(){
        return $this->token;
    }
    public function getNivel(){
        return $this->nivel;
    }

}







