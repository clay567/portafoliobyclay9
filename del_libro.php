<?php
	session_start();
	if ($_SESSION['nivel']==1) {

	}else {
		header("Location:index.php?error=no tiene acceso al sistema!");
	}
?>
<?php require 'conexion.php';?>
<?php 
	$libroid=$_GET['libroid'];
	$mysqli=conectarse();
	$sql="delete from libros where libroID=?";
	$stmt=$mysqli->prepare($sql);
	$stmt->bind_param("i",$libroid);
	$stmt->execute();
	header("Location:mod_libro.php")
?>