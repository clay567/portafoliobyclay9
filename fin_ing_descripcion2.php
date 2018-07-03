<?php
	session_start();
	if ($_SESSION['nivel']==1){
		
	}else {
		header("Location:index.php?error=no tienes acceso al sistema!");
	}
?>
<?php include 'conexion.php';?>
<?php 
	$libroid=$_GET['libroid'];
	$descripcion=$_GET['descripcion'];
	$mysqli=conectarse();
	$sql="update descripcion set descripcion=?";
	$sql .=" where libroID=?";//el espacio es importante
	//print_r($sql);
	$stmt=$mysqli->prepare($sql);
	//var_dump($stmt);
	$stmt->bind_param("si",$descripcion,$libroid);
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
		  <p>edicion correcta</p>
		  <hr>
		  <p class="mb-0">felicidades admin<a href="home.php">Regresar al Menu</a></p>
		</div>
	</body>
</html>
