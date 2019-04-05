<?php
use App\Classes\Login;
use App\Models\Model;

function dd($dump) {
	var_dump($dump);
	die();
}

function logar($email, $password, Model $model) {
	return (new Login)->logar($email, $password, $model);
}
?>