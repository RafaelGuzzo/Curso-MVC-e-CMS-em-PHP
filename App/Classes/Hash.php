<?php
namespace App\Classes;

class Hash {
	public static function criarSalt() {
		return base64_encode(md5(uniqid(), true));
	}

	public static function criarSenha($senha, $salt) {
		return crypt($senha, $salt);
	}

	public static function verificarSenha($inputSenha, $senhaEncriptada) {
		if (crypt($inputSenha, $senhaEncriptada) == $senhaEncriptada) {
			return true;
		}
		return false;
	}
}

?>