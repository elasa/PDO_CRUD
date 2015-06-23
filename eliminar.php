<?php
	require_once('class/class.php');

	$id_usuario = $_GET['id_usuario'];
	$op = $_GET['op'];
	$datos = new Prueba();

	if(isset($op)){
		$datos->delUsuario($id_usuario);
		echo "<script>
			window.location='index.php';
		</script>
		";
	}

	
?>
