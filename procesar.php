<?php
	session_start();
	if ($_SESSION['nivel']==1){
		
	}else {
		header("Location:index.php?error=no tienes acceso al sistema!");
	}
?>
<?php include 'conexion.php';?>
<?php 
	$ordenid=$_GET['ordenid'];
	$monto=$_GET['monto'];
	$mysqli=conectarse();
	$sql="update pedidos set monto=? where ordenID=?";
	$stmt=$mysqli->prepare($sql);
	$stmt->bind_param("ii",$monto,$ordenid);
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
		  <p>su pedido se proceso de manera correcta</p>
		  <hr>
		  <p class="mb-0">felicidades<a href="home.php">Regresar al Menu</a></p>
		</div>
	</body>
</html>
