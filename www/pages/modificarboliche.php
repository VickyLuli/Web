
<?php
		$boliches=file_get_contents("jsonBoli.json","r");
		$boli=json_decode($boliches,true);	
		
if(isset($_GET["idBoliche"])){
		
		$errores=0;
		$errorNombre="";
		$errorDireccion="";
		$errorTelefono="";
		$errorMusica = "";
		$errorCap="";
		$errorDias="";
		$errorEdad="";
		$idBolichee=$_GET["idBoliche"]-1;
		$idBoli= $boli[$idBolichee]["idboliche"];
		$nombreBoli= $boli[$idBolichee]["nombre"];
		$direcBoli= $boli[$idBolichee]["direccion"];
		$telBoli= $boli[$idBolichee]["telefono"];
		$musicaBoli= $boli[$idBolichee]["musica"];	
		$capBoli= $boli[$idBolichee]["capacidad"];
		$diasBoli= $boli[$idBolichee]["apertura"];
		$edadBoli= $boli[$idBolichee]["edad"];
			
		if (isset($_POST) && count($_POST)>0)
		{

			
			$boli[$idBolichee]["idboliche"]=$boli[count($boli)-1]["idboliche"];
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
					$boli[$idBolichee]["nombre"]=$_POST["nombre"];
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
					$boli[$idBolichee]["direccion"]=$_POST["direccion"];
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
					$boli[$idBolichee]["telefono"]=$_POST["telefono"];
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
					$boli[$idBolichee]["musica"]=$_POST["musica"];
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
					$boli[$idBolichee]["capacidad"]=$_POST["capacidad"];
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
					$boli[$idBolichee]["apertura"]=$_POST["dias"];
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
					$boli[$idBolichee]["edad"]=$_POST["edad"];
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
                    <h1 class="page-header">Modificar Boliche</h1>
                </div>
             </div>
			 
            <div class="row">
                <div class="col-lg-12">
					<div class="panel panel-default3">
							<div class="panel-heading">
							<center>

								Modifica los datos del boliche
								</center>

							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">
			<center>

			<form id="form" action='modificarboliche.php?idBoliche=<?=$_GET["idBoliche"]?>' method="POST">
							<label for= "nombre">Nombre</label> <input class="form-control" type="text" name="nombre" id="nombre" value="<?=$nombreBoli?>" class="form-control"><?=$errorNombre?>
							<label for= "direccion">Direccion</label> <input type="text" name="direccion" id="direccion" value="<?=$direcBoli?>" class="form-control"><?=$errorDireccion?>
							<label for= "telefono">Telefono</label> <input type="text" name="telefono" id="telefono" value="<?=$telBoli?>" class="form-control"><?=$errorTelefono?>
							<label for= "musica">Estilo Musical</label> <input type="text" name="musica" id="musica" value="<?=$musicaBoli?>" class="form-control"><?=$errorMusica?>
							<label for= "capacidad">Capacidad</label> <input type="text" name= "capacidad" id="capacidad" value="<?=$capBoli?>" class="form-control"><?=$errorCap?>
							<label for= "dias">Dias de apertura</label> <input type="text" name="dias" id="dias" value="<?=$diasBoli?>" class="form-control"><?=$errorDias?>
							<label for= "edad">Edad Promedio</label> <input type="text" name="edad" id="edad" value="<?=$edadBoli?>" class="form-control"><?=$errorEdad?>
							<div class="luli"></div>
							<input type="submit" name="ok" value="Aceptar" id="button"  class="btn btn-default">
						</form>	
						<button type="submit" name="button" onclick="window.location.href='http://localhost/pages/abmboliches.php'" class="btn btn-default"/>Cancelar</button>
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
}
?>

