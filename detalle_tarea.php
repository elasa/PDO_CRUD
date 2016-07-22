<?php
	require_once('class/tarea.php');
?>
<html>
	<head>
		<title>
			Detalle de Tarea	
		</title>
	</head>
	<body>
		<h1>Detalle de Tarea</h1>
	<?php
		$datos = new Tarea();
		$result=$datos->getTareaId();
		foreach ($result as $row) {
			echo $row['id_tarea']."<br>";
			echo $row['titulo']."<br>";
			echo $row['texto']."<br>";
			echo $row['realizada']."<br>";
		}
		
	?>
	</body>
</html>