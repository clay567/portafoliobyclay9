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
		<form method="get" action="fin_ing_libro.php">
			<div class="form-group">
			    <label for="TituloLibro">Titulo</label>
			    <input type="text" class="form-control form-control-sm" id="TituloLibro" placeholder="ingrese titulo del libro" name="titulo">
			</div>
			<div class="form-group">
			    <label for="PrecioLibro">Precio</label>
			    <input type="text" class="form-control form-control-sm" id="PrecioLibro" placeholder="ingrese el precio" name="precio">
			</div>
			<?php include 'conexion.php';?>
			<?php 
				$mysqli=conectarse();
				$stmt=$mysqli->prepare("select autorID , nombre from autor order by nombre");
				$stmt->execute();
				$stmt->bind_result($idAutor,$nombreAutor);
				//$result=mysql_query("select autorID , nombre from autor order by nombre",$link);
			?>
		  	<div class="form-group">
		    	<label for="SeleccioneCiudad">Autor</label>
			    <select class="form-control form-control-sm border-top-0 border-left-0 border-right-0" id="SeleccioneCiudad" name="autorid">
				    <?php 
				        while ($stmt->fetch()){
				    ?>
				    <option value=<?php echo "$idAutor"; ?>>
				    <?php 
				    	echo "$nombreAutor";  
				    ?> 
				    </option>
				    <?php 
				        }
				    ?>
			    </select>
		  	</div>
		   	<button type="submit" class="btn btn-primary" name="enviar">ingresar nuevo libro</button>
		</form>
	</div>
	<!-- <p style="text-align: center"><a href="home.php">Regresar al Menu</a></p> -->
</body>
</html>
