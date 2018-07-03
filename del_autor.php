<?php
	session_start();
	if ($_SESSION['nivel']==1) {

	}else {
		header("Locaion:index.php?error=no tiene acceso al sistema!");
	}
?>
<?php require 'conexion.php';?>
<?php 
	$autorid=$_GET['autorid'];
	$mysqli=conectarse();
	$sql="delete from autor where autorID=?";
	$stmt=$mysqli->prepare($sql);
	$stmt->bind_param("i",$autorid);
	$stmt->execute();
	header("Location:mod_autor.php")
?>