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
					
					$cPass = $_POST["contrasena"];

					
					if ($users[$i]["contrasena"]==$cPass)
					{
						
						session_start();
						$_SESSION["login"]=1;
						$_SESSION["nombre"]=$users[$i]["nombre"];
						?>
						 <html>
							<head>
								<meta http-equiv="refresh" content="0;url=index.php">
								<script language="javascript">
									window.location.href = "index.php"
								</script>
							</head>
							<body>
								Go to <a href="index.php">index.php</a>
							</body>
						</html>
						 <?php
						
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
		<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
<center>
<div class="lule"></div>

    <div class="panel panel-default">
	
                    <div class="panel-heading">
                        <h3 class="panel-title">Iniciar sesion</h3>
                    </div>
                    <div class="panel-body">
					
                        <form  method="post" action="login.php">
                          
                                
                                   <input class="form-control" placeholder="E-mail" name="mail" type="mail" value="<?=$vEmail?>" autofocus><a class="error"><?=$errorEmail?></a>
                                
                                   <input class="form-control" placeholder="Contrasena" name="contrasena" type="password" value=""><a class="error"><?=$errorContra?></a></br>
                                
							
							  <input type="submit" name="Enviar" class="btn btn-default" value="Enviar"> 
                           
                        </form>
						
                    </div>
			</div>
 </center>

    <script src="../bower_components/jquery/dist/jquery.min.js"></script>


    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
<?php
	}
?>
