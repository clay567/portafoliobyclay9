<!DOCTYPE html>
<html>
<head>
	<title>Libreria Black and Gray</title>
	<!-- icono que acompaña al titulo de la pagina -->
	<link rel=icon type="image/png" href="images/icono3.png" sizes="32x32">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Sofia">
	<!-- CSS de Bootstrap -->
	<!-- <link href="bootstrap-4.0.0-beta-dist/css/bootstrap.min.css" rel="stylesheet" media="screen"> -->
	<!-- CSS estilos propios -->
	<link rel="stylesheet" type="text/css" href="OwnCss/PaginaInicio.css">
	<link rel="stylesheet" type="text/css" href="OwnCss/formularioInicioSesion.css">		
</head>		
<body>
	<div id="mensaje" style="display:none;"class="alert alert-warning" role="alert" align="center">
		<?php 
		/*la variable $_REQUEST existe pero esta vacia,con el operador not
		especificamos que no debe estar vacia para que ejecute el codigo dentro del if*/
			if(!empty($_REQUEST)){
				$mensaje=$_GET['error'];
				if ($mensaje==""){

				}else {
				/*muestra un mensaje de advertencia cuando el usuario ingreso a un nivel,que no le corresponde*/
				echo "<script>document.getElementById('mensaje').style.display='block';</script>";
				echo $mensaje;
				}
			}	
		?>
	</div>
<!--Page Start With PARALLAX EFECT-->
<div class="bgimg-1 ocultar">
	<div class="caption">
		<span class="border">TOLSTOI</span>
	</div>
	<!-- <a href="#" onclick="ocultar()" id="ancla">login</a> -->
</div>
<div style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;" class="ocultar">
	<h3 style="text-align:center;">FRASES CELEBRES</h3>
	<p>"Si buscas la perfeccion, jamas estaras satisfecho".
	"Todas las familias felices se parecen entre si; las infelices son desgraciadas en su propia manera"."Los dos guerreros mas poderosos con los que se puede contar son la paciencia y el tiempo".</p>
</div>
<div class="bgimg-2 ocultar">
	<div class="caption">
		<span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;">VARGAS LLOSA</span>
	</div>
</div>
<div style="position:relative;" class="ocultar">
	<div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
		<p>"Solo un idiota puede ser totalmente feliz".</p>
	</div>
</div>

<div class="bgimg-3 ocultar">
	<div class="caption">
		<span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;">MARK TWAIN</span>
	</div>
</div>
<div style="position:relative;" class="ocultar">
	<div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
		<p>"Nadie se desembaraza de un h&aacute;bito o de un vicio tirandolo de una vez por la ventana; hay que sacarlo por la escalera, pelda&ntilde;o a pelda&ntilde;o".</p>
	</div>
</div>
<div class="bgimg-1 ocultar">
	<div class="caption">
		<span class="border">MUCHOS MAS!</span>
	</div>
	<a href="#" onclick="document.getElementById('id01').style.display='block'">login</a>
</div>
<!--End PageStart-->
<!--Modal Login Form-->
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="validacion.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/LeonTolstoi.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="usuario" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
<!--End Modal-->

</body>
</html>