<?php
		$boliches=file_get_contents("jsonBoli.json","r");
		$boli=json_decode($boliches,true);	

		$errores=0;
		$errorNombre="";
		$errorDireccion="";
		$errorTelefono="";
		$errorMusica = "";
		$errorCap="";
		$errorDias="";
		$errorEdad="";
	
			
		if (isset($_POST) && count($_POST)>0)
		{
			$indice=count($boli);
			$boli[$indice]["idboliche"]=$boli[count($boli)-1]["idboliche"]+1;
			if (!isset($_POST["nombre"]))
			{
				$errorNombre="No completo el nombre";
				$errores=1;
				
			}
			else
			{
				if ($_POST["nombre"]=="")
				{
					$errorNombre="El nombre no puede ser vacio";
					$errores=1;
				}
				else
				{
					$boli[$indice]["nombre"]=$_POST["nombre"];
				}
			}
			
			
			if (!isset($_POST["direccion"]))
			{
				$errorDireccion="No completo la direccion";
				$errores=1;
			}
			else
			{
				if ($_POST["direccion"]=="")
				{
					$errorDireccion="La direccion no puede ser vacia";
					$errores=1;
				}
				else
				{
					$boli[$indice]["direccion"]=$_POST["direccion"];
				}
			}
			
			if (!isset($_POST["telefono"]))
			{
				$errorTelefono="No completo el telefono";
				$errores=1;
			}
			else
			{
				
				if ($_POST["telefono"]=="")
				{
					$errorTelefono="El telefono no puede ser vacio";
					$errores=1;
					
				}
				else
				{
					$boli[$indice]["telefono"]=$_POST["telefono"];
				}
			}
			
			if (!isset($_POST["musica"]))
			{
				$errorMusica="No completo el estilo musical";
				$errores=1;
			}
			else
			{
				
				if ($_POST["musica"]=="")
				{
					$errorMusica="El estilo musical no puede ser vacio";
					$errores=1;
					
				}
				else
				{
					$boli[$indice]["musica"]=$_POST["musica"];
				}
			}
			
			if (!isset($_POST["capacidad"]))
			{
				$errorCap="No completo la capacidad";
				$errores=1;
			}
			else
			{
				
				if ($_POST["capacidad"]=="")
				{
					$errorCap="La capacidad no puede ser vacia";
					$errores=1;
					
				}
				else
				{
					$boli[$indice]["capacidad"]=$_POST["capacidad"];
				}
			}
			if (!isset($_POST["dias"]))
			{
				$errorDias="No completo los dias de apertura";
				$errores=1;
			}
			else
			{
				
				if ($_POST["dias"]=="")
				{
					$errorDias="Los dias de apertura no puede ser vacio";
					$errores=1;
					
				}
				else
				{
					$boli[$indice]["apertura"]=$_POST["dias"];
				}
			}
			if (!isset($_POST["edad"]))
			{
				$errorEdad="No completo la edad promedio";
				$errores=1;
			}
			else
			{
				
				if ($_POST["edad"]=="")
				{
					$errorEdad="La edad promedio no puede ser vacia";
					$errores=1;
					
				}
				else
				{
					$boli[$indice]["edad"]=$_POST["edad"];
				}
			}
		
		
		}
		else{
			$errores=1;
		}
		if ($errores==0)
		{
			$bolis = json_encode($boli,true);
			file_put_contents("jsonBoli.json",$bolis);
			header("Location: abmboliches.php");
		}
	
	
		
		
		
		if ((!isset($_POST) || !count($_POST)>0)||$errores==1)
	{
?>


<?php include("head.html"); ?>
    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php include("menu.html"); ?>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Agregar Boliches</h1>
                </div>
             </div>
            <div class="row">
                <div class="col-lg-12">
					<div class="panel panel-default3">
							<div class="panel-heading">
							<center>

								Agrega un boliche
								</center>

							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">
<center>

										<form id="form" action="agregarboliche.php" method="POST">
												<input placeholder="Nombre" type="text" name="nombre" id="nombre" class="form-control"><?=$errorNombre?><div class="lule"></div>
												<input placeholder="Direccion" type="text" name="direccion" id="direccion" class="form-control"><?=$errorDireccion?><div class="lule"></div>
												<input placeholder="Telefono" type="text" name="telefono" id="telefono" class="form-control"><?=$errorTelefono?><div class="lule"></div>
												<input placeholder="Estilo musical" type="text" name="musica" id="musica" class="form-control"><?=$errorMusica?><div class="lule"></div>
												<input  placeholder="Capacidad" type="text" name= "capacidad" id="capacidad" class="form-control"><?=$errorCap?><div class="lule"></div>
												<input placeholder="Dias de apertura" type="text" name="dias" id="dias" class="form-control"><?=$errorDias?><div class="lule"></div>
												<input placeholder="Edad promedio" type="text" name="edad" id="edad" class="form-control"><?=$errorEdad?></br>
											
												<input type="submit" name="ok" value="Aceptar" id="button" href="agregarboliche.php" class="btn btn-default">
												
										</form>
										<button type="submit" name="button" onclick="window.location.href='abmboliches.php'" class="btn btn-default"/>Cancelar</button>
								</center>

									</div>
									<!-- /.col-lg-12 (nested) -->
								</div>
								<!-- /.row (nested) -->
							</div>
							<!-- /.panel-body -->
						</div>
						<!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
			 
		</div>
    </div>


<?php
	}
?>
