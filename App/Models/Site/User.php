<?php
namespace App\Models\Site;
use App\Models\Model;

class User extends Model {
	public $dados = 'user_dados';

	public $logado = 'user_logado';

	protected $table = 'tb_user';
}
?>