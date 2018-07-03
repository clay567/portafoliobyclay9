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

$link=conectarse();
$sql="delete from orden where item='$item'";
mysql_query($sql,$link);
?>
<?php header("location:ing_orden.php?clienteid=$clienteid");//esta es la ubicacin correcta?>
