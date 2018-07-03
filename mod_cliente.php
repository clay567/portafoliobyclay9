<?php require 'conexion.php';?>
<!-- <html> -->
	<!-- <head>
		<title>PHP and MySQL</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-beta-dist/css/bootstrap.min.css">
	</head> -->
	<!-- <body> -->
		
		<table class="table table-responsive table-sm table-hover table-inverse">
			<thead>
				<tr>
					<th>Nombres</th>
					<th>direccion</th>
					<th>ciudad</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<?php 
				$mysqli=conectarse();
				$sql="select clienteID,nombres,direccion,ciudadID from clientes order by nombres";
				$stmt=$mysqli->prepare($sql);
				$stmt->execute();
				$stmt->bind_result($idCliente,$nombreCliente,$direccionCliente,$codigoCiudad);
			?>
			<tbody>
			
			<?php 
				while($stmt->fetch()){
			?>	
			
				<tr>
					<form method="GET" action="fin_mod_cliente.php">
						<td>
							<input class="form-control form-control-sm border-top-0 border-left-0 border-right-0" name="nombres" type="text" value="<?php echo $nombreCliente ?>">
						</td>	
						<td>
							<input class="form-control form-control-sm border-top-0 border-left-0 border-right-0" name="direccion" type="text" value="<?php echo $direccionCliente ?>">
						</td>
						<td>
						<?php
							$mysqli2=conectarse();
							$sql2="select ciudadID,nombre from ciudad order by nombre";
							$stmt2=$mysqli2->prepare($sql2);
							$stmt2->execute();
							$stmt2->bind_result($idCiudad,$nombreCiudad); 
						?>
							<select class="form-control form-control-sm border-top-0 border-left-0 border-right-0" name="ciudadid">
								<?php 
									while($stmt2->fetch()){
								?>
								<option value="<?php echo $idCiudad//id de la ciudad?>"
									<?php if($idCiudad==$codigoCiudad){//se compara id de ciudades ?>
									selected
									<?php 
										}
									?>
								>
									<?php 
										echo $nombreCiudad//nombre de ciudad
									?>									
								</option>
								<?php 
									}
								?>
							</select>
						</td>
						<td>
							<input name="clienteid" type="hidden" value=<?php echo $idCliente//id de cliente?>>
							<button type="submit" class="btn btn-primary" name="enviar" value="">actualizar</button>
											
						</td>
						<td>
							<a href="del_cliente.php?clienteid=<?php echo $idCliente//id de cliente?>">eliminar</a>
						</td>
					</form>
					</tr>
				
				<?php 
					}
				?>
			
			</tbody>
		</table>
	<!-- </body> -->
<!-- </html> -->


















