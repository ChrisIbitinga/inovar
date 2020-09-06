<?php

namespace app\core;

class  Controller
{
	protected function view(string $view, $param = [])
	{
		$loader = new \Twig\Loader\FilesystemLoader('../app/site/view/');
		$twig  = new \Twig\Environment($loader, []);

        $twig->addGlobal('BASE', BASE);
        $twig->addGlobal('HOST', HOST);
        $twig->addGlobal('DATE_TIME', DATE_TIME);

        $twig->addGlobal('userName', \app\classes\Session::getValue('nome'));
        $twig->addGlobal('userNivel', \app\classes\Session::getValue('$userNivel'));
        $twig->addGlobal('wellcome',  ' Olá ');

       $twig->addGlobal('indentiteUser', \app\classes\Session::getValue('id'));

		echo $twig->render($view . '.twig.php', $param);
	}

	protected function showMessage(string $title, string $message, int $httpcode = 404)
	{
        http_response_code($httpcode);
		$this->view('partials/message',[
			'title'    => $title,
            'message'  => $message,
            'httpcode' => $httpcode 

		]);
	}
}
