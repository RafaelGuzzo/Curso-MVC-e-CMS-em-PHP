<?php
namespace App\Models;
use App\Models\Connection;

abstract class Model {
	public $con;

	public function __construct() {
		$this->con = Connection::connection();
	}

	public function all() {
		$sql = "SELECT * FROM {$this->table}";

		$all = $this->con->prepare($sql);
		$all->execute();

		return $all->fetchAll();
	}

	public function find($field, $value) {
		$sql = "SELECT * FROM {$this->table} WHERE {$field} =?";

		$find = $this->con->prepare($sql);
		$find->bindValue(1, $value);
		$find->execute();

		return $find->fetch();
	}
}
?>