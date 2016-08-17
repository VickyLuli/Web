<?php 
		$errorEmail="";
		$errorContra="";
		$vEmail="";
		$errores=0;
		$cPass = "";
		
		
		if(isSet($_POST) && count($_POST) >0)
		{
			if (!isset($_POST["mail"]))
			{
				$errorEmail="No completo el mail";
				$errores=1;
			}else if ($_POST["mail"]==""){
					$errorEmail="No completo el mail";
					$errores=1;
			}else{
				$vEmail=$_POST["mail"];
			}
			if (!isset($_POST["contrasena"]))
			{
				$errorContra="No completo la contraseña";
				$errores=1;
			}else
			{
				if ($_POST["contrasena"]=="")
				{
					$errorContra="No completo la contraseña";
					$errores=1;
				}
			}
			if ($errores==0)
			{
				$archivo=file_get_contents("users.json","r");
				$users=json_decode($archivo,true);
				$i=0;
				while($i<count($users) && $users[$i]["mail"]!=$_POST["mail"])
				{
					$i++;
				}
				if ($i!=count($users))
				{
					$cPass = crypt($_POST["contrasena"], "holis");
					if ($users[$i]["contrasena"]==$cPass)
					{
						session_start();
						$_SESSION["login"]=1;
						$_SESSION["nombre"]=$users[$i]["nombre"];
						if(isset($_COOKIE["lastid"])){
							if($_COOKIE["lastid"]!=-1){
							header('Location: ../index.php?idNoticia='.$_COOKIE["lastid"]);
						}else{
							header('Location: ../index.php');
						}
						}else{
							header('Location: ../index.php');
						}
					}
					else
					{
						$errores=1;
						$errorContra="Contraseña inválida";
					}
						
					
				}
				else
				{
					$errores=1;
					$errorEmail="No se encontro un usuario con ese mail";
				}
				
						}
					}
					
					if ((!isset($_POST) || !count($_POST)>0) || $errores==1)
	{
			?>
		<html>
		<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		</head>
	<body>
	<main>
		<form id="login" action="index.php" method="post">
			<label for "mail"> Mail <input type="text" name="mail" value="<?=$vEmail?>"><a class="error"><?=$errorEmail?></a></br></br>
			<label for "contrasena"> Contraseña<input type="password" name="contrasena"><a class="error"><?=$errorContra?></a></br></br>
			<input type="submit" name="Enviar">
			</form>
			<a href="register.php">Registrarse</a>
		</main>
	</body>
</html>
<?php
	}
?>
