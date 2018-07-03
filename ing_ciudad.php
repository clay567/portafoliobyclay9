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
		<form method="GET" action="fin_ing_ciudad.php">
			<div class="form-group">
			    <label for="IngresarCiudad">Ciudad</label>
			    <input type="text" class="form-control form-control-sm border-top-0 border-left-0 border-right-0" id="IngresarCiudad" placeholder="ingrese su ciudad" name="nombreciudad">
			</div>
			<button type="submit" class="btn btn-primary" name="enviarciudad">ingresar ciudad</button>
		</form>
	</div>
	<!-- <p style="text-align: center"><a href="home.php">Regresar al Men&uacute</a></p> -->
	</body>
</html>