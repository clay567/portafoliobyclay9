<?php
	session_start();
	if ($_SESSION['nivel']==1) {
		
	}else {
		header("Location:index.php?error=no tiene acceso al sistema!");
	}
?>
<?php require 'conexion.php';
	header("content-type:application/vnd.ms-excel");
	header("content-disposition:attachment;filename=libros.xls");
?>
<html>
	<head>
		<title>PHP and MySQL</title>
	</head>
	<body>
		<table border="0" >
		<tr><td colspan=6 align="center"><strong>EDITORIAL MEGABYTE.SAC</strong></td></tr>
		<tr><td colspan="6"><strong>RUC:</strong>10440524996</td></tr>
		<tr><td colspan="6"><strong>Factura:</strong>Nro 001-0000567</td></tr>
		<tr>
		<td>N&ordm;</td>
		<td>libro</td>
		<td>precio unitario</td>
		<td>cantidad</td>
		<td>total</td>
		</tr>
		<?php
		//$ordenidx=$ordenid;
		$ordenidx=$_GET['autorid'];
		$mysqli=conectarse();
		//variable no definida ordenid
		$stmt=$mysqli->prepare("select orden.cantidad,libros.titulo,libros.precio,orden.item from orden inner join libros on libros.libroID=orden.libroID where ordenID like ?");
		$stmt->bind_param("i",$ordenidx);
		$stmt->execute();
		$stmt->bind_result($cantidad,$titulo,$precio,$item);
		//$result=mysql_query("select orden.cantidad,libros.titulo,libros.precio,orden.item from orden inner join libros on libros.libroID=orden.libroID where ordenID like $ordenidx",$link);
		?>
		<?php 
		$contador=0;
		$monto=0;
		while ($stmt->fetch()){//error
		?>
		<form action="fin_mod_orden.php" method="get">
		<tr>
		<td>
		<?php $contador=$contador +1;echo $contador;?>
		</td>
		<td><?php echo $titulo?></td>
		<td><?php echo $precio?></td>
		<td><?php echo $cantidad?></td>
		<td><?php echo $precio*$cantidad;?><?php $monto=$monto +$precio*$cantidad;?></td>
		</tr>
		</form>
		<?php }?>
		<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>Monto</td>
		<td><?php echo $monto?></td><!-- variable monto no definida -->
		</tr>
		<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>Igv 18%</td>
		<td><?php $igv=0;echo $igv=(18*$monto)/100;?></td><!-- variable monto no definida -->
		</tr>
		<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><strong>Total</strong></td>
		<td><strong><?php echo $igv+$monto?></strong></td>
		</tr>
		</table>
	</body>
</html>

