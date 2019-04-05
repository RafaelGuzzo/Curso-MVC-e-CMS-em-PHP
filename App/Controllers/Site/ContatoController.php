<?php
namespace App\Controllers\Site;
use \Acme\Classes\Email as Email;
use \App\Controllers\BaseController as BaseController;

class ContatoController extends BaseController {
	public function enviar() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
			$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
			$assunto = filter_var($_POST['assunto'], FILTER_SANITIZE_STRING);
			$mensagem = filter_var($_POST['mensagem'], FILTER_SANITIZE_STRING);

			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$enviarEmail = new Email();
				$enviarEmail->setAssunto($assunto);
				$enviarEmail->setQuem($nome);
				$enviarEmail->setPara('rafaajuda@hotmail.com');
				$enviarEmail->setBody($mensagem);

				if ($enviarEmail->enviarEmail()) {
					$dados = ['mensagem' => 'Email enviado com sucesso'];
				} else {
					$dados = ['mensagem' => 'Falha ao enviar email'];

				}

			} else {
				$dados = ['mensagem' => 'Email Invalido'];
			}
			$template = $this->twig->loadTemplate('Site/contato.html');
			$template->display($dados);
		} else {
			$this->index();
		}

	}

	public function index() {
		$dados = ['titulo' => 'Pagina de Contato'];
		$template = $this->twig->loadTemplate('Site/contato.html');
		$template->display($dados);
	}

	public function teste($teste) {
		var_dump($teste);
	}
}