<?php
namespace App\Classes;
use \PHPMailer\PHPMailer\PHPMailer as PHPMailer;

class Email extends PHPMailer {
	private $assunto;

	private $body;

	private $copia;

	private $email;

	private $mensagem;

	private $para;

	private $quem;

	public function enviarEmail() {
		$this->isSMTP();
		$this->CharSet = 'UTF-8'; // Set mailer to use SMTP
		$this->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
		$this->SMTPAuth = true; // Enable SMTP authentication
		$this->Username = 'rafael.guzzo@univel.br'; // SMTP username
		$this->Password = 'agbdlcid123'; // SMTP password
		$this->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
		$this->Port = 587; // TCP port to connect to

		//Recipients
		$this->setFrom('from@example.com', 'Mailer');
		$this->FromName = $this->quem;
		$this->addAddress($this->para); // Add a recipient
		if (!empty($copia)) {
			$this->addAddress($copia);
		}
		//Content
		$this->isHTML(true); // Set email format to HTML
		$this->Subject = $this->assunto;
		$this->MsgHTML($this->body);

		if (!$this->send()) {
			return false;
		} else {
			return true;
		}
	}

	public function setAssunto($assunto) {
		$this->assunto = $assunto;
	}

	public function setBody($body) {
		$this->body = $body;
	}

	public function setCopia($copia) {
		$this->copia = $copia;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function setMensagem($mensagem) {
		$this->mensagem = $mensagem;
	}

	public function setPara($para) {
		$this->para = $para;
	}

	public function setQuem($quem) {
		$this->quem = $quem;
	}
}
?>