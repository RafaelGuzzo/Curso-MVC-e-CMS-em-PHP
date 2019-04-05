<?php
namespace App\Classes;
use App\Classes\Url as URL;

class Parameters {
	public static function getParameter($numeroIndex) {
		$explodeUrl = explode('/', URL::getUrl());
		return $explodeUrl[$numeroIndex];
	}
}
?>