<?php
function borrar($idTrago)
{
			$tragos=$_GET['idTrago']-1;
			$trago=file_get_contents("jsonTragos.json","r");
			$tragu=json_decode($trago,true);	
			array_splice($tragu,$tragos,1);
			$tra = json_encode($tragu,true);
			file_put_contents("jsonTragos.json",$tra);
			
}

if(isset($_GET["idTrago"])){
borrar($_GET["idTrago"]);
header("Location: ../pages/abmtragos.php");
}
?>