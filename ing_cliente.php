<?php
	session_start();
	if ($_SESSION['nivel']==1) {
		
	}else {
		header("Location:index.php?error=no tiene acceso al sistema!");
	}
?>
<?php 
	require 'conexion.php';
?>
<html>
<head>
	<!-- <meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-beta-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="OwnCss/estilosFormularios.css"> -->
</head>
<body>
<div class='BoxLogin'>  
	<form method="get" action="fin_ing_cliente.php">
		<div class="form-group">
		    <label for="DatosCompletos">Nombre y Apellido</label>
		    <input type="text" class="form-control form-control-sm" id="DatosCompletos" placeholder="ingrese su nombre y apellido" name="nombres">
		</div>
		<div class="form-group">
		    <label for="DatosDireccion">Direccion</label>
		    <input type="text" class="form-control form-control-sm" id="DatosDireccion" placeholder="ingrese su direccion" name="direccion">
		</div>
	  	<?php 
		    $mysqli=conectarse();
		    $stmt=$mysqli->prepare("select ciudadID , nombre from ciudad order by nombre");
			$stmt->execute();
			$stmt->bind_result($idciudad,$nombre);
	  	?>
	  	<div class="form-group">
	    	<label for="SeleccioneCiudad">Ciudad</label>
		    <select class="form-control form-control-sm border-top-0 border-left-0 border-right-0" id="SeleccioneCiudad" name="ciudadid">
			<?php 
			    while ($stmt->fetch()){	
			?>    
			    <option value=<?php echo "$idciudad"; ?>>
			    <?php 
			    	echo "$nombre";  
			    ?> 
			    </option>
		    <?php 
		        }
		    ?>
		    </select>
	  	</div>
	   	<button type="submit" class="btn btn-primary" name="enviar">ingresar nuevo cliente</button>
	</form>
</div>

<table class="table table-striped table-bordered table-hover table-sm table-responsive">
  	<thead class="thead-inverse">
	    <tr>
	      <th>#</th>
	      <th>Nombre</th>
	      <th>Direccion</th>
	      <th>Ciudad</th>
	    </tr>
  	</thead>
  	<?php 
		$mysqli=conectarse();
		$stmt=$mysqli->prepare("select clientes.nombres , clientes.direccion , ciudad.nombre from clientes inner join ciudad
				on ciudad.ciudadID=clientes.ciudadID order by clientes.nombres");
		$stmt->execute();
		$stmt->bind_result($nombreCliente,$direccionCliente,$nombreCiudad);
	?>
  	<tbody>
		<?php  
		  	$cont=0;
			while ($stmt->fetch()){
		?>
		  	<tr>
			    <th scope="row"><?php $cont+=1;echo $cont;?></th>
			    <td><?php echo $nombreCliente;?></td>
			    <td><?php echo $direccionCliente;?></td>
			    <td><?php echo $nombreCiudad;?></td>
		    </tr>
		<?php 
			} 
		?>
  	</tbody>
</table>
<!-- <p style="text-align: center;"><a href="home.php">Regresar al men&uacute;</a></p> -->
</body>
</html>