<?php
	//error_reporting(E_ALL ^ E_NOTICE);
	require_once('class/tarea.php');

	$datos = new Tarea();

	$id_tarea = (isset($_GET['id_tarea']))? $_GET['id_tarea'] : null;
	$titulo	 = (isset($_GET['titulo']))? $_GET['titulo'] : null;
	$texto = (isset($_GET['texto']))? $_GET['texto'] : null;
	$op = (isset($_GET['op']))? $_GET['op'] : null;

	if(isset($op) and $op=="del"){
		$datos->delTarea($id_tarea);
	}
	if(isset($op) and $op=="Editar"){
		$datos->updateTarea();
	}

	if(isset($titulo) && isset($texto)){
		$datos->addTarea();
	}
	
?>
<html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<title>
			Tarea	
		</title>
	</head>
	<body>
		<div class="container">
			<div class="jumbotron">
  				<h2>Tareas Realizadas <?php echo "(".$datos->countTarea().")"; ?></h2>
			</div>
			<form  method="GET" action="tareas.php">
				<div class="form-group">
  					<input type="text" name="titulo" class="form-control" placeholder="Titulo de tu tarea...">
				</div>
				<div class="form-group">
  					<textarea name="texto" class="form-control" placeholder="Escribe acá"></textarea>
				</div>
				<input type="submit" class="form-control btn btn-primary" value="Crear!">
			</form>
			<table class="table">
				<thead>
					<th>Nº</th>
					<th>TITULO</th>
					<th>TEXTO</th>
					<th>FECHA</th>
				</thead>
			<?php
				$result=$datos->getTareas();
				foreach($result as $fila){
					echo "<tr>";
					echo "<td>".$fila['id_tarea']."</td>";
					print "<td>".$fila['titulo']."</td>";
					print "<td>".$fila['texto']."</td>";
					print "<td>".$fila['realizada']."</td>";

					echo "<td><a href=detalle_tarea.php?id_tarea=".$fila["id_tarea"].">Ver</a></td>";
					echo "<td><a href=editar_tarea.php?op=Editar&id_tarea=".$fila["id_tarea"]."&titulo=".$fila["titulo"]."&texto=".$fila["texto"].">Editar</a></td>";
					echo "<td><a href=tareas.php?op=del&id_tarea=".$fila["id_tarea"].">Eliminar</a></td>";
					echo "</tr>";
				}
			?>
			</table>
		</div>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</body>
</html>