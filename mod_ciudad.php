<?php
session_start();
if ($_SESSION['nivel']==1) {
	
}else {
	header("Locaion:index.php?error=no tiene acceso al sistema!");
}
?>
<?php require 'conexion.php';?>
<html>
	<head>
<!-- 		<title>PHP and MySQL</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-beta-dist/css/bootstrap.min.css"> -->
	</head>
	<body>
		<table class="table table-responsive table-hover table-sm">
			<thead class="thead-inverse">
				<tr>
					<th>ciudad</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>	
			</thead>
			
		<?php 
			$mysqli=conectarse();
			$sql="select ciudadID,nombre from ciudad order by nombre";
			$stmt=$mysqli->prepare($sql);
			$stmt->execute();
			$stmt->bind_result($idCiudad,$nombreCiudad);
			//$link=conectarse();
			//$sql="select ciudadID,nombre from ciudad order by nombre";
			//$result=mysql_query($sql,$link);
		?>				
		<?php 
			while($stmt->fetch()){
		?>
				<tr>	
					<form action="fin_mod_ciudad.php" method="get">
						<td>
							<input class="form-control form-control-sm border-top-0 border-left-0 border-right-0" name="nombre" type="text" value="<?php echo $nombreCiudad?>">
						</td>
						<td>
							<input class="form-control form-control-sm border-top-0 border-left-0 border-right-0" name="ciudadid" type="hidden" value=<?php echo $idCiudad?>>
							<button type="submit" class="btn btn-primary" name="enviar" value="actualizar">actualizar</button>
						</td>
						<td>	
							<a href="del_ciudad.php?ciudadid=<?php echo $idCiudad?>">eliminar</a>
						</td>
					</form>
				</tr>
		<?php 
			}
		?>
		</table>
		
	</body>
</html>
