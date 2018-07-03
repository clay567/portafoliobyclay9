<?php
	session_start();
	if ($_SESSION['nivel']==1){
		
	}else {
		header("Location:index.php?error=no tienes acceso al sistema!");
	}
?>
<?php include 'conexion.php';?>
<?php 
	$clienteid=$_GET['clienteid'];//posible error
	$item=$_GET['item'];
	$cantidad=$_GET['cantidad'];
	$mysqli=conectarse();
	$sql="update orden set cantidad=? where item=?";
	$stmt=$mysqli->prepare($sql);
	$stmt->bind_param("ii",$cantidad,$item);
	$stmt->execute();
?>
<?php header("location:ing_orden.php?clienteid=$clienteid");//esta es la ubicacin correcta?>