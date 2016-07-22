<?php
	require_once("conectar.php");

	class Tarea extends Conectar{

		private $p;
		//private $pdo;

		public function __construct(){ 

			$this->p=array(); // inicializo p como un arreglo
			$this->pdo = Conectar::getCon();
			
			//$this->pdo = new PDO('mysql:host=localhost;dbname=prueba123', 'root', 'toor'); // instancio el objeto pdo		
		}

		public function getTareas(){
			$sql="SELECT * FROM tarea ORDER BY id_tarea DESC";
			$query=$this->pdo->query($sql);
			while($row=$query->fetch(PDO::FETCH_ASSOC)){ // FORMA UNO while
				$this->p[]=$row;
			}
			return $this->p;
			$this->pdo=null;
		}

		public function getTareaId(){
			$sql="SELECT * FROM tarea WHERE id_tarea=".$_GET["id_tarea"]."";
			$result=$this->pdo->query($sql);
			foreach ($result as $row){  // FORMA DOS foreach
				$this->p[]=$row;
			}
			return $this->p;
			$this->pdo=null;
		}

		public function countTarea(){

			$result = $this->pdo->prepare("SELECT COUNT(*) FROM tarea");
			$result->execute();
			return $result->fetchColumn();
		}

		public function addTarea(){

			$titulo="";
			$texto="";
			
			
			if($_GET['titulo']!=NULL && $_GET['texto']!=NULL){

				$sql="INSERT INTO tarea(titulo, texto, realizada) VALUES('$_GET[titulo]','$_GET[texto]', now())";
				$query=$this->pdo->prepare($sql);
			
				$query->execute(array(
				':titulo' => $titulo,
				':texto' => $texto
				));

			}
			else{
				echo "ERROR INTENTE NUEVAMENTE";
			}

			
		}

		public function delTarea($id_tarea){
	        $stmt = $this->pdo->prepare("DELETE FROM tarea WHERE id_tarea = ?");
	        $stmt->bindParam(1, $id_tarea);

	        if($stmt->execute()){
	        	//echo "se elimino el registro";
	        }
	        else{
	           	//echo "no se elimino el registro";
	        }
    	}

    	public function updateTarea(){
    		$sql = "UPDATE tarea SET titulo=:titulo, texto=:texto WHERE id_tarea =:id_tarea";
    		$stmt = $this->pdo->prepare($sql);

    		$stmt->bindParam(':id_tarea',$_GET['id_tarea'],PDO::PARAM_STR);
    		$stmt->bindParam(':titulo',$_GET['titulo'],PDO::PARAM_STR);
    		$stmt->bindParam(':texto',$_GET['texto'],PDO::PARAM_STR);
    		
    		if($stmt->execute()){
	        	echo "";
	        }
	        else{
	           	echo "NO SE ACTUALIZO EL REGISTRO";
	        }


    	}


	}

?>