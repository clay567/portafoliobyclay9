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
			<form method="get" action="repor_cliente.php">
			  	<?php 
			      $mysqli=conectarse();
				  $stmt=$mysqli->prepare("select clienteID,nombres from clientes order by nombres");
				  $stmt->execute();
				  $stmt->bind_result($idCliente,$nombreCliente);
			  	?>
			  	<div class="form-group">
			    	<label for="SeleccioneCliente">Cliente</label>
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
			   	<button type="submit" class="btn btn-primary" name="enviar">Mostrar Pedido</button>
			</form>
		</div>

		<!-- inicio de la tabla pedidos -->
		<table class="table table-responsive table-hover table-sm">
			<tr>
				<td colspan="4"><strong>pedidos</strong></td>
			</tr>
			<tr>
				<td>N&ordm;</td>
				<td>fecha</td>
				<td>monto</td>
				<td>&nbsp;</td>
			</tr>
				<?php 
					//si esta definida o tiene un valor distinto de null entonces verdadero
					if (isset($_GET['clienteid'])){
						$clienteid=$_GET['clienteid'];
					}else {
						
					}
					$mysqli=conectarse();
					$stmt=$mysqli->prepare("select fecha,monto,ordenID from pedidos where clienteID like ?");
					$stmt->bind_param("i",$clienteid);
					$stmt->execute();
					$stmt->bind_result($fecha,$monto,$idOrden);
				?>
				<?php 
					$contador=0;
					while ($stmt->fetch()){
				?>
				<form action="repor_orden.php" method="get">
					<tr>
						<td><?php $contador=$contador +1;echo $contador;?>
							
						</td>
						<td>
						<?php echo $fecha;?>
						</td>
						<td>
							<?php if ($monto==0){
							echo "pedido no procesado";}
							else{
								echo $monto;
							}?>
						</td>
						<td>
							<button type="submit" class="btn btn-primary" name="enviar">Mostrar Detalle</button>
							<input name="ordenid" type="hidden" value=<?php echo $idOrden;?>>
						</td>
					</tr>
				</form>
				<?php }?>
		</table>
		<a href="home.php">regrese al menu</a>
	</body>
</html>
