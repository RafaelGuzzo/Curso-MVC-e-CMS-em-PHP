<?php
namespace App\Core;
use App\Classes\Url;

class CoreController {
	public function controller() {

		$url = Url::getUrl();

		if ($url != '/') {

			return $this->retornoControllerMetodo($url);
		}

		return ['controller' => DEFAULT_CONTROLLER];

	}

	private function retornoControllerMetodo($url) {
		$controller = substr($url, 1);
		if (substr_count($controller, '/') >= 1) {
			list($controller, $method, $parameter) = explode('/', $controller . '/');

			return [
				'controller' => $controller,
				'method' => $method,
				'parameter' => $parameter,
			];

		}

		return ['controller' => $controller];
	}
}

?>