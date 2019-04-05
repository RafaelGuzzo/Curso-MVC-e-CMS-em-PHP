<?php
use App\Classes\Flash;

$message = new \Twig_SimpleFunction('message', function ($index) {
	return Flash::get($index);
});

?>