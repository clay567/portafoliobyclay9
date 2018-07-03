<?php
	session_start();
	if ($_SESSION['nivel']==1) {
		
	}else {
		header("Locaion:index.php?error=no tiene acceso al sistema!");
	}
?>
<?php 
	$titulo	=$_GET['titulo'];
	if (isset($_GET['codigoLibro'])) {
		$libroid =$_GET['codigoLibro'];
	}else {
		$libroid="";
	}
?>
<html>
	<head>
		<title>PHP and MySQL</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-beta-dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="OWNcss/estilosFormularios.css">
	</head>
	<body>
		<div class='jumbotron BoxLogin'>  
			<form method="get" action="fin_ing_descripcion1.php">
				<div class="form-group">
				    <label for="DatosDescripcion"><?php echo $titulo?></label>
				    <textarea name="descripcion" id="DatosDescripcion" required></textarea>
					<input name="libroid" type="hidden" value=<?php echo $libroid?>>
				</div>
			   	<button type="submit" class="btn btn-primary" name="enviar">ingresar descripcion</button>
			</form>
		</div>
		<div style="text-align: center;">
			<a href="home.php">regresar al menu</a>
		</div>
	</body>
</html>