<?php
session_start();
if ($_SESSION['nivel']==1) {
	
}else {
	header("Locaion:index.php?error=no tiene acceso al sistema!");
}
?>
<?php require 'conexion.php';?>

<html>
	<head>
		<!-- <title>PHP and MySQL</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-beta-dist/css/bootstrap.min.css"> -->
	</head>
	<body>
			<table class="table table-responsive table-hover table-sm">
				<thead class="thead-inverse">
					<tr>
						<th>titulo</th>
						<th>precio</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				
		<?php 
			$mysqli=conectarse();
			$sql="select libroID,titulo,precio from libros order by titulo";
			$stmt=$mysqli->prepare($sql);
			$stmt->execute();
			$stmt->bind_result($idLibro,$tituloLibro,$precioLibro);
			/*$link=conectarse();
			$sql="select libroID,titulo,precio from libros order by titulo";
			$result=mysql_query($sql,$link);*/
			?>				
		<?php 
			while($stmt->fetch()){
		?>
				<tr>	
					<form action="fin_mod_libro.php" method="get">
						<td>
							<input class="form-control form-control-sm border-top-0 border-left-0 border-right-0" name="titulo" type="text" value="<?php echo $tituloLibro ?>">
						</td>
						<td>
							<input class="form-control form-control-sm border-top-0 border-left-0 border-right-0" name="precio" type="text" value="<?php echo $precioLibro ?>">
						</td>
						<td>
							<input class="form-control form-control-sm border-top-0 border-left-0 border-right-0" name="libroid" type="hidden" value=<?php echo $idLibro ?>>
							<button type="submit" class="btn btn-primary" name="enviar" value="actualizar">actualizar</button>
							<!-- <input type="submit" name="submit" value="actualizar"> -->
						</td>
						<td>	
							<a href="del_libro.php?libroid=<?php echo $idLibro ?>">eliminar</a>
						</td>
					</form>
				</tr>
			<?php }?>
		</table>
	</body>
</html>