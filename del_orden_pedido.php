<?php
session_start();
if ($_SESSION['nivel']==1) {
	
}else {
	header("Location:index.php?error=no tiene acceso al sistema!");
}
?>

<?php require 'conexion.php';?>
<?php 
$ordenid=$_GET['ordenid'];
$mysqli=conectarse();
$sql="delete from pedidos where ordenID=?";
$stmt=$mysqli->prepare($sql);
$stmt->bind_param("i",$ordenid);
$stmt->execute();
?>
<?php header("location:orden_pedido.php"); ?>

