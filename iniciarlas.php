<?php
require 'clsEditorialMegabyte.php';
$obj=new db_editorial();
$obj->conectarse("editorialmegabyte", "localhost", "Ortuno", "12345678");
$obj->consulta("select * from clientes");
$obj->verconsulta();
?>