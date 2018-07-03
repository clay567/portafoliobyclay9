<?php
	require 'conexion.php';
?>
<?php
	$usuario=$_GET['usuario'];
	$password=$_GET['password'];
?>
<?php 
	$mysqli=conectarse();
	$stmt=$mysqli->prepare("select nivel from usuarios where user like ? and password like ? ");
	$stmt->bind_param("ss",$usuario,$password);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($nivel);
	
?>
<?php 
	if($stmt->num_rows){
		do{
?>
<?php 
//siempre que vallas a crear una variable de sesion debes iniciar sesion
	session_start();
	$_SESSION['nivel']=$nivel;
?>	
<?php 
	header("Location:home.php");
	// print_r($stmt);
	// echo "<br>";
	// echo "$nivel";
	// echo "<br>";
	// echo $stmt->num_rows;
?>	
<?php 
		}while ($stmt->fetch());
	}else {
		
		//echo $stmt->num_rows;
		//echo "$nivel";
		header("location:index.php?error=no existe usuario,intente de nuevo");
	}
	?>
<?php 
	$mysqli->close();
?>