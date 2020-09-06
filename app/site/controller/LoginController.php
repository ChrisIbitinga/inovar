<?php

namespace app\site\controller;
use app\core\Controller;
use app\site\entitie\Usuario;
use app\site\model\UsuarioModel;

class LoginController extends Controller
{

  private $usuarioStatus;
  
  public function __construct()
    /**
     * __construct
     * 
     * @return void
     */
    {
      $this->usuarioStatus = new Usuario();
      
    }
    /**
     * index
     * 
     * @return void
     */
    public function index()
    {
    	
    	$this->view('login/login', [
        'usuarios' => $this->usuarioStatus->getStatus(),
      ]);

    }
    public function cadastrar()
    {
    	$this->view('login/cadastro');
    }



    // INSERT 
    public function insert()
    {
     $usuario = $this->getInput();

     if (!$this->validate($usuario, false, true))
     {
      $this->showMessage('Formulário inválido', 'Os dados fornecidos contem erros...', 422);
      return;
    }

    $usuario->setSenha(passwordHash($usuario->getSenha()));


    $usuarioModel = new UsuarioModel();

// VALIDA SE O EMAIL JÀ FOI CADASTRADO
    if($usuarioModel->checaEmailExiste($usuario->getEmail()))
    {
      $this->showMessage('Erro ao cadastrar email', 'Este e-mail não está disponivel, tente outro...', 422);
      return;
    }

// TENTA CADASTRAR 
    if(!$usuarioModel->insert($usuario))
    {
      $this->showMessage('Erro ao cadastrar', 'Houve um erro ao tentar cadastrar...', 500);
      return;
    }

    $this->showMessage('Usuário cadastrado', 'O cadastro do usuário foi realizado com sucessoo...', 200);
  }


  private function getInput($id = null)
  {
    return new Usuario
    (
      filter_var($id, FILTER_SANITIZE_NUMBER_INT),
      post('txtNome'),
      post('txtEmail'),
      post('txtSenha'),
    1 , // Ativo
    null
  );
  }


  private function validate(Usuario  $usuario, bool $validateId = false, bool $validatePass = false)
  {
    if($validateId && $usuario->getId() <= 0)
      return false;

    if (strlen($usuario->getNome()) <= 5) 
      return false;

    if(!preg_match('/.+@.+\..+/', $usuario->getEmail()))
      return false;

    if ($validatePass && strlen($usuario->getSenha()) < 7) 
      return false;

    return true;
  }

  public function auth()
  {

    $email = strtolower(trim(post('txtEmail')));
    $autent = (new UsuarioModel())->dadosPorNivel($email);
    $nivel = end($autent);


    if($nivel != 'admin'){
      \app\classes\Session::setValue('logged' , true);
      redirect(BASE);
    }else{
      $senha = post('txtSenha');
      $usuario = (new UsuarioModel())->dadosPorEmail($email);

      if(!password_verify($senha, $usuario->getSenha()))
      {
       $this->showMessage('Login inválido', 'E-mail ou senha inválidos, tente novamente...', 422);
       return;
     }
     
     $nome = explode(' ', $usuario->getNome());

     \app\classes\Session::setValue('id', $usuario->getId());
     \app\classes\Session::setValue('nome', mb_substr($nome[0], 0, 10));
     \app\classes\Session::setValue('logged' , true);
     \app\classes\Session::setValue('ip' , $_SERVER['REMOTE_ADDR']);




     redirect(BASE. 'dashboard/');

   }



 }//end auth

 public function logout()
 {
  \app\classes\Session::destroy();
  redirect(BASE. 'login/');
}

public function editar()
{
  \app\classes\Security::protect();
  $this->view('login/editar', [
    'usuario' => (new UsuarioModel())->obterPorId(\app\classes\Session::getValue('id'))
  ]);
}
public function senha()
{
  \app\classes\Security::protect();
  $this->view('login/redefinir-senha');
}
public function updatePassword()
{
  \app\classes\Security::protect();

  $pass = passwordHash(post('txtSenha'));
  $usuarioId =  \app\classes\Session::getValue('id');

  if(!(new UsuarioModel())->updatePassword($pass, $usuarioId))
  {
    $this->showMessage('Erro ao tentar alterar senha', 'Dados inválidos, não foi possível alterar a senha, tente novamente',  500);
    return;
  }
  $this->showMessage('Alterado com sucesso', 'Senha redefinida, faça o logout e o login novamente para salvar todas alterações',  200);
}

public function update()
{
 $usuario = $this->getInput(\app\classes\Session::getValue('id'));

 if (strlen($usuario->getNome()) <= 5)
 {
   $this->showMessage('Erro ao tentar alterar', 'Houve um erro ao tentar alterar o nome...', 422);
   return;
 }

// TENTA ALTERAR 
 if(!(new UsuarioModel)->update($usuario))
 {
  $this->showMessage('Erro ao cadastrar', 'Houve um erro ao tentar cadastrar...', 500);
  return;
}

$this->showMessage('Usuário alterado', 'O nome de usuário foi alterado com sucesso, faça o login novamente para atualizar as informações', 200);
}








}