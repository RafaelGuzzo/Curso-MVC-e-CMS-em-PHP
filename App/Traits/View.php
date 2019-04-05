<?php
namespace App\Traits;

trait View {
	public function view($view, $dados) {
		//posso chamar o twig aqui pq no base controle to importando ele
		$template = $this->twig->loadTemplate(str_replace('.', '/', $view) . '.html');

		return $template->display($dados);
	}
}
?>