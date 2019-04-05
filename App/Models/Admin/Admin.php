<?php
namespace App\Models\Admin;
use App\Models\Model;

class Admin extends Model {
	public $dados = 'admin_dados';

	public $logado = 'admin_logado';

	protected $table = 'tb_administrador';
}
?>