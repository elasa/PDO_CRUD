<?php
	require_once('class/class.php');
?>
<html>
	<head>
		<title>
			Detalle de usuario	
		</title>
	</head>
	<body>
		<h1>Detalle de usuario</h1>
	<?php
		$datos = new Prueba();
		$result=$datos->getUsuarioId();
		foreach ($result as $row) {
			echo $row['id_usuario']."<br>";
			echo $row['nombres']."<br>";
			echo $row['apellidos']."<br>";
		}
		
	?>
	</body>
</html>