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
		<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-beta-dist/css/bootstrap.min.css"> -->
	</head>
	<body>
		<table class="table table-responsive table-hover table-sm">
			<thead class="thead-inverse">
				<tr>
					<th>N&ordm;</th>
					<th>fecha</th>
					<th>total</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
				<?php 
				$contador=0;
				$mysqli=conectarse();
				$stmt=$mysqli->prepare("select pedidos.fecha ,pedidos.monto,pedidos.ordenID from clientes left join pedidos on pedidos.clienteID=clientes.clienteID left join orden on orden.ordenID=pedidos.ordenID where orden.ordenID is null and pedidos.ordenID>'0'");
				$stmt->execute();
				$stmt->bind_result($fecha,$monto,$idOrden);

				?>
				<?php
				while ($stmt->fetch()){
				?>
				<form action="fin_mod_orden.php" method="get">
				<tr>
					<td>
					<?php $contador=$contador +1;echo $contador;?>
					</td>
					<td>
					<?php echo $fecha?>
					</td>
					<td><?php echo $monto;?></td>
					<td><a href="del_orden_pedido.php?ordenid=<?php echo $idOrden?>">eliminar</a></td>
				</tr>
				</form>
				<?php }?>
		</table>
	</body>
</html>

