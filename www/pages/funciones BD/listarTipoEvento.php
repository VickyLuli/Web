<?php
$con=mysqli_connect('localhost','root','','boliches');
if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
   
$query = 'SELECT * FROM boliches';
$result = mysqli_query($con, $query);
$objetos = array();
while($row = mysqli_fetch_array($result)) 
{ 
	$IdTipo=$row['IdBoliche'];
	$Nombre=$row['Nombre'];
	$objeto = array('IdTipo'=> $IdTipo, 'Nombre'=> $Nombre);	
	array_push($objetos, $objeto);	
}
$close = mysqli_close($con) 
or die("Ha sucedido un error inesperado en la desconexion de la base de datos");
header("Content-Type: application/json");
$json_string = json_encode($objetos,JSON_UNESCAPED_UNICODE);
echo $json_string;
?>