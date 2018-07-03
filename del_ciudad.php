<?php
session_start();
if ($_SESSION['nivel']==1) {

}else {
	header("Locaion:index.php?error=no tiene acceso al sistema!");
}
?>
<?php require 'conexion.php';?>
<?php 
	$ciudadid=$_GET['ciudadid'];
	$mysqli=conectarse();
	$sql="delete from ciudad where ciudadID=?";
	$stmt=$mysqli->prepare($sql);
	$stmt->bind_param("i",$ciudadid);
	$stmt->execute();
	header("Location:mod_ciudad.php");
?>