<?php
if ($enlace=mysqli_connect('localhost','root','','editorial'))print 'conectado a editorial';
print '<br>';
$query="select ciudadID , nombre from ciudad order by nombre";
$result=mysqli_query($enlace, $query);
echo mysqli_affected_rows($enlace),'filas afectadas en la consulta','<br>';
echo mysqli_num_rows($result),'filas devueltas por la consulta','<br>';
?>
<select>
<?php 
while ($arreglo=mysqli_fetch_assoc($result)){
?>
<option value=<?php echo $arreglo['ciudadID']?>><?php print $arreglo['nombre']?></option>
<?php }?>
</select>

<?php
$enlace=mysqli_connect('localhost','root','','editorial');
$query="select clienteID,nombres,direccion,ciudadID from clientes order by nombres";
$result=mysqli_query($enlace,$query);
$matriz=mysqli_fetch_array($result);
print $matriz[0];
//print_r($matriz);
?>