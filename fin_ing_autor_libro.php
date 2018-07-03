<?php
	session_start();
	if ($_SESSION['nivel']==1) {
		
	}else {
		header("Location:index.php?error=no tiene acceso al sistema!");
	}
?>
<?php 
	require 'conexion.php';
	$autorid=$_GET['autorid'];
	$libroid=$_GET['libroid'];
	$mysqli=conectarse();
	$sql="update libros set autorID=? where libroID=?";
	$stmt=$mysqli->prepare($sql);
	$stmt->bind_param("ii",$autorid,$libroid);
	$stmt->execute();
?>
<html>
	<head>
		<title>PHP and MySQL</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-beta-dist/css/bootstrap.min.css">
	</head>
	<body>
		<div class="alert alert-success" role="alert">
		  <h4 class="alert-heading">Well done!</h4>
		  <p>usted acaba de modificar informacion en la tabla libros de la base de datos editorial de manera correcta</p>
		  <hr>
		  <p class="mb-0">felicidades admin<a href="home.php">Regresar al Menu</a></p>
		</div>
	</body>
</html>
