<?php
namespace App\Controllers\Site;
use \App\Controllers\BaseController as BaseController;

class ProdutosController extends BaseController {
	public function index() {

		$dados = ['titulo' => 'Pagina de Produtos'];
		$template = $this->twig->loadTemplate('Site/produtos.html');
		$template->display($dados);
	}
}
?>