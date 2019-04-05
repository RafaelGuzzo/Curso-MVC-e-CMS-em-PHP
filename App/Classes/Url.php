<?php
namespace App\Classes;
class Url {
	public static function getAllUri() {
		return $_SERVER['REQUEST_URI'];
	}

	public static function getLastPage() {
		if (self::haveLastPage()) {
			$explode = explode('/', $_SERVER['HTTP_REFERER']);
			unset($explode[0]);
			unset($explode[1]);
			unset($explode[2]);
			$implode = implode('/', $explode);

			return $implode;
		}
	}

	/* retorna o query da url depois que encontra o ?*/
	public static function getQUeryString() {

		$query = parse_url($_SERVER['REQUEST_URI']);
		$queryString = (isset($query['query'])) ? $query['query'] : null;

		return $queryString;

	}

	/* retorna o path da url*/
	public static function getUrl() {
		return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

	}

	/* usado para verificar se existe uma pagina acessada anteriormente*/
	public static function haveLastPage() {
		if (isset($_SERVER['HTTP_REFERER']) AND !empty($_SERVER['HTTP_REFERER'])) {
			return true;
		}
		return false;
	}
}
?>