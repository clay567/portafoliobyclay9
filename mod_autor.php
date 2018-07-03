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
		<!-- <title>PHP and MySQL</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-beta-dist/css/bootstrap.min.css"> -->
	</head>
	<body>
			<table class="table table-responsive table-hover table-sm">
				<thead class="thead-inverse">
					<tr>
						<th>autor</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
					</tr>
				</thead>				
			<?php 
				$mysqli=conectarse();
				$sql="select autorID,nombre from autor order by nombre";
				$stmt=$mysqli->prepare($sql);
				$stmt->execute();
				$stmt->bind_result($idAutor,$nombreAutor);
				/*$link=conectarse();
				$sql="select autorID,nombre from autor order by nombre";
				$result=mysql_query($sql,$link);*/
			?>
				<tbody>			
					<?php 
						while($stmt->fetch()){
					?>
						<tr>	
							<form action="fin_mod_autor.php" method="get">
								<td class="form-group">
									<input class="form-control form-control-sm border-top-0 border-left-0 border-right-0" name="nombre" type="text" value="<?php echo $nombreAutor?>">
								</td>
								<td class="form-group">
									<input class="form-control form-control-sm border-top-0 border-left-0 border-right-0" name="autorid" type="hidden" value=<?php echo $idAutor?>>
									<button type="submit" class="btn btn-primary" name="enviar" value="actualizar">actualizar</button>
								</td>
								<td class="form-group">	
									<a href="del_autor.php?autorid=<?php echo $idAutor?>">eliminar</a>
								</td>
							</form>
						</tr>
				<?php }?>
				</tbody>	
		</table>
		
	</body>
</html>