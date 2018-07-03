<?php
	session_start();
	if ($_SESSION['nivel']==1) {
		
	}else {
		header("Location:index.php?error=no tiene acceso al sistema!");
	}
?>

<?php require 'conexion.php';?>
<html>
	<head>
		<!-- <title>PHP and MySQL</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-beta-dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="OWNcss/estilosFormularios.css"> -->
	</head>
	<body>
		<div class='jumbotron BoxLogin'>  
			<form method="get" action="fin_ing_pedido.php">
			  	<?php 
			      $mysqli=conectarse();
				  $stmt=$mysqli->prepare("select clienteID,nombres from clientes order by nombres");
				  $stmt->execute();
				  $stmt->bind_result($idCliente,$nombreCliente);

			  	?>
			  	<div class="form-group">
			    	<label for="SeleccioneCliente">Clientes</label>
				    <select class="form-control form-control-sm border-top-0 border-left-0 border-right-0" id="SeleccioneCliente" name="clienteid">
					    <?php 
					        while ($stmt->fetch()){
					    ?>
					    <option value=<?php echo "$idCliente"; ?>>
					    <?php 
					    	echo "$nombreCliente";  
					    ?> 
					    </option>
					    <?php 
					        }
					    ?>
				    </select>
			  	</div>
			  	<div class="form-group">
				    <label for="FechaActual">Fecha</label>
				    <input type="text" class="form-control form-control-sm" id="FechaActual" name="fecha" value=<?php echo date("20y")?>-<?php echo date("m")?>-<?php echo date("d")?>>
				</div>
			   	<button type="submit" class="btn btn-primary" name="enviar" value="pedido">ingresar pedido</button>
			</form>
		</div>
		
	</body>
</html>
