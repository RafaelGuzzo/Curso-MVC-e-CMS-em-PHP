<?php
//carregar o template
$template = new App\Classes\LoadTemplate();
$twig = $template->init();

$twig->addFunction($message);
//definir variavel global no twig
$twig->addGlobal("session", $_SESSION);
//definir o timezone do projeto
$twig->getExtension('Twig_Extension_Core')->setTimeZone('America/Sao_Paulo');
$twig->getExtension('Twig_Extension_Core')->setDateFormat('d/m/Y');

//chamar o base controler para pegar os controler e metodos
$baseController = new \App\Controllers\BaseController();

//aqui pega os controllers
$controller = $baseController->pegarController();
$classController = new $controller();
$classController->setTwig($twig);

try {
	//pegar o metodo
	$metodo = $baseController->pegarMetodo($classController);
	$parameter = $baseController->parameter();
	$classController->$metodo($parameter);
} catch (\Throwable $e) {
	dd($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine());
}

?>