<?php
namespace App\Controllers\Site;
use \App\Controllers\BaseController as BaseController;

class SobreController extends BaseController {
	public function index() {
		$dados = ['titulo' => 'Pagina Sobre'];
		$template = $this->twig->loadTemplate('Site/sobre.html');
		$template->display($dados);
	}
}
?>