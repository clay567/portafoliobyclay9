$(document).ready(function(){
		$('#clientes').click(function(){
			document.getElementById("contenido").style.display="block";
   			$("#contenido").load("ing_cliente.php");
 	});

		$('#ciudades').click(function(){
			document.getElementById("contenido").style.display="block";
   			$("#contenido").load("ing_ciudad.php");
 	});

		$('#autores').click(function(){
			document.getElementById("contenido").style.display="block";
   			$("#contenido").load("ing_autor.php");
 	});

		$('#libros').click(function(){
			document.getElementById("contenido").style.display="block";
   			$("#contenido").load("ing_libro.php");
 	});

		$('#descripcion').click(function(){
			document.getElementById("contenido").style.display="block";
   			$("#contenido").load("ing_descripcion.php");
 	});

		$('#relacionAutorLibro').click(function(){
			document.getElementById("contenido").style.display="block";
   			$("#contenido").load("ing_autor_libro.php");
 	});

		$('#modCliente').click(function(){
			document.getElementById("contenido").style.display="block";
			$("#contenido").load("mod_cliente.php");
		});

		$('#modCiudad').click(function(){
			document.getElementById("contenido").style.display="block";
   			$("#contenido").load("mod_ciudad.php");
 	});

		$('#modAutor').click(function(){
			document.getElementById("contenido").style.display="block";
   			$("#contenido").load("mod_autor.php");
 	});

		$('#modLibro').click(function(){
			document.getElementById("contenido").style.display="block";
   			$("#contenido").load("mod_libro.php");
 	});

		$('#ingPedido').click(function(){
			document.getElementById("contenido").style.display="block";
   			$("#contenido").load("ing_pedido.php");
 	});

		$('#reporCliente').click(function(){
			document.getElementById("contenido").style.display="block";
   			$("#contenido").load("repor_cliente.php");
 	});

		$('#ordenPedido').click(function(){
			document.getElementById("contenido").style.display="block";
   			$("#contenido").load("orden_pedido.php");
 	});
});