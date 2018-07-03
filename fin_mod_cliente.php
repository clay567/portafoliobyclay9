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
$clienteid=$_GET['clienteid'];
$mysqli=conectarse();
/*print_r($nombres);
print '<br>';
print_r($direccion);
print '<br>';
print_r($ciudadid);
print '<br>';
print_r($clienteid);*/
$sql="update clientes set nombres=?,direccion=?,ciudadID=? where clienteID=?";
$stmt=$mysqli->prepare($sql);
$stmt->bind_param("ssii",$nombres,$direccion,$ciudadid,$clienteid);
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
		  <p>usted acaba de modificar informacion en la tabla clientes de la base de datos editorial de manera correcta</p>
		  <hr>
		  <p class="mb-0">felicidades admin<a href="home.php">Regresar al Menu</a></p>
		</div>
	</body>
</html>