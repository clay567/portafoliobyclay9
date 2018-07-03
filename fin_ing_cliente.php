<?php
session_start();
if ($_SESSION['nivel']==1){
	
}else {
	header("Location:index.php?error=no tienes acceso al sistema!");
}
?>
<?php include 'conexion.php';?>
<?php 
$nombres=$_GET['nombres'];
$direccion=$_GET['direccion'];
$ciudadid=$_GET['ciudadid'];
$mysqli=conectarse();
$sql="insert into clientes(nombres,direccion,ciudadID)";
//$sql .="values('$nombres','$direccion','$ciudadid')";
$sql .="values(?,?,?)";
$stmt=$mysqli->prepare($sql);
$stmt->bind_param("ssi",$nombres,$direccion,$ciudadid);
$stmt->execute();
//$result=mysql_query($sql,$link);
?>
<html>
	<head>
		<title>PHP and MySQL</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-beta-dist/css/bootstrap.min.css">
	</head>
	<body>
		<div class="alert alert-success" role="alert">
		  <h4 class="alert-heading">Well done!</h4>
		  <p>usted acaba de ingresar informacion en la tabla clientes de la base de datos editorial de manera correcta</p>
		  <hr>
		  <p class="mb-0">felicidades admin<a href="home.php">Regresar al Menu</a></p>
		</div>
	</body>
</html>