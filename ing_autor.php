<?php
session_start();
if ($_SESSION['nivel']==1) {
	
}else {
	header("Locaion:index.php?error=no tiene acceso al sistema!");
}
?>
<html>
	<head>
		<!-- <title>PHP and MySQL</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-beta-dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="OWNcss/estilosFormularios.css"> -->
	</head>
	<body>
		<div class='jumbotron BoxLogin'>  
			<form method="GET" action="fin_ing_autor.php">
				<div class="form-group">
				    <label for="IngresarAutor">Autor</label>
				    <input type="text" class="form-control form-control-sm border-top-0 border-left-0 border-right-0" id="IngresarAutor" placeholder="escriba nombre de autor" name="autor">
				</div>
				<button type="submit" class="btn btn-primary" name="enviarAutor">ingresar autor</button>
			</form>
		</div>
		<!-- <p style="text-align: center"><a href="home.php">Regresar al Menu</a></p> -->
	</body>
</html>