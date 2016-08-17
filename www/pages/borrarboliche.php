<?php
function borrar($idboliche)
{
			$boliche=$_GET['idBoliche']-1;
			$boliches=file_get_contents("jsonBoli.json","r");
			$boli=json_decode($boliches,true);	
			array_splice($boli,$boliche,1);
			$bolis = json_encode($boli,true);
			file_put_contents("jsonBoli.json",$bolis);
			
}

if(isset($_GET["idBoliche"])){
borrar($_GET["idBoliche"]);
header("Location: abmboliches.php");
}
?>