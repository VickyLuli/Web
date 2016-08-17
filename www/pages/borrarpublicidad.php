<?php
function borrar($idPublicidad)
{
			$publicidades=$_GET['idPublicidad']-1;
			$publicidad=file_get_contents("jsonPublicidad.json","r");
			$publi=json_decode($publicidad,true);	
			array_splice($publi,$publicidades,1);
			$pub = json_encode($publi,true);
			file_put_contents("jsonPublicidad.json",$pub);
			
}

if(isset($_GET["idPublicidad"])){
borrar($_GET["idPublicidad"]);
header("Location: abmpublicidad.php");
}
?>