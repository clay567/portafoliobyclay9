<?php
	session_start();
	if ($_SESSION['nivel']==1) {
		
	}else {
		header("Location:index.php?error=no tiene acceso al sistema!");
	}
?>
<?php require 'conexion.php';?>
<?php 
	$clienteid=$_GET['clienteid'];
	$mysqli=conectarse();
	$stmt=$mysqli->prepare("select ordenID from pedidos order by ordenID desc");
	$stmt->execute();
	$stmt->bind_result($id);
?>
<?php $stmt->fetch()?>
<?php $ordenid=$id;//ordenid de la tabla pedidos?>
<html>
	<head>
		<title>PHP and MySQL</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-beta-dist/css/bootstrap.min.css">
	</head>
	<body>
	<?php 
	$mysqli=conectarse();
	$sql="select clientes.nombres,pedidos.fecha from pedidos inner join clientes on clientes.clienteID=pedidos.clienteID where pedidos.ordenID like ?";
	$stmt=$mysqli->prepare($sql);
	$stmt->bind_param("i",$ordenid);
	$stmt->execute();
	$stmt->bind_result($nombre,$fecha);
	?>
	<?php $stmt->fetch()?>
	<!-- tabla1(pedido) -->
	<table class="table table-striped table-bordered table-hover table-sm table-responsive">
	  <thead class="thead-inverse">
	    <tr>
	      <th>Cliente</th>
	      <th>Fecha</th>
	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	      <td><?php echo $nombre//nombre del cliente?></td>
	      <td><?php echo $fecha//fecha del pedido?></td>
	    </tr>
	  </tbody>
	</table>
	
	<br>
	<!--fin de la tabla 1-->
	<div class='jumbotron BoxLogin'>  
			<form method="get" action="fin_ing_orden.php">
				<?php 
			      $mysqli=conectarse();
			      $stmt=$mysqli->prepare("select libroID,titulo,precio from libros order by titulo");
			      $stmt->execute();
			      $stmt->bind_result($id,$titulo,$precio);
			  	?>
			  	<div class="form-group">
			    	<label for="SeleccioneLibro">Libro</label>
				    <select class="form-control form-control-sm border-top-0 border-left-0 border-right-0" id="SeleccioneLibro" name="libroid">
					    <?php 
					        while ($stmt->fetch()){
					    ?>
					    <option value=<?php echo "$id"; ?>>
					    <?php 
					    	echo "$titulo";  
					    ?>
					    -S/.<?php echo round($precio,2);?> 
					    </option>
					    <?php 
					        }
					    ?>
				    </select>
			  	</div>
			  	<div class="form-group">
				    <label for="CantidadCompra">Cantidad</label>
				    <input type="text" class="form-control form-control-sm" id="CantidadCompra" placeholder="ingrese la cantidad" name="cantidad" required>
				    <input name="ordenid" type="hidden" value=<?php echo $ordenid;?>>
					<input name="clienteid" type="hidden" value=<?php echo"$clienteid";?>>
				</div>
			   	<button type="submit" class="btn btn-primary" name="enviar">Añadir</button>
			</form>
		</div>

	<!--tabla2(orden)-->
	<table class="table table-responsive table-hover table-sm">
		<thead class="thead-inverse">
		    <tr>
		      <th>#</th>
		      <th>libro</th>
		      <th>Precio Uni.</th>
		      <th>cantidad</th>
		      <th>total</th>
		      <th>&nbsp;</th>
		      <th>&nbsp;</th>
		    </tr>
  		</thead>
	<?php 
		$mysqli=conectarse();
		$sql="select orden.cantidad,libros.titulo,libros.precio,orden.item from orden inner join libros on libros.libroID=orden.libroID where ordenID like ?";
		$stmt=$mysqli->prepare($sql);
		$stmt->bind_param("i",$ordenid);
		$stmt->execute();
		$stmt->bind_result($cantidad,$titulo,$precio,$item);		
	?>
	<?php 
		$monto=0;
		$contador=0;
		while($stmt->fetch()){
	?>
	<tbody>
		<form action="fin_mod_orden.php" method="get">
			<tr>
				<th scope="row">
					<?php $contador=$contador +1;echo $contador;//Nro?>
				</th>
				<td><?php echo $titulo//titulo de libro?></td>
				<td><?php echo $precio//precio de libro?></td>
				<td><input name="cantidad" type="text" value=<?php echo $cantidad//cantidad de libros pedidos?> class="form-control form-control-sm"></td>
				<td><?php echo $precio*$cantidad//total=precio*cantidad?><?php $monto=$monto+$precio*$cantidad?></td>
				<!-- boton actulizar -->
				<td>
					<button type="submit" class="btn btn-primary" name="enviar">Actualizar</button>
					<!-- <input type="submit" value="actualizar"> -->
					<input name="item" type="hidden" value=<?php echo $item//item de orden?>>
					<input name="clienteid" type="hidden" value=<?php echo $clienteid;?>>
				</td>
				<!-- link eliminar -->
				<td>
					<a href="del_orden.php?item=<?php echo $item//item de orden?>$clienteid=<?php echo $clienteid;?>">eliminar</a>
				</td>
			</tr>
		</form>
		<?php }?>

	<!--fila que contiene al boton procesar-->

			<tr>
				<form action="procesar.php" method="get">
				<td>&nbsp;</td>
				<td>
				<button type="submit" class="btn btn-primary" name="enviar">procesar pedido &gt;&gt;</button>
				<!-- <input type="submit" value="procesar pedido &gt;&gt;"> -->
				<input name="ordenid" type="hidden" value=<?php echo $ordenid?>>
				<input name="monto" type="hidden" value=<?php echo $monto?>><!-- variable monto no difinida -->
				</td>
				<td>&nbsp;</td>
				<td>montoS/.</td>
				<td><?php echo $monto?></td><!-- variable monto no definida -->
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				</form>
			</tr>	
		</tbody>
	</table>
	</body>
</html>





