<!DOCTYPE html>
<?php
	require_once('class/class.php');

	$datos = new Prueba();

	$id_usuario = (isset($_GET['id_usuario']))? $_GET['id_usuario'] : null;
	$nombres = (isset($_GET['nombres']))? $_GET['nombres'] : null;
	$apellidos = (isset($_GET['apellidos']))? $_GET['apellidos'] : null;
	$op = (isset($_GET['op']))? $_GET['op'] : null;

	if(isset($op) and $op=="Editar"){
		$datos->updateUsuario();
	}


?>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Editar Usuario</h1>
		<form  method="GET" action="index.php">
			<input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
			<label>Nombres</label><input type="text" name="nombres" value="<?php echo $nombres; ?>">
			<label>Apellidos</label><input type="text" name="apellidos" value="<?php echo $apellidos; ?>">
			<input type="submit" name="op" value="Editar">
		</form>
		<?php

			$result=$datos->getUsuario();
			foreach($result as $fila){
				echo $fila['id_usuario']." ";
				print $fila['nombres']."\t";
				print $fila['apellidos']."\t";

				echo "<a href=detalle.php?id_usuario=".$fila["id_usuario"].">Ver</a>\t";
				echo "<a href=editar.php?id_usuario=".$fila["id_usuario"]."&nombres=".$fila["nombres"]."&apellidos=".$fila["apellidos"].">Editar</a>\t";
				echo "<a href=index.php?op=del&id_usuario=".$fila["id_usuario"].">Eliminar</a>";
				echo "<br>";
			}
		?>
</body>
</html>