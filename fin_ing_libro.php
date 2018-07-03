<?php
session_start();
if ($_SESSION['nivel']==1) {
	
}else {
	header("Locaion:index.php?error=no tiene acceso al sistema!");
}
?>
<?php include 'conexion.php';?>
<?php 
$titulo=$_GET['titulo'];
$precio=$_GET['precio'];
$autorid=$_GET['autorid'];
$mysqli=conectarse();
$sql="insert into libros(titulo,precio,autorID) values(?,?,?)";
$stmt=$mysqli->prepare($sql);
$stmt->bind_param("sii",$titulo,$precio,$autorid);
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
		  <p>usted acaba de ingresar informacion en la tabla libros de la base de datos editorial de manera correcta</p>
		  <hr>
		  <p class="mb-0">felicidades admin<a href="home.php">Regresar al Menu</a></p>
		</div>
	</body>
</html>
