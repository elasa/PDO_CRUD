<?php
	class Conectar{

		private $pdo;

		protected function getCon(){
			$this->pdo = new PDO('mysql:host=localhost;dbname=tareas','root',''); // instancio el objeto pdo
			return $this->pdo;
		}


	}
?>