<?php

if (preg_match('/\.(?:png|jpg|jpeg|gif)$/', $_SERVER["REQUEST_URI"])) {
	return false;
} else {
	session_start();

	/*Definir as constantes*/
	define("DEFAULT_CONTROLLER", "home");
	define("ROOT", dirname(__FILE__));

	/*Carregar o sistema*/
	require "../vendor/autoload.php";
	require "../App/functions/helpers.php";
	require "../App/functions/functionsTwig.php";
	require "../bootstrap.php";

	/*$loader = new \Twig_Loader_Filesystem(ROOT . '/App/Views');
		    $twig = new \Twig_Environment($loader, [
		    'debug' => true,
		    'cache' => ROOT . '/Cache',
		    'auto_reload' => true,
		    ]);

		    $dados = ['titulo' => 'Erro404'];
		    $template = $twig->loadTemplate('Erro/erro404.html');
	*/
	//var_dump($twig);

}
?>