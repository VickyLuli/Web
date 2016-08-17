<?php
$con=mysqli_connect('localhost','root','','proyecto1'); // o boliches

/* verificar conexión */
if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}		
$string = file_get_contents('php://input');
$evento=json_decode($string,true);
$query = "INSERT INTO boliches (IdBoliche, Nombre, Direccion, Telefono, EstiloMusical, Capacidad, DiasApertura, Edad) VALUES (?, ?, ?, ?, ?,?,?,?)";
$stmt=$con->prepare($query);
$stmt->bind_param(
		'iissi',
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
		echo 
		$evento["IdBoliche"].
		$evento["Nombre"].
		$evento["Direccion"].
		$evento["Telefono"].
		$evento["EstiloMusical"].
		$evento["Capacidad"].
		$evento["DiasApertura"].
		$evento["Edad"];
		//$stmt->bind_result($con, $query);

mysqli_close($con);
?>
