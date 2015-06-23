<?php
	class Conectar{

		private $pdo;

		protected function getCon(){
			$this->pdo = new PDO('mysql:host=localhost;dbname=prueba123', 'root', 'toor'); // instancio el objeto pdo
			return $this->pdo;
		}


	}
?>