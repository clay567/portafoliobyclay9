<?php 
	session_start();
	if($_SESSION['nivel']==1){//compara lo almacenado en la variable session
		
	}else{
		header("Location:index.php?error=no tiene acceso al sistema");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Libreria Black and Gray</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel=icon type="image/png" href="images/icono3.png" sizes="32x32">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Sofia">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-beta-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="OWNcss/Managment.css">
	<link rel="stylesheet" type="text/css" href="OwnCss/estilosFormularios.css">
</head>
<body> 
	<div class="sidenav" id="mySidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<button class="dropdown-btn">INGRESOS
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-container">
			<a href="#" id="clientes">cliente</a>
			<a href="#" id="ciudades">ciudad</a>
			<a href="#" id="autores">autor</a>
			<a href="#" id="libros">libro</a>
			<a href="#" id="descripcion">descripcion</a>
			<a href="#" id="relacionAutorLibro">relacion autor/libro</a>
		</div>
		<button class="dropdown-btn">MANTENIMIENTO 
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-container">
			<a href="#" id="">cliente</a>
			<a href="#" id="modCiudad">ciudad</a>
			<a href="#" id="modAutor">autor</a>
			<a href="#" id="modLibro">libro</a>
		</div>
		<button class="dropdown-btn">PEDIDOS
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-container">
			<a href="#" id="ingPedido">ingresar nuevo</a>
			<a href="#" id="reporCliente">reportes de pedido</a>
			<a href="#" id="ordenPedido">mantenimiento de registros orden/pedido</a>
		</div>
	</div>
	<span class="fa fa-bars fa-3x" onclick="openNav()" id="Derecha"></span>
	<div id="contenido" style="display:none;border:solid pink;"></div>
	
	<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
	<script src="js/dropdown.js"></script> 
	<script type="text/javascript" src="js/load.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
</body>
</html>
