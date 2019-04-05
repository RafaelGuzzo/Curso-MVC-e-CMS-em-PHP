<?php
namespace App\Controllers\Site;
use App\Controllers\BaseController as BaseController;
use App\Models\Site\Noticia;

class HomeController extends BaseController {
	public function index() {

		$noticias = new Noticia();
		$noticiasEncontradas = $noticias->all();

		$this->view('site.home', [
			'titulo' => 'Pagina Inicial',
			'noticias' => $noticiasEncontradas,
		]);
	}
}
?>