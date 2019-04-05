<?php
namespace App\Traits;
use App\Classes\Load;

trait Controller {
	public function parameter() {
		return $this->controller()['parameter'] ?? '';
	}

	public function pegarController() {

		$folders = Load::load('controllers');
		//ucfirst deixa primeira letra maiuscula, retornar o valor do array no indice controller
		$this->controller = ucfirst($this->controller()['controller']) . 'Controller';
		//passa pelas pastas para localizar o controller
		foreach ($folders->folders as $folder) {
			if (class_exists("\\App\\Controllers\\" . $folder . "\\" . $this->controller)) {
				return "\\App\\Controllers\\" . $folder . "\\" . $this->controller;
			}
		}

		return "\\App\\Controllers\\Erro\\NotFoundController";
	}

	public function pegarMetodo($object) {
		if (!isset($this->controller()['method'])) {
			return 'index';
		}

		if (!method_exists($object, $this->controller()['method'])) {
			throw new \Exception("Esse metodo nao existe");
		}

		return $this->controller()['method'];
	}
}

?>