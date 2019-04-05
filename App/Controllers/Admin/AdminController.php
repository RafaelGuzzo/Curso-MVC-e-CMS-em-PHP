<?php
namespace App\Controllers\Admin;
use App\Classes\Flash;
use App\Classes\Redirect;
use App\Controllers\BaseController;
use App\Models\Admin\Admin;

class AdminController extends BaseController {
	public function index() {
		$this->view('admin.login', [
			'titulo' => 'Login do Administrador',
		]);
	}

	public function logar() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
			$password = filter_var($_POST['senha'], FILTER_SANITIZE_STRING);

			$logado = logar($email, $password, new Admin);
			if ($logado) {
				return Redirect::to('painel');
			}

			Flash::add('login', 'Usuario ou senha invalidos');
			return Redirect::back();

		}

	}
}