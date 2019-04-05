<?php
namespace App\Classes;

class AddSlashUrl {
	/**
	 * @return mixed
	 */
	/*verifica se esta na index*/
	public function addSlash() {
		if ($_SERVER['REQUEST_URI'] != '/') {
			return $_SERVER['REQUEST_URI'] . '/';
		}
	}
}
?>