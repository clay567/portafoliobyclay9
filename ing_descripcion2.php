<?php
	session_start();
	if ($_SESSION['nivel']==1) {
		
	}else {
		header("Locaion:index.php?error=no tiene acceso al sistema!");
	}
?>
<?php include 'conexion.php';?>
<html>
	<head>
		<title>PHP and MySQL</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-beta-dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="OWNcss/estilosFormularios.css">
	</head>
	<body>
		<?php 
			$titulo=$_GET['titulo'];
			$libroid=$_GET['codigoLibro'];
			$mysqli=conectarse();
			$sql="select libroID,descripcion from descripcion where libroID like ?";
			$stmt=$mysqli->prepare($sql);
			$stmt->bind_param("i",$libroid);
			$stmt->execute();
			$stmt->bind_result($codigo,$descripcion);
			//$result=mysql_query($sql,$link);
		?>
		<?php 
			while ($stmt->fetch()){
		?>
		<div class='jumbotron BoxLogin'>  
			<form method="get" action="fin_ing_descripcion2.php">
				<div class="form-group">
				    <label for="DatosDescripcion">Descripcion:<?php echo $titulo?></label>
				    <textarea name="descripcion" id="DatosDescripcion"><?php echo $descripcion?></textarea>
					<input name="libroid" type="hidden" value=<?php echo $codigo?>>
				</div>
			   	<button type="submit" class="btn btn-primary" name="enviar">Editar</button>
			</form>
		</div>
		<?php } ?>
		<a href="home.php">regresar al menu</a>
	</body>
</html>