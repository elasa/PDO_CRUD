<?php
	require_once("conectar.php");

	class Prueba extends Conectar{

		private $p;
		//private $pdo;

		public function __construct(){ 

			$this->p=array(); // inicializo p como un arreglo
			$this->pdo = Conectar::getCon();
			
			//$this->pdo = new PDO('mysql:host=localhost;dbname=prueba123', 'root', 'toor'); // instancio el objeto pdo		
		}

		public function getUsuario(){
			$sql="SELECT * FROM usuario";
			$query=$this->pdo->query($sql);
			while($row=$query->fetch(PDO::FETCH_ASSOC)){ // FORMA UNO while
				$this->p[]=$row;
			}
			return $this->p;
			$this->pdo=null;
		}

		public function getUsuarioId(){
			$sql="SELECT * FROM usuario WHERE id_usuario=".$_GET["id_usuario"]."";
			$result=$this->pdo->query($sql);
			foreach ($result as $row){  // FORMA DOS foreach
				$this->p[]=$row;
			}
			return $this->p;
			$this->pdo=null;
		}

		public function addUsuario(){

			$nombres="";
			$apellidos="";
			
			$result = $this->pdo->prepare("SELECT COUNT(*) FROM usuario WHERE nombres='$_GET[nombres]' AND apellidos='$_GET[apellidos]'");
			$result->execute();

			if($result->fetchColumn() > 0){
				//echo 'EL USUARIO YA EXISTE';
			}
			elseif($_GET['nombres']!=NULL && $_GET['apellidos']!=NULL){

				$sql="INSERT INTO usuario(nombres, apellidos) VALUES('$_GET[nombres]','$_GET[apellidos]')";
				$query=$this->pdo->prepare($sql);
			
				$query->execute(array(
				':nombres' => $nombres,
				':apellidos' => $apellidos
				));

			}
			else{
				echo "ERROR INTENTE NUEVAMENTE";
			}

			
		}

		public function delUsuario($id_usuario){
	        $stmt = $this->pdo->prepare("DELETE FROM usuario WHERE id_usuario = ?");
	        $stmt->bindParam(1, $id_usuario);

	        if($stmt->execute()){
	        	echo "se elimino el registro";
	        }
	        else{
	           	echo "no se elimino el registro";
	        }
    	}

    	public function updateUsuario(){
    		$sql = "UPDATE usuario SET nombres=:nombres, apellidos=:apellidos WHERE id_usuario =:id_usuario";
    		$stmt = $this->pdo->prepare($sql);

    		$stmt->bindParam(':id_usuario',$_GET['id_usuario'],PDO::PARAM_STR);
    		$stmt->bindParam(':nombres',$_GET['nombres'],PDO::PARAM_STR);
    		$stmt->bindParam(':apellidos',$_GET['apellidos'],PDO::PARAM_STR);
    		
    		if($stmt->execute()){
	        	echo "";
	        }
	        else{
	           	echo "NO SE ACTUALIZO EL REGISTRO";
	        }


    	}


	}





?>