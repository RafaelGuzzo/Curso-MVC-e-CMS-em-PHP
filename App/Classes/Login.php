<?php
namespace App\Classes;
use App\Classes\Hash;
use App\Models\Model;

class Login {
	public function logar($email, $password, Model $model) {

		$dados = $model->find('email', $email);

		if (!$dados) {
			return false;
		}

		$senha = Hash::criarSenha($password, $dados->salt);

		if (count($dados) == 1 and $senha == $dados->senha) {
			$_SESSION[$model->logado] = true;
			$_SESSION[$model->dados] = $dados;

			session_regenerate_id();
			return true;
		}

		return false;
	}
}
?>