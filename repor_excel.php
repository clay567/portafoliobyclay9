<?php
include 'conexion.php';
header("content-type:application/vnd.ms-excel");
header("content-disposition:attachment;filename=libros.xls");
?>
<html>
	<head>
		<title>PHP and MySQL</title>
	</head>
	<body>
		<h3>Registrar Nueva Ciudad</h3>
		<table border="1" >
			<tr>
				<td>titulo</td>
				<td>precio</td>	
			</tr>
<?php 
$mysqli=conectarse();
$sql="select libroID,titulo,precio from libros order by titulo";
$stmt=$mysqli->prepare($sql);
$stmt->execute();
$stmt->bind_result($id,$titulo,$precio);
//$result=mysql_query($sql,$link);
?>
<?php 
while ($stmt->fetch()) {
?>
			<tr>
				<td><?php echo $titulo?></td>
				<td><?php echo $precio?></td>
			</tr>
<?php }?>
		</table>
		<p>&nbsp;</p>
	</body>
</html>