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
		<!-- <title>PHP and MySQL</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-beta-dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="OWNcss/estilosFormularios.css"> -->
	</head>
	<body>
		<div class='jumbotron BoxLogin'>  
			<form method="get" action="fin_ing_autor_libro.php">
			  	<?php 
			      $mysqli=conectarse();
			      $stmt=$mysqli->prepare("select autorID,nombre from autor order by nombre");
			      $stmt->execute();
			      $stmt->bind_result($idAutor,$nombreAutor);
			  	?>
			  	<div class="form-group">
			    	<label for="SeleccioneAutor">Autor</label>
				    <select class="form-control form-control-sm border-top-0 border-left-0 border-right-0" id="SeleccioneAutor" name="autorid">
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
			  	<?php
			  		$mysqli=conectarse();
			      	$stmt=$mysqli->prepare("select libroID,titulo from libros order by titulo");
			      	$stmt->execute();
			     	$stmt->bind_result($idLibro,$tituloLibro); 
			  	?>
			  	<div class="form-group">
			    	<label for="SeleccioneLibro">Libro</label>
				    <select class="form-control form-control-sm border-top-0 border-left-0 border-right-0" id="SeleccioneLibro" name="libroid">
					    <?php 
					        while ($stmt->fetch()){
					    ?>
					    <option value=<?php echo "$idLibro"; ?>>
					    <?php 
					    	echo "$tituloLibro";  
					    ?> 
					    </option>
					    <?php 
					        }
					    ?>
				    </select>
			  	</div>
			   	<button type="submit" class="btn btn-primary" name="enviar">Guardar Relacion</button>
			</form>
		</div>
		<!-- <p style="text-align: center;"><a href="home.php">regresar al men&uacute;</a></p> -->						
	</body>
</html>