<?php
	session_start();
	if ($_SESSION['nivel']==1) {
		
	}else {
		header("Locaion:index.php?error=no tiene acceso al sistema!");
	}
?>
<?php include 'conexion.php';?>
<html>
<head>
	<!-- <title>PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-beta-dist/css/bootstrap.min.css"> -->
</head>
<body>
	<form action="" method="get">
		<table class="table table-responsive table-hover table-sm">
			<thead class="thead-inverse">
				<tr>
					<th>titulo</th>
					<th>descripcion</th>
				</tr>
			</thead>		
	<?php 
		$mysqli=conectarse();
		$sql="select libros.libroID,libros.titulo,descripcion.libroID from libros left join descripcion on descripcion.libroID=libros.libroID order by titulo";
		$stmt=$mysqli->prepare($sql);
		$stmt->execute();
		$stmt->bind_result($idLibro,$tituloLibro,$id);
	?>
	<?php 
		while ($stmt->fetch()){
	?>
			<tr>
				<td>
					<?php
						//titulo del libro 
						echo $tituloLibro;
					?>							
				</td>
				<td>
					<?php
						//si el campo (libroID) de la tabla descripcion es nulo
						if ($id==""){
					?>
					<a href="ing_descripcion1.php?titulo=<?php echo $tituloLibro?>	& codigoLibro=<?php echo $idLibro?>">s/d</a>
					<?php 
						}else {
					?>
					<a href="ing_descripcion2.php?titulo=<?php echo $tituloLibro?>	& codigoLibro=<?php echo $idLibro?>">c/d</a>
					<?php 
						}
					?>
				</td>
			</tr>
			<?php 
				}
			?>
		</table>
	</form>
		<!-- <p style="text-align: center;"><a href="home.php">regresar al menu</a></p> -->
</body>
</html>