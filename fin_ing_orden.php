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
	$ordenid=$_GET['ordenid'];
	$libroid=$_GET['libroid'];
	$cantidad=$_GET['cantidad'];
	$mysqli=conectarse();
	$sql="insert into orden(ordenID,libroID,cantidad) values(?,?,?)";
	$stmt=$mysqli->prepare($sql);
	$stmt->bind_param("iii",$ordenid,$libroid,$cantidad);
	$stmt->execute();
	//mysql_query($sql,$link);
?>
<?php header("location:ing_orden.php?clienteid=$clienteid");?>
