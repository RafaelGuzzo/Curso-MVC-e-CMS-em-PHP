<?php
namespace App\Classes;
class LoadTemplate {
	/**
	 * @var mixed
	 */
	private $loader;

	/**
	 * @var mixed
	 */
	private $twig;

	/**
	 * @return mixed
	 */
	public function init() {

		$this->twig = new \Twig_Environment($this->loader(), [
			'debug' => true,
			//'cache' => ROOT . '/Cache',
			'auto_reload' => true,
		]);

		return $this->twig;
	}

	/**
	 * @return mixed
	 */
	private function loader() {

		$this->loader = new \Twig_Loader_Filesystem('../App/Views');
		return $this->loader;
	}
}
?>