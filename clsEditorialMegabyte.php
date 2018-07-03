<?php
class db_editorial{
var $database;
var $servidor;
var $user;
var $password;
var $conexionid=0;
var $consultaid=0;
var $errno=0;
var $error="";

function db_editorial($db="editorialmegabyte",$servidor="localhost",$user="Ortuno",$password="12345678"){
	$this->database=$db;
	$this->servidor=$servidor;
	$this->user=$user;
	$this->password=$password;
}

function conectarse($db,$servidor,$user,$password){
	if ($db!="") $this->database=$db;
	if ($servidor!="") $this->servidor=$servidor;
	if ($user!="") $this->user=$user;
	if ($password!="") $this->password=$password;
	
	$this->conexionid=mysql_connect($this->servidor,$this->user,$this->password);
	if (!$this->conexionid){
		$this->error="error en la conexion";
		return 0;
	}
	$this->consultaid=mysql_select_db($this->database,$this->conexionid);
	if (!$this->consultaid){
		 $this->error="no seleccionaste una base de datos";
		return 0;
	}
	return $this->conexionid;
}

function consulta($sql=""){
	if ($sql==""){
	$this->error="realice una consulta";
	return 0;
}
$this->consultaid=mysql_query($sql,$this->conexionid);
if (!$this->consultaid){
	$this->errno=mysql_errno();
	$this->error=mysql_error();
}
return $this->consultaid;
}

function numerocampos(){
return mysql_num_fields($this->consultaid);	
}
function numerofilas(){
	return mysql_num_rows($this->consultaid);
}
function nombrecolumna($numcampo){
	return mysql_field_name($this->consultaid,$numcampo);
}
function verconsulta(){
echo "<table border=\"1\"><tr>\n";
for ($i = 0; $i < $this->numerocampos(); $i++) {
	echo "<td>".$this->nombrecolumna($i)."</td>";
}
echo "</tr>";
while ($row=mysql_fetch_row($this->consultaid)){
	echo "<tr>";
	for ($i = 0; $i <$this->numerocampos(); $i++) {
		echo "<td>".$row[$i]."</td>\n";
	}
		echo "</tr>\n";
}
}
}
?>