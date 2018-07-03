<?php
session_start();
if ($_SESSION['nivel']==1){
	
}else {
	header("Location:index.php?error=no tienes acceso al sistema!");
}
?>
<?php include 'conexion.php';?>
<?php 
$clienteid=$_GET['clienteid'];
$fecha=$_GET['fecha'];
$mysqli=conectarse();
$sql="insert into pedidos(clienteID,fecha) values(?,?)";
$stmt=$mysqli->prepare($sql);
$stmt->bind_param("is",$clienteid,$fecha);
$stmt->execute();
?>
<?php header("location:ing_orden.php?clienteid=$clienteid");?>