<?php
function borrar($idEntrada)
{
			$evento=$_GET['idEntrada']-1;
			$even=file_get_contents("jsonEntradas.json","r");
			$evn=json_decode($even,true);	
			array_splice($evn,$evento,1);
			$entr = json_encode($evn,true);
			file_put_contents("jsonEntradas.json",$entr);
			
}

if(isset($_GET["idEntrada"])){
borrar($_GET["idEntrada"]);
header("Location: abmentradas.php");
}
?>