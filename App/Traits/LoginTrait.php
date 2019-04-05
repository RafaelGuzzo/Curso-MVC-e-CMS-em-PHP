<?php
namespace Acme\Traits;
use \Acme\Classes\Redirect as Redirect;

trait LoginTrait {
	private $campo;

	private $campos;

	private $db;

	private $sqlCampo;

	public static function deslogar($sessao) {
		if (isset($_SESSION[$sessao])) {
			unset($_SESSION[$sessao]);
			session_regenerate_id();
		}
	}

	public static function estaLogado($sessao, $redirect) {
		if (!isset($_SESSION[$sessao])) {
			Redirect::to($redirect);
		}
	}

	public function logarSistema($email, $senha) {
		foreach ($this->campos as $campo) {
			$this->campo .= $campo . '=? and ';
		}

		$this->sqlCampo = rtrim($this->campo, 'and ');

		$dadosUserLogado = $this->db->find('first', ['conditions' => [$this->sqlCampo, $email, $senha]]);
		return $dadosUserLogado;
	}

	public function setCampos($campos) {
		$this->campos = $campos;

	}

	public function setDb($db) {
		$this->db = $db;

	}
}
?>