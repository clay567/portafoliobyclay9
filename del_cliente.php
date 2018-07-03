
<?php require 'conexion.php';?>
<?php 
	$clienteid=$_GET['clienteid'];
	$mysqli=conectarse();
	$sql="delete from clientes where clienteID=?";
	$stmt=$mysqli->prepare($sql);
	$stmt->bind_param("i",$clienteid);
	$stmt->execute();
	//header("Location:mod_cliente.php")
?>