<?php
$con=mysqli_connect('localhost','root','','boliches');

/* verificar conexión */
if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}		
$string = file_get_contents('php://input');
$evento=json_decode($string,true);
$stmt = $con->prepare("UPDATE evento  SET IdBoliche=?, Nombre=?, Direccion=?, Telefono=?, EstiloMusical=?, Capacidad=?, DiasApertura=?, Edad=?
WHERE Id=?");
$stmt->bind_param('iissii',
		$evento["IdBoliche"],
		$evento["Nombre"],
		$evento["Direccion"],
		$evento["Telefono"],
		$evento["EstiloMusical"],
		$evento["Capacidad"],
		$evento["DiasApertura"],
		$evento["Edad"]
		);
$stmt->execute(); 
$stmt->close();

?>
